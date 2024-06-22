<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/producto', 'App\Http\Controllers\ProductoController');

Route::resource('empleado','App\Http\Controllers\EmpleadoController');
Route::resource('cliente', ClienteController::class);
