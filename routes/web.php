<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/search', [ResourceController::class, 'searchview'])->name('resources.search');
Route::post('/search',[ResourceController::class,'search']);

