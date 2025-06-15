<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GtkController extends Controller
{
    public function index()
    {
        return view('auth.pages.profile.gtk.index');
    }
}
