<?php

namespace App\Http\Requests\Admin;

use App\Enums\PeriodTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class PlanRequest extends FormRequest
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
             'name' => ["required" , "string" , "max:200" , Rule::unique('plans', 'name')->ignore($this->plan)],
             'price' => ["required" , "numeric" , "min:0"],
             'allowed_users' => ["required" , "numeric" , "min:0"],
             'allowed_customers' => ["required" , "numeric" , "min:0"],
             'period_value' => ["required" , "numeric"],
             'period_type'=> ["required" , Rule::enum(PeriodTypes::class)],
             'features' => ["nullable" , "string"],
             'is_popular' => ["nullable"],

        ];
    }


    #[Override]
    public function messages()
    {
        return [
            "name.required" => __("custom.Please Enter Plan Name"),
            "name.string" => __("custom.Please Enter Valid Plan Name"),
            "name.max" => __("custom.Plan Name Must Not Exceed 200 Charachters"),
            "name.unique" => __("custom.This plan name is already in use"),

            "price.required" => __("custom.Please Enter Plan Price"),
            "price.numeric" => __("custom.Please Enter Valid Plan Price"),
            "price.min" => __("custom.Please Enter Valid Plan Price"),

             "allowed_users.required" => __("custom.Please Enter Plan Users Count"),
             "allowed_users.numeric" => __("custom.Please Enter Valid Plan Users Count"),
             "allowed_users.min" => __("custom.Please Enter Valid Plan Users Count"),

              "allowed_customers.required" => __("custom.Please Enter Plan Customers Count"),
             "allowed_customers.numeric" => __("custom.Please Enter Valid Plan Customers Count"),
             "allowed_customers.min" => __("custom.Please Enter Valid Plan Customers Count"),

             "period_value.required" => __("custom.Please Enter Plan Period"),
             "period_value.numeric" => __("custom.Please Enter Valid Plan Period"),

              "period_type.required" => __("custom.Please Choose Plan Type"),
              "period_type.enum" => __("custom.Please Choose Valid Plan Type"),
            //   "features.required" => __("custom.Please Enter Description")
        ];
    }
}
