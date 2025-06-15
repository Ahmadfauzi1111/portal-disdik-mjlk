<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariatController extends Controller
{
    public function index()
    {
        return view('auth.pages.profile.secretariat.index');
    }
}
