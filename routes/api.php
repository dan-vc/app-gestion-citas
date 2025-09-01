<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\DiagnoseController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\MedicationController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\TreatmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('appointments', AppointmentController::class);
Route::apiResource('diagnoses', DiagnoseController::class);
Route::apiResource('doctors', DoctorController::class);
Route::apiResource('medications', MedicationController::class);
Route::apiResource('patients', PatientController::class);
Route::apiResource('treatments', TreatmentController::class);