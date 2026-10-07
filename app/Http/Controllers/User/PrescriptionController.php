<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PrescriptionRequest;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\PatientTreatment;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class PrescriptionController extends Controller
{

   
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tenantId = auth('web')->user()->tenant_id;

        $prescriptions = Prescription::query()
            ->where('tenant_id', $tenantId)
            ->with([
                'patient',
                'items.medication',
            ])
            ->withCount('items')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('prescription_name', 'like', "%{$search}%")
                        ->orWhereHas('patient', function ($patientQuery) use ($search) {
                            $patientQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest('prescription_date')
            ->paginate(10)
            ->withQueryString();

        if ($request->ajax()) {
            return view(
                'user.prescriptions.partials.table',
                compact('prescriptions')
            )->render();
        }

        return view(
            'user.prescriptions.index',
            compact('prescriptions')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $tenantId = auth('web')->user()->tenant_id;

        $patients = Patient::query()
            ->where('tenant_id', $tenantId)
            ->orderBy('name')
            ->get();

        $medications = Medication::query()
            ->where('tenant_id', $tenantId)
            ->orderBy('name')
            ->get();

        return view(
            'user.prescriptions.create',
            compact('patients', 'medications')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(PrescriptionRequest $request)
    // {
    //      $tenantId = auth('web')->user()->tenant_id;

    //     $validated = $request->validated();
       
    //     $patient = Patient::query()
    //         ->where('tenant_id', $tenantId)
    //         ->findOrFail($validated['patient_id']);

    //     /*
    //      * Make sure all medications belong to current tenant.
    //      */
    //     $medicationIds = collect($validated['items'])
    //         ->pluck('medication_id')
    //         ->unique();

    //     $validMedicationCount = Medication::query()
    //         ->where('tenant_id', $tenantId)
    //         ->whereIn('id', $medicationIds)
    //         ->count();

    //     if ($validMedicationCount !== $medicationIds->count()) {
    //         return back()
    //             ->withInput()
    //             ->withErrors([
    //                 'items' => __('custom.One or more selected medications are invalid.')
    //             ]);
    //     }

    //     $prescription = DB::transaction(function () use (
    //         $validated,
    //         $tenantId
    //     ) {
    //         $prescription = Prescription::create([
    //             'tenant_id' => $tenantId,
    //             'patient_id' => $validated['patient_id'],
    //             'prescription_name' => $validated['prescription_name'],
    //             'prescription_date' => $validated['prescription_date'],
    //             'status' => 'pending',
    //             'created_by' => auth('web')->id(),
    //         ]);

    //         foreach ($validated['items'] as $item) {

    //             $prescriptionItem = $prescription->items()->create([
    //                 'medication_id' => $item['medication_id'],
    //                 'dosage' => $item['dosage'],
    //                 'frequency' => $item['frequency'],
    //                 'duration_value' => $item['duration_value'] ?? null,
    //                 'duration_unit' => $item['duration_unit'] ?? null,
    //                 'prescribed_quantity' => $item['prescribed_quantity'],
    //                 'is_chronic' => $item['is_chronic'] ?? false,
    //                 'refill_enabled' => $item['refill_enabled'] ?? false,
    //                 'refill_cycle_days' => $item['refill_cycle_days'] ?? null,
    //             ]);

    //             /*
    //              * Create Patient Treatment for chronic medication.
    //              */
    //             if ($prescriptionItem->is_chronic) {
    //                 $this->createPatientTreatment(
    //                     $prescription,
    //                     $prescriptionItem
    //                 );
    //             }
    //         }
    //          return $prescription;
    //     });

    //    $medicines = $prescription->items()
    // ->with('medication')
    // ->get()
    // ->toArray();
 
    // // dd($medicines);

    //     $response = $this->whatsappService->sendPrescription(
    //     // to: '201096946204',
    //     to: '01064206769',
    //     pharmacyName: 'صيدلية فايز',
    //     clientName: 'عمرو الحلفاوي',
    //     medicines: $medicines
    // );
        

    //     return redirect()
    //         ->route('prescriptions.index')
    //         ->with(
    //             'success',
    //             __('custom.Prescription created successfully.')
    //         );

    // }



public function store(PrescriptionRequest $request)
{
    $user     = auth('web')->user();
    $tenantId = $user->tenant_id;
    $tenant   = $user->tenant; // عدّل لو العلاقة اسمها مختلف: Tenant::findOrFail($tenantId)

    $validated = $request->validated();

    $patient = Patient::query()
        ->where('tenant_id', $tenantId)
        ->findOrFail($validated['patient_id']);

    /*
     * Make sure all medications belong to current tenant.
     */
    $medicationIds = collect($validated['items'])
        ->pluck('medication_id')
        ->unique();

    $validMedicationCount = Medication::query()
        ->where('tenant_id', $tenantId)
        ->whereIn('id', $medicationIds)
        ->count();

    if ($validMedicationCount !== $medicationIds->count()) {
        return back()
            ->withInput()
            ->withErrors([
                'items' => __('custom.One or more selected medications are invalid.')
            ]);
    }

    $prescription = DB::transaction(function () use ($validated, $tenantId) {
        $prescription = Prescription::create([
            'tenant_id'         => $tenantId,
            'patient_id'        => $validated['patient_id'],
            'prescription_name' => $validated['prescription_name'],
            'prescription_date' => $validated['prescription_date'],
            'status'            => 'pending',
            'created_by'        => auth('web')->id(),
        ]);

        foreach ($validated['items'] as $item) {
            $prescriptionItem = $prescription->items()->create([
                'medication_id'       => $item['medication_id'],
                'dosage'              => $item['dosage'],
                'frequency'           => $item['frequency'],
                'duration_value'      => $item['duration_value'] ?? null,
                'duration_unit'       => $item['duration_unit'] ?? null,
                'prescribed_quantity' => $item['prescribed_quantity'],
                'is_chronic'          => $item['is_chronic'] ?? false,
                'refill_enabled'      => $item['refill_enabled'] ?? false,
                'refill_cycle_days'   => $item['refill_cycle_days'] ?? null,
            ]);

            /*
             * Create Patient Treatment for chronic medication.
             */
            if ($prescriptionItem->is_chronic) {
                $this->createPatientTreatment($prescription, $prescriptionItem);
            }
        }

        return $prescription;
    });

    /*
     * Send WhatsApp message from the pharmacy's own number.
     * فشل الإرسال ما يلغيش الروشتة اللي اتحفظت.
     */
    $whatsappWarning = null;

    if (empty($tenant->whatsapp_access_token) || empty($tenant->whatsapp_phone_number_id)) {
        $whatsappWarning = 'الصيدلية غير مربوطة بواتساب، لم يتم إرسال الرسالة';
    } elseif (empty($patient->phone)) { // عدّل اسم عمود رقم المريض
        $whatsappWarning = 'لا يوجد رقم هاتف للمريض، لم يتم إرسال الرسالة';
    } else {
        try {
            $medicines = $prescription->items()
                ->with('medication')
                ->get()
                ->toArray();

            $result = WhatsAppService::forTenant($tenant)->sendPrescription(
                to: $this->normalizePhone($patient->phone),
                pharmacyName: $tenant->name,   // عدّل اسم عمود اسم الصيدلية
                clientName: $patient->name,    // عدّل اسم عمود اسم المريض
                medicines: $medicines
            );

            if (! isset($result['messages'][0]['id'])) {
                Log::warning('WhatsApp prescription not sent', [
                    'prescription_id' => $prescription->id,
                    'response'        => $result,
                ]);
                $whatsappWarning = 'تم حفظ الروشتة لكن فشل إرسال رسالة الواتساب';
            }
        } catch (Throwable $e) {
            report($e);
            $whatsappWarning = 'تم حفظ الروشتة لكن فشل إرسال رسالة الواتساب';
        }
    }

    $redirect = redirect()
        ->route('prescriptions.index')
        ->with('success', __('custom.Prescription created successfully.'));

    if ($whatsappWarning) {
        $redirect->with('warning', $whatsappWarning);
    }

    return $redirect;
}

/**
 * يحوّل الرقم للصيغة الدولية بدون + (مثال: 01064206769 => 201064206769)
 */
private function normalizePhone(string $phone, string $defaultCountryCode = '20'): string
{
    $digits = preg_replace('/\D/', '', $phone);

    if (str_starts_with($digits, '00')) {
        return substr($digits, 2);
    }

    if (str_starts_with($digits, '0')) {
        return $defaultCountryCode . substr($digits, 1);
    }

    return $digits;
}










    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
       if($prescription->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

        $prescription->load([
            'patient',
            'items.medication',
            'items.patientTreatment',
            'dispensations.createdBy',
            'dispensations.items.medication',
        ]);

        return view(
            'user.prescriptions.show',
            compact('prescription')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription)
    {
        if($prescription->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

     $prescription->load([
            'patient',
            'items.medication',
            'items.patientTreatment',
        ]);

        $tenantId = auth('web')->user()->tenant_id;

        $patients = Patient::query()
            ->where('tenant_id', $tenantId)
            ->orderBy('name')
            ->get();

        $medications = Medication::query()
            ->where('tenant_id', $tenantId)
            ->orderBy('name')
            ->get();

        return view(
            'user.prescriptions.edit',
            compact(
                'prescription',
                'patients',
                'medications'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrescriptionRequest $request, Prescription $prescription)
    {
         if($prescription->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

       /*
         * Do not modify historical prescriptions.
         */
        // if ($prescription->dispensations()->exists()) {
        //     return redirect()
        //         ->route('prescriptions.show', $prescription)
        //         ->with(
        //             'error',
        //             __('custom.This prescription cannot be edited because it has already been dispensed.')
        //         );
        // }

        $tenantId = auth('web')->user()->tenant_id;

        $validated = $request->validated();
       
        /*
         * Tenant validation for patient.
         */
        Patient::query()
            ->where('tenant_id', $tenantId)
            ->findOrFail($validated['patient_id']);

        /*
         * Tenant validation for medications.
         */
        $medicationIds = collect($validated['items'])
            ->pluck('medication_id')
            ->unique();

        $validMedicationCount = Medication::query()
            ->where('tenant_id', $tenantId)
            ->whereIn('id', $medicationIds)
            ->count();

        if ($validMedicationCount !== $medicationIds->count()) {
            return back()
                ->withInput()
                ->withErrors([
                    'items' => __('custom.One or more selected medications are invalid.')
                ]);
        }

        DB::transaction(function () use (
            $validated,
            $prescription
        ) {

            /*
             * Update prescription itself.
             */
            $prescription->update([
                'patient_id' => $validated['patient_id'],
                'prescription_name' => $validated['prescription_name'],
                'prescription_date' => $validated['prescription_date'],
            ]);

            /*
             * Existing item IDs belonging to this prescription.
             */
            $existingItems = $prescription->items()->get();

            $submittedItemIds = collect($validated['items'])
                ->pluck('id')
                ->filter()
                ->map(fn ($id) => (int) $id)
                ->values()
                ->all();

            /*
             * Delete items removed from the edit form.
             */
            foreach ($existingItems as $existingItem) {

                if (!in_array(
                    $existingItem->id,
                    $submittedItemIds,
                    true
                )) {

                    /*
                     * Delete associated treatment first.
                     */
                    // PatientTreatment::where(
                    //     'prescription_item_id',
                    //     $existingItem->id
                    // )->delete();

                    $existingItem->delete();
                }
            }

            /*
             * Update existing items or create new items.
             */
            foreach ($validated['items'] as $item) {

                $prescriptionItem = null;

                if (!empty($item['id'])) {

                    $prescriptionItem = $prescription->items()
                        ->where('id', $item['id'])
                        ->firstOrFail();

                    $prescriptionItem->update([
                        'medication_id' => $item['medication_id'],
                        'dosage' => $item['dosage'],
                        'frequency' => $item['frequency'],
                        'duration_value' =>
                            $item['duration_value'] ?? null,
                        'duration_unit' =>
                            $item['duration_unit'] ?? null,
                        'prescribed_quantity' =>
                            $item['prescribed_quantity'],
                        'is_chronic' =>
                            $item['is_chronic'] ?? false,
                        'refill_enabled' =>
                            $item['refill_enabled'] ?? false,
                        'refill_cycle_days' =>
                            $item['refill_cycle_days'] ?? null
                    ]);

                } else {

                    /*
                     * New item added during editing.
                     */
                    $prescriptionItem = $prescription->items()->create([
                        'medication_id' => $item['medication_id'],
                        'dosage' => $item['dosage'],
                        'frequency' => $item['frequency'],
                        'duration_value' =>
                            $item['duration_value'] ?? null,
                        'duration_unit' =>
                            $item['duration_unit'] ?? null,
                        'prescribed_quantity' =>
                            $item['prescribed_quantity'],
                        'is_chronic' =>
                            $item['is_chronic'] ?? false,
                        'refill_enabled' =>
                            $item['refill_enabled'] ?? false,
                        'refill_cycle_days' =>
                            $item['refill_cycle_days'] ?? null,
                    ]);
                }

                /*
                 * Synchronize Patient Treatment.
                 */
                // $treatment = PatientTreatment::where(
                //     'prescription_item_id',
                //     $prescriptionItem->id
                // )->first();

                // if ($prescriptionItem->is_chronic) {

                //     if ($treatment) {

                //         /*
                //          * Existing chronic treatment.
                //          */
                //         $treatment->update([
                //             'patient_id' =>
                //                 $prescription->patient_id,

                //             'medication_id' =>
                //                 $prescriptionItem->medication_id,

                //             'dosage' =>
                //                 $prescriptionItem->dosage,

                //             'frequency' =>
                //                 $prescriptionItem->frequency,

                //             'quantity_per_cycle' =>
                //                 $prescriptionItem->prescribed_quantity,

                //             'cycle_days' =>
                //                 $prescriptionItem->refill_cycle_days ?? 30,

                //             'refill_enabled' =>
                //                 $prescriptionItem->refill_enabled,
                //         ]);

                //     } else {

                //         /*
                //          * Medication became chronic during editing.
                //          */
                //         $this->createPatientTreatment(
                //             $prescription,
                //             $prescriptionItem
                //         );
                //     }

                // } else {

                //     /*
                //      * Medication is no longer chronic.
                //      *
                //      * Remove its treatment record.
                //      */
                //     if ($treatment) {
                //         $treatment->delete();
                //     }
                // }
            }
        });

        return redirect()
            ->route('prescriptions.show', $prescription)
            ->with(
                'success',
                __('custom.Prescription updated successfully.')
            );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prescription $prescription)
    {
        if($prescription->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

        // if ($prescription->dispensations()->exists()) {

        //     return response()->json([
        //         'message' => __(
        //             'custom.This prescription cannot be deleted because it has dispensing history.'
        //         ),
        //     ], 422);
        // }

        DB::transaction(function () use ($prescription) {

            /*
             * Remove patient treatments belonging to this prescription.
             */
            // PatientTreatment::whereHas(
            //     'prescriptionItems',
            //     function ($query) use ($prescription) {
            //         $query->where(
            //             'prescription_item_id',
            //             $prescription->id
            //         );
            //     }
            // )->delete();

            /*
             * Prescription items are deleted automatically
             * because of cascadeOnDelete().
             */
            $prescription->delete();
        });

        return response()->json([
            'message' => __('custom.Prescription deleted successfully.'),
        ]);

    }


     private function createPatientTreatment(
        Prescription $prescription,
        PrescriptionItem $prescriptionItem
    ): PatientTreatment {

        $cycleDays =
            $prescriptionItem->refill_cycle_days ?? 30;

        return PatientTreatment::create([
            'tenant_id' =>
                $prescription->tenant_id,

            'patient_id' =>
                $prescription->patient_id,

            'medication_id' =>
                $prescriptionItem->medication_id,

            'prescription_item_id' =>
                $prescriptionItem->id,

            'dosage' =>
                $prescriptionItem->dosage,

            'frequency' =>
                $prescriptionItem->frequency,

            'quantity_per_cycle' =>
                $prescriptionItem->prescribed_quantity,

            'cycle_days' =>
                $cycleDays,

            'last_dispensed_at' =>
                null,

            'next_refill_date' =>
                now()
                    ->addDays((int)$cycleDays)
                    ->toDateString(),

            'refill_enabled' =>
                $prescriptionItem->refill_enabled,

            'reminder_enabled' =>
                true,
        ]);
    }
}
