<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/search', [ResourceController::class, 'searchview'])->name('resources.search');
//Route::get('/search-books', [ResourceController::class, 'booksview'])->name('resources.search');

Route::post('/search',[ResourceController::class,'search']);
//Route::post('/search-books', [ResourceController::class, 'searchBooks']);


