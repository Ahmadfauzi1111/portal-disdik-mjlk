<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicServiceController extends Controller
{
    public function index() {
        return view('auth.pages.public_service.index');
    }

    public function detail() {
        return view('auth.pages.public_service.detail');
    }
}
