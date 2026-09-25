<?php
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;





// lang

Route::get("lang/{lang}" , function($lang){
    if(! in_array($lang , ['ar' , 'en'])){
        session(['locale' => 'en']);
    }

    session(['locale' => $lang]);
    return redirect()->back();

})->name("app.setlocale");


// Admin Auth

Route::prefix('admin')->middleware("locale")->group(function () {
    Route::get('login' , [AdminAuthController::class, 'login'])->name("admin.login");
    Route::post('login' , [AdminAuthController::class, 'signIn'])->name("admin.signin");
    Route::post('logout' , [AdminAuthController::class, 'logout'])->name("admin.logout");
});


Route::prefix('admin')->name('admin.')->middleware(["admin-auth" , "locale"])->group(function(){
    Route::get("dashboard" , [AdminDashboardController::class , "index"])->name("dashboard");
    Route::get("plans/toggle-status/{plan}" , [PlanController::class, "toggleStatus"])->name("plans.toggle-status");
    Route::resource("plans" , PlanController::class);
    Route::resource("tenants" , TenantController::class);
    Route::resource("subscriptions" , SubscriptionController::class);
    Route::resource("users" , UserController::class);


    Route::get("profile" , [ProfileController::class, "index"])->name("profile.index");
    Route::put("profile/update" , [ProfileController::class, "updateInformation"])->name("profile.updateinfo");
    Route::put("password/update" , [ProfileController::class, "changePassword"])->name("profile.updatepass");
     
    Route::get("xx" , function(){
        return view("admin.profile");
    });
});