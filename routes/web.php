<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
#Route::get('/', function () {
#    return view('welcome');
#});

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/tentangkami', [PageController::class, 'tk'])->name('tk');
Route::get('/layanan', [PageController::class, 'lyn'])->name('lyn');
Route::get('/layanan/{id}', [PageController::class, 'dtk'])->name('dtk');