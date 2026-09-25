<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class UserRequest extends FormRequest
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
             'name' => ["required" , "string" , "max:255" , Rule::unique("users" , "name")->ignore($this->user)],
             'email' => ["required" , "email" , "max:255" , Rule::unique("users" , "email")->ignore($this->user)],
             'password' => [$this->isMethod("post")? "required" : "nullable" , "min:8" , "confirmed"],
             'password_confirmation' => [$this->isMethod("post")? "required" : "nullable"],
             'tenant_id' => ["required" , "numeric" , "exists:tenants,id"]
        ];
    }

    #[Override]
    public function messages()
    {
        return [
             "name.required" => __("custom.Please enter user name"),
            "name.string" => __("custom.Please enter valid user name"),
            "name.max" => __("custom.User name must not exceed 200 charachters"),
            "name.unique" => __("custom.This name is already in use"),


            "email.required" => __("custom.Please enter email"),
            "email.email" => __("custom.Please enter valid email"),
            "email.max" => __("custom.Email must not exceed 200 charachters"),
            "email.unique" => __("custom.This email is already in use"),

            "password.required" => __("custom.Please enter password"),
            "password.min" => __("custom.Password must be at least 8 charachters"),
            "password.confirmed" => __("custom.Password and confirm password aren't the same"),

            "password_confirmation.required" => __("custom.Please enter confirm password"),
            // "password_confirmation.same" => "Password and confirm password aren't the same",

            "tenant_id.required" => __("custom.Please choose user tenant"),
            "tenant_id.numeric" => __("custom.Please choose user tenant"),
            "tenant_id.exists" => __("custom.Please choose user tenant"),



        ];
    }
}
