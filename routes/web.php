<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PemesananController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/booking', function () {
    return view('book');
})->name('booking');

Route::get('/tampilan', [PemesananController::class, 'index'])->name('tampilan');

Route::post('/booking/store', [PemesananController::class, 'store'])->name('booking.store');

Route::get('/booking/edit/{id}', [PemesananController::class, 'edit'])->name('booking.edit');

Route::put('/booking/update/{id}', [PemesananController::class, 'update'])->name('booking.update');

Route::delete('/booking/delete/{id}', [PemesananController::class, 'destroy'])->name('booking.destroy');
