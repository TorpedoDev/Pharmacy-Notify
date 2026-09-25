<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class SubscriptionRequest extends FormRequest
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
            'tenant_id'  =>["required" , "numeric" , "exists:tenants,id"],
             'plan_id'  =>["required" , "numeric" , "exists:plans,id"],
             'start_at'  =>["required" , "date"],
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            "tenant_id.required" => __("custom.Please choose tenant"),
            "tenant_id.numeric" => __("custom.Please choose tenant"),
            "tenant_id.exists" => __("custom.Please choose tenant"),

             "plan_id.required" => __("custom.Please choose plan"),
            "plan_id.numeric" => __("custom.Please choose plan"),
            "plan_id.exists" => __("custom.Please choose plan"),

            "start_at.required" => __("custom.Please enter start date"),
            "start_at.date" => __("custom.Please enter valid start date"),
        ];
    }
}
