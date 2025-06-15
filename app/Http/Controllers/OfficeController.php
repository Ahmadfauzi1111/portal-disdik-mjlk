<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $officials = [
            [
                'img' => 'wabup.png',
                'title' => 'Kepala Dinas Pendidikan',
                'name' => 'H. Rd. Umar Maruf, M.Pd'
            ],
            [
                'img' => 'sekdis.png',
                'title' => 'Plt. Sekertaris Dinas',
                'name' => 'Budie Winarto'
            ],
            [
                'img' => 'wabup.png',
                'title' => 'Kepala Bidang GTK',
                'name' => 'Yayah Patimah'
            ],
            [
                'img' => 'sekdis.png',
                'title' => 'Kepala Bidang Pauddikmas',
                'name' => 'Budie Winarto'
            ],
            [
                'img' => 'irma.png',
                'title' => 'Kepala Bidang SD',
                'name' => 'Irma Agustini Pratiwi'
            ],
            [
                'img' => 'memet.png',
                'title' => 'Kepala Bidang SMP',
                'name' => 'Memet Ahmad Slamet'
            ],
            [
                'img' => 'wabup.png',
                'title' => 'Kepala Seksi Tenaga Pendidikan',
                'name' => 'Sherly Fatimah Faturochman'
            ],
            [
                'img' => 'wabup.png',
                'title' => 'Kepala Seksi Pendidikan',
                'name' => 'Ilham Ramadhan'
            ],
        ];

        return view('auth.pages.profile.office.index', compact('officials'));
    }
}
