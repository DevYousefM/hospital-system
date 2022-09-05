<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientpageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get("/delete/{id}", [Controller::class, "delete"])->name("delete");
Route::get("/deleteUser/{id}", [Controller::class, "deleteUser"])->name("deleteUser");
Route::get("/analysis", [Controller::class, "analysis"])->name("analysis");
Route::get('/patient-page', [PatientpageController::class, "index"])->name('patient.page');
Route::get('/dashboard', [Controller::class, "dashboard"])->middleware(["auth", "check_user"])->name("dashboard");
Route::get('/allUsers', [Controller::class, "allUsers"])->name("users");
Route::get("/show/{id}", [Controller::class, "show"])->name("patient.show");

Route::resource("patients", PatientController::class)->middleware("auth");

require __DIR__ . '/auth.php';
