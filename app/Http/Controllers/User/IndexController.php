<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $plans = Plan::where("is_active" , true)->get(); // ->where("features" , "!=" , null)
        return view('welcome' , compact("plans"));
    }
}
