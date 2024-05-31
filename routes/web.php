<?php

use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('proveedores', App\Http\Controllers\ProveedoreController::class)->middleware("auth");
Route::resource('carros', App\Http\Controllers\CarroController::class)->middleware("auth");
