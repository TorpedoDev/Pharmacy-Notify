<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class TenantRequest extends FormRequest
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
             'name'  => ["required" , "string" , "max:255" , Rule::unique("tenants" , "name")->ignore($this->tenant)],
             'logo'  => ["nullable" , "image" , "mimes:png,jpg,jpeg" , "max:2048"], // 2MB
             'phone'  => ["required" , "min:11" , "regex:/^01[0125][0-9]{8}$/" , Rule::unique("tenants" , "phone")->ignore($this->tenant)],
             'commercial_number' => ["nullable" , "string" , "max:255" , Rule::unique("tenants" , "commercial_number")->ignore($this->tenant)]
        ];
    }

    #[Override]
    public function messages()
    {
        return [
             "name.required" => __("custom.Please enter tenant name"),
            "name.string" => __("custom.Please enter valid tenant name"),
            "name.max" => __("custom.Tenant name must not exceed 200 charachters"),
            "name.unique" => __("custom.This name is already in use"),

             "phone.required" =>__("custom.Please enter phone number"),
            "phone.regex" => __("custom.Please enter valid egyptian phone number"),
            "phone.unique" => __("custom.This phone number is already in use"),
            "phone.min" => __("custom.Phone number must not be less than 11 digits"),


            "logo.image" => __("custom.The logo must be valid image"),
            "logo.mimes" => __("custom.The logo must be JPG, JPEG, PNG"),
            "logo.max" => __("custom.The logo size must not exceed 2 MB"),

            "commercial_number.string" => __("custom.Please enter valid commercial number"),
            "commercial_number.max" => __("custom.Tenant commercial number must not exceed 200 Charachters"),
            "commercial_number.unique" => __("custom.This commercial number is already in use"),
        ];
    }
}
