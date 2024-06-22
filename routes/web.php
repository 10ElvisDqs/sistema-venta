<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

<<<<<<< HEAD
 Auth::routes();

Route::resource('/producto', 'App\Http\Controllers\ProductoController');
=======
Auth::routes();
>>>>>>> 36d804ffce37255fb8daccee12f49d5036ed00e8

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/producto', 'App\Http\Controllers\ProductoController');

Route::resource('empleado','App\Http\Controllers\EmpleadoController');
Route::resource('cliente', ClienteController::class);





