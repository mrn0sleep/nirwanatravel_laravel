<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (Public)
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/tentangkami', [PageController::class, 'tk'])->name('tk');
Route::get('/layanan', [PageController::class, 'lyn'])->name('lyn');
Route::get('/layanan/{id}', [PageController::class, 'dtk'])->name('dtk');
Route::get('/detail-paket', function () {
    return view('detailtk');
})->name('detailtk');


/*
|--------------------------------------------------------------------------
| Dashboard (Login Required)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware(['auth', 'admin'])->group(function () {
  //  Route::get('/admin/dashboard', function () {
    //    return view('admin.dashboard'); // Bikin file view-nya ya!
    //})->name('admin.dashboard');
    
    // Taruh CRUD Paket Wisata kamu di sini
//});

require __DIR__.'/auth.php';

use App\Http\Controllers\LandingPageController;

Route::get('/landing', [LandingPageController::class, 'index']);