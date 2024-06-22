<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('empleado', 'App\Http\Controllers\EmpleadoController');

Route::resource('/producto', 'App\Http\Controllers\ProductoController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
