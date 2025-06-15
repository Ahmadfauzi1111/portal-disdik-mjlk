<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HalloDisdikController extends Controller
{
    public function index(Request $request)
    {
        $kategoriList = ['Talkshow', 'Pembelajaran', 'Pesan Edukasi'];
        $kategori = $request->input('kategori', $kategoriList[0]);
        $search = $request->input('q');

        // ✅ Video YouTube valid dengan thumbnail dan embed aktif
        $allVideos = collect([
            [
                'id' => 'dd_bfQP7Exs', // Rick Astley
                'title' => 'Talkshow Pendidikan Nasional',
                'kategori' => 'Talkshow',
                'tanggal' => '2024-04-12',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'dd_bfQP7Exs', // Rick Astley
                'title' => 'Talkshow Pendidikan Nasional',
                'kategori' => 'Talkshow',
                'tanggal' => '2024-04-12',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'dd_bfQP7Exs', // Rick Astley
                'title' => 'Talkshow Pendidikan Nasional',
                'kategori' => 'Talkshow',
                'tanggal' => '2024-04-12',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'dd_bfQP7Exs', // Rick Astley
                'title' => 'Talkshow Pendidikan Nasional',
                'kategori' => 'Talkshow',
                'tanggal' => '2024-04-12',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'dd_bfQP7Exs', // Rick Astley
                'title' => 'Talkshow Pendidikan Nasional',
                'kategori' => 'Talkshow',
                'tanggal' => '2024-04-12',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'dd_bfQP7Exs', // Rick Astley
                'title' => 'Talkshow Pendidikan Nasional',
                'kategori' => 'Talkshow',
                'tanggal' => '2024-04-12',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'dd_bfQP7Exs', // Rick Astley
                'title' => 'Talkshow Pendidikan Nasional',
                'kategori' => 'Talkshow',
                'tanggal' => '2024-04-12',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'lTTajzrSkCw', // TEDx education
                'title' => 'Talkshow: Masa Depan Pembelajaran',
                'kategori' => 'Talkshow',
                'tanggal' => '2024-03-20',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'ZVznzY7EjuY', // Belajar Web Development
                'title' => 'Belajar Pemrograman Web Dasar',
                'kategori' => 'Pembelajaran',
                'tanggal' => '2024-02-15',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'lTTajzrSkCw', // Tutorial HTML CSS
                'title' => 'HTML & CSS Tutorial Lengkap',
                'kategori' => 'Pembelajaran',
                'tanggal' => '2024-01-05',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'lTTajzrSkCw', // Hygiene / UNICEF handwashing video
                'title' => 'Pentingnya Cuci Tangan (UNICEF)',
                'kategori' => 'Pesan Edukasi',
                'tanggal' => '2023-12-01',
                'thumbnail' => 'berita_1.jpg',
            ],
            [
                'id' => 'lTTajzrSkCw', // Edukasi Kesehatan Umum
                'title' => 'Pesan Edukasi: Hidup Sehat Dimulai dari Rumah',
                'kategori' => 'Pesan Edukasi',
                'tanggal' => '2023-11-11',
                'thumbnail' => 'berita_1.jpg',
            ],
        ]);

        // Filter berdasarkan kategori & pencarian
        $filtered = $allVideos
            ->where('kategori', $kategori)
            ->filter(function ($video) use ($search) {
                return !$search || str_contains(strtolower($video['title']), strtolower($search));
            });

        // Pagination manual
        $perPage = 6;
        $page = $request->input('page', 1);
        $paginated = new LengthAwarePaginator(
            $filtered->slice(($page - 1) * $perPage, $perPage)->values(),
            $filtered->count(),
            $perPage,
            $page,
            ['path' => url()->current(), 'query' => $request->query()]
        );

        // Preload semua tab video
        $videos = [];
        foreach ($kategoriList as $kat) {
            $videos[$kat] = $allVideos->where('kategori', $kat)->values();
        }

        return view('auth.pages.hallo_disdik.index', compact(
            'kategoriList',
            'kategori',
            'search',
            'paginated',
            'videos'
        ));
    }
}
