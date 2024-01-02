<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::get('/dateSearch', [SearchController::class, 'dateSearch'])->name('dateSearch');
