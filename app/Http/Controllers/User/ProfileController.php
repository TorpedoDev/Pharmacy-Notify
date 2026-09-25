<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view("user.profile");
    }

    public function updateInformation(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required" , "string" , "max:255" , Rule::unique("users" , "name")->ignore(auth("web")->user()->id)],
            "email" => ["required" , "email" , "max:255" , Rule::unique("users" , "email")->ignore(auth("web")->user()->id)],
        ] , [
            "name.required" => __("custom.Please enter user name"),
            "name.string" => __("custom.Please enter valid user name"),
            "name.max" => __("custom.User name must not exceed 200 charachters"),
            "name.unique" => __("custom.This name is already in use"),


            "email.required" => __("custom.Please enter email"),
            "email.email" => __("custom.Please enter valid email"),
            "email.max" => __("custom.Email must not exceed 200 charachters"),
            "email.unique" => __("custom.This email is already in use"),
        ]);
          
        $user = auth("web")->user();
        $user->update($validated);

        return redirect()->back()->with("success" , __("custom.Account Information Updated Successfully"));
    }

    public function changePassword(Request $request)
    {
        $user = auth('web')->user();

    $validated = $request->validate([
        'current_password' => ['required', 'current_password:web'],

        'new_password' => ['required','min:8','confirmed'],
    ],[
        "current_password.required" => __("custom.Please enter current password"),
        "current_password.current_password" => __("custom.Current password is incorrect"),
        
            "new_password.required" => __("custom.Please enter password"),
            "new_password.min" => __("custom.Password must be at least 8 charachters"),
            "new_password.confirmed" => __("custom.Password and confirm password aren't the same"),

    ]);

           $user->update([
        'password' => Hash::make($validated['new_password']),
    ]);

            return redirect()->back()->with("success" , __("custom.Account Password Updated Successfully"));
    
    }
}
