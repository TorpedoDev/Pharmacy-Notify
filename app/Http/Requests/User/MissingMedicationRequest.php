<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class MissingMedicationRequest extends FormRequest
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
            "name" => ["required" , "string" , "max:255"],
            "status" => ["required" , "string" , "in:Missing,Ordered,Being Delivered,Delivered"]
        ];
    }

   #[Override]
   public function messages()
   {
    return[
            "name.required" => __("custom.Please enter name"),
            "name.string" => __("custom.Please enter valid name"),
            "name.max" => __("custom.Name must not exceed 200 charachters"),
            "name.unique" => __("custom.This name is already in use"),
            "status.required" => __("custom.Please choose status"),
            "status.string" => __("custom.Please choose status"),
            "status.in" => __("custom.Please choose status"),
        ];
   }
}
