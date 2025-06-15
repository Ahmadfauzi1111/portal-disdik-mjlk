<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        return view('auth.pages.publikasi.news.index');
    }

    public function detail()
    {
        return view('auth.pages.publikasi.news.detail');
    }
}
