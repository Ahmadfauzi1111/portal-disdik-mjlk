<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilePpidController extends Controller
{
    public function index()
    {
        return view('auth.pages.ppid.profile_ppid.index');
    }
}
