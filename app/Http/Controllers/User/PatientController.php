<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $patients = Patient::query()->where("tenant_id" , auth("web")->user()->tenant_id)->when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->latest()
        ->paginate(10)
        ->withQueryString();

         if ($request->ajax()) {
        return view('user.patients.partials.table', compact('patients'))->render();
    }
        return view("user.patients.index" , compact("patients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.patients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $data = $request->validated();
        $tenant_id =  auth("web")->user()->tenant_id;
        $latestPatient = Patient::latest("id")->first();
        $nextNumber = $latestPatient ? $latestPatient->id + 1 : 1 ;
        $data["patient_code"] = "PAT-" . str_pad($nextNumber , 6 , '0' , STR_PAD_LEFT);
        $data["created_by"] = auth("web")->user()->id;
        $data["tenant_id"] = $tenant_id;
        Patient::create($data);
        return redirect()->route("patients.index")->with("success" , __("custom.Patient Added Successfully"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $patient->load([
        'prescriptions' => function ($query) {
            $query->latest('prescription_date');
        },
    ]);

    return view('user.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
         if($patient->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }
        
        return view("user.patients.edit" , compact("patient"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
         if($patient->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

        $patient->update($request->validated());
        return redirect()->route("patients.index")->with("success" , __("custom.Patient Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
         if($patient->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

        $patient->delete();
       return response()->json([
        'message' => __("custom.Patient Deleted Successfully.")
    ]);   
    
    }

    public function toggleStatus(Patient $patient)
{
    if($patient->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }
    $patient->status = ! $patient->status;
    $patient->save();
    $msg = $patient->status ? __("custom.Patient Activated Successfully") : __("custom.Patient Deactivated Successfully");
    return redirect()->route("patients.index")->with("success" , $msg);
}

}
