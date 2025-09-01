<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/patient', [PatientController::class, 'index'])->name('patients.index');
Route::post('/patient', [PatientController::class, 'create']);
Route::get('/patient/{id}', [PatientController::class, 'show'])->name('patients.update');
Route::post('/patient/{id}', [PatientController::class, 'update']);