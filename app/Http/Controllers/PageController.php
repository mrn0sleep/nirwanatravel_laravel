<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('layanan');
    }

    public function dtk()
    {
        return view('detailtk');
    }


}