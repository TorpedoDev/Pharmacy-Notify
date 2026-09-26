<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\DispensationController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\MedicationController;
use App\Http\Controllers\User\MissingMedicationController;
use App\Http\Controllers\User\PatientController;
use App\Http\Controllers\User\PatientTreatmentController;
use App\Http\Controllers\User\PrescriptionController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UsersController;
use Illuminate\Support\Facades\Route;




Route::middleware("locale")->group(function(){

   Route::get('/', [IndexController::class, "index"] )->name("index");
   Route::get('pharmacy/register', [IndexController::class, "index"] )->name("pharmacy.register");

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth' , 'locale'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/dashboard" , [DashboardController::class , "index"])->name("dashboard");
    
    Route::get("patients/toggle-status/{patient}" , [PatientController::class, "toggleStatus"])->name("patients.toggle-status");
    Route::resource("/patients" , PatientController::class);
    Route::resource("/medications" , MedicationController::class);
    Route::resource("/missingmedications" , MissingMedicationController::class);

    Route::resource("prescriptions", PrescriptionController::class);

    Route::resource("dispensations", DispensationController::class);

    Route::resource("patient-treatments", PatientTreatmentController::class);

    Route::get("profile" , [ProfileController::class, "index"])->name("profile.index");
    Route::put("profile/update" , [ProfileController::class, "updateInformation"])->name("profile.updateinfo");
    Route::put("password/update" , [ProfileController::class, "changePassword"])->name("profile.updatepass");
 

    Route::resource("users" , UsersController::class);
    
});

require __DIR__.'/auth.php';
