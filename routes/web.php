<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/dateSearch', [SearchController::class, 'dateSearch'])->name('dateSearch');
Route::get('/adminSearch', [SearchController::class, 'adminSearch'])->name('adminSearch');

Route::get('reservations/reserve', [ReservationController::class, 'reserve']);
Route::resource('reservations', ReservationController::class);
Route::resource('vehicles', VehicleController::class);

