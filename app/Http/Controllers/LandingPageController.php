<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;

class LandingPageController extends Controller
{
    public function index()
    {
        $pakets = JenisLayanan::with('syaratKetentuan')->get();
        
        return view('welcome', compact('pakets'));
    }
}
