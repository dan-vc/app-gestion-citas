<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DiagnosticoContoller;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TratamientoController;
use Illuminate\Support\Facades\Route;

Route::get('categorias', function () {
    return view('categorias');
})->name('categorias');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
// Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
// Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
// Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
// Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');


// Route::get('/medicos', [MedicosController::class, 'index'])->name('doctors.index');
// Route::post('/medicos', [MedicosController::class, 'store'])->name('doctors.store');
// Route::get('/medicos/{id}', [MedicosController::class, 'show'])->name('doctors.show');
// Route::put('/medicos/{id}', [MedicosController::class, 'update'])->name('doctors.update');
// Route::delete('/medicos/{id}', [MedicosController::class, 'destroy'])->name('doctors.destroy');
// Esto se puede simplificar usando Route::resource
// resource crea: index, create, store, show, edit, update, destroy

Route::resource('patients', PatientController::class)->names('patients');
Route::resource('medicos', MedicosController::class)->names('doctors');
Route::resource('citas', CitasController::class)->names('appointments');
Route::resource('diagnostico', DiagnosticoContoller::class)->names('diagnoses');
Route::resource('tratamiento', TratamientoController::class)->names('treatments');
Route::resource('medicamentos', MedicamentoController::class)->names('medications');
