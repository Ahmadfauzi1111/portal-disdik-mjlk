<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicInformationListController extends Controller
{
    public function index()
    {
        return view('auth.pages.ppid.public_information_list.index');
    }
}
