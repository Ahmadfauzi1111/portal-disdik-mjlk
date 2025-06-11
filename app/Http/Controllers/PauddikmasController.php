<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PauddikmasController extends Controller
{
    public function index()
    {
        return view('pages.profile.pauddikmas.index');
    }
}
