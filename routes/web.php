<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search/book', [\App\Http\Controllers\BookController::class, 'searchBook']);

