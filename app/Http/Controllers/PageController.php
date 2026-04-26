<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Untuk Route::get('/', ...)
    public function beranda() {
        return view('beranda');
    }

    // Untuk Route::get('/tentangkami', ...)
    public function tk() {
        return view('tentangkami');
    }

    // Untuk Route::get('/layanan', ...)
    public function lyn() {
        return view('layanan');
    }

    // Untuk Route::get('/layanan/{id}', ...)
    public function dtk($id) {
        // Nanti di sini logikanya ambil data paket berdasarkan $id
        return view('detailtk', ['id' => $id]);
    }
}