<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;

class PageController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function tk()
    {
        return view('tentangkami');
    }

    public function lyn()
    {
        $paket = JenisLayanan::latest()->get();

        return view('layanan', compact('paket'));
    }

    public function dtk($id)
    {
        $paket = JenisLayanan::with([
            'syaratKetentuan',
            'fasilitas',
            'keunggulanPaket',
            'itinerary',
        ])->findOrFail($id);

        return view('detailtk', compact('paket'));
    }
}