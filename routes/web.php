<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\AuthController;

// Rutas para las vistas
Route::get('/register', function () {
    return view('register');
})->name('auth.register.view');

Route::get('/login', function () {
    return view('login');
})->name('auth.login.view');

// Rutas para las acciones
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/', function () {
    return view('welcome');
})->name('welcome'); 


Route::get('/search', [ResourceController::class, 'searchview'])->name('resources.search');

Route::post('/search',[ResourceController::class,'search']);


