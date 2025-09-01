<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\DiagnosticoContoller;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TratamientoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('categorias', function () {
    return view('categorias');

});

Route::get('pacientes', function () {
    return view('pacientes');

});


Route::get('/patients', [PatientController::class, 'index'])->name('patient.index');
Route::post('/patients', [PatientController::class, 'store'])->name('patient.store');
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patient.show');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patient.update');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');

Route::get('/medicos', [MedicosController::class, 'index'])->name('medic.index');
Route::get('/citas', [CitasController::class, 'index'])->name('citas.index');
Route::get('/diagnostico', [DiagnosticoContoller::class, 'index'])->name('diagnostico.index');
Route::get('/tratamiento', [TratamientoController::class, 'index'])->name('tratamiento.index');
Route::get('/medicamentos', [MedicamentoController::class, 'index'])->name('medicamento.index');
