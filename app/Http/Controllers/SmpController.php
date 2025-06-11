<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmpController extends Controller
{
    public function index()
    {
        return view('pages.profile.smp.index');
    }
}
