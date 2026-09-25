<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class PatientRequest extends FormRequest
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
             "name" => ["required" , "string" , "max:255" , Rule::unique("patients" , "name")->where("tenant_id" , auth("web")->user()->tenant_id)->ignore($this->patient)] ,
              "phone" => ["required" , "max:11" , "min:11" , "regex:/^01[0125][0-9]{8}$/" ] ,
              "whatsapp_number" => ["nullable" , "max:11" , "min:11"] ,
              "age" => ["required" , "numeric" , "min:1"] ,
              "address" => ["nullable" , "string" , "max:255"] 
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            "name.required" => __("custom.Please enter name"),
            "name.string" => __("custom.Please enter valid name"),
            "name.max" => __("custom.Name must not exceed 200 charachters"),
            "name.uniqe" => __("custom.This name is already in use"),

            "phone.required" => __("custom.Please enter phone number"),
            "phone.max" => __("custom.Phone number must not exceed 11 digits"),
            "phone.regex" => __("custom.Please enter valid egyptian phone number"),
            "phone.min" => __("custom.Phone number must not be less than 11 digits"),

            "whatsapp_number.min" => __("custom.Whatsapp number must be 11 digits"),
            "whatsapp_number.max" => __("custom.Whatsapp number must be 11 digits"),

            "age.required" => __("custom.Please enter age"),
            "age.numeric" => __("custom.Please enter valid age"),
            "age.min" => __("custom.Please enter valid age"),

            "address.string" => __("custom.Please enter valid address"),
            "address.max" => __("custom.Address must not exceed 200 charachters"),

        ];
    }
}
