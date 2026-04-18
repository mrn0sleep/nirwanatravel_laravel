<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/tentangkami', [PageController::class, 'tk'])->name('tk');
Route::get('/layanan', [PageController::class, 'lyn'])->name('lyn');
Route::get('/layanan/{id}', [PageController::class, 'dtk'])->name('dtk');