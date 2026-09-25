<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'patient_id' => [
                'required',
                'integer',
                'exists:patients,id',
            ],

            'prescription_name' => [
                'required',
                'string',
                'max:255',
            ],

            'prescription_date' => [
                'required',
                'date',
            ],

            'items' => [
                'required',
                'array',
                'min:1',
            ],

            /*
            |--------------------------------------------------------------------------
            | Prescription Item
            |--------------------------------------------------------------------------
            */

            // Only needed when updating.
            'items.*.id' => [
                'nullable',
                'integer',
            ],

            'items.*.medication_id' => [
                'required',
                'integer',
                'exists:medications,id',
            ],

            'items.*.dosage' => [
                'required',
                'string',
                'max:255',
            ],

            'items.*.frequency' => [
                'required',
                'string',
                'max:255',
            ],

            'items.*.duration_value' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'items.*.duration_unit' => [
                'nullable',
                'in:days,weeks,months',
            ],

            'items.*.prescribed_quantity' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'items.*.is_chronic' => [
                'nullable',
                'boolean',
            ],

            'items.*.refill_enabled' => [
                'nullable',
                'boolean',
            ],

            'items.*.refill_cycle_days' => [
                'nullable',
                'integer',
                'min:1',
            ],
        ];
    }




    public function messages(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Prescription
            |--------------------------------------------------------------------------
            */

            'patient_id.required' => __('Please select a patient.'),
            'patient_id.integer' => __('The selected patient is invalid.'),
            'patient_id.exists' => __('The selected patient does not exist.'),

            'prescription_name.required' => __('Please enter a prescription name.'),
            'prescription_name.string' => __('The prescription name must be a valid text.'),
            'prescription_name.max' => __('The prescription name may not exceed 255 characters.'),

            'prescription_date.required' => __('Please enter the prescription date.'),
            'prescription_date.date' => __('Please enter a valid prescription date.'),

            'items.required' => __('Please add at least one prescription item.'),
            'items.array' => __('The prescription items must be valid.'),
            'items.min' => __('Please add at least one prescription item.'),

            /*
            |--------------------------------------------------------------------------
            | Prescription Items
            |--------------------------------------------------------------------------
            */

            'items.*.id.integer' => __('The prescription item ID is invalid.'),

            'items.*.medication_id.required' => __('Please select a medication.'),
            'items.*.medication_id.integer' => __('The selected medication is invalid.'),
            'items.*.medication_id.exists' => __('The selected medication does not exist.'),

            'items.*.dosage.required' => __('Please enter the dosage.'),
            'items.*.dosage.string' => __('The dosage must be valid text.'),
            'items.*.dosage.max' => __('The dosage may not exceed 255 characters.'),

            'items.*.frequency.required' => __('Please enter the frequency.'),
            'items.*.frequency.string' => __('The frequency must be valid text.'),
            'items.*.frequency.max' => __('The frequency may not exceed 255 characters.'),

            'items.*.duration_value.integer' => __('The duration value must be a number.'),
            'items.*.duration_value.min' => __('The duration value must be at least 1.'),

            'items.*.duration_unit.in' => __('The duration unit must be days, weeks, or months.'),

            'items.*.prescribed_quantity.required' => __('Please enter the prescribed quantity.'),
            'items.*.prescribed_quantity.numeric' => __('The prescribed quantity must be a number.'),
            'items.*.prescribed_quantity.min' => __('The prescribed quantity must be greater than 0.'),

            'items.*.is_chronic.boolean' => __('The chronic medication value is invalid.'),

            'items.*.refill_enabled.boolean' => __('The refill enabled value is invalid.'),

            'items.*.refill_cycle_days.integer' => __('The refill cycle must be a number of days.'),
            'items.*.refill_cycle_days.min' => __('The refill cycle must be at least 1 day.'),
        ];
    }


 public function attributes(): array
    {
        return [
            'patient_id' => __('patient'),
            'prescription_name' => __('prescription name'),
            'prescription_date' => __('prescription date'),

            'items.*.id' => __('item'),
            'items.*.medication_id' => __('medication'),
            'items.*.dosage' => __('dosage'),
            'items.*.frequency' => __('frequency'),
            'items.*.duration_value' => __('duration'),
            'items.*.duration_unit' => __('duration unit'),
            'items.*.prescribed_quantity' => __('prescribed quantity'),
            'items.*.is_chronic' => __('chronic status'),
            'items.*.refill_enabled' => __('refill status'),
            'items.*.refill_cycle_days' => __('refill cycle'),
        ];
    }



}
