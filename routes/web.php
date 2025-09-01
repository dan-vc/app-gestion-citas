<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});

Route::get('categorias', function () {
    return view('categorias');

});

Route::get('medicos', function () {
    return view('medicos');

});

