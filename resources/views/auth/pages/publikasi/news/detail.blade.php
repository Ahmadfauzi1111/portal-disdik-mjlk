@extends('auth.layouts.lp')

@section('content')
    <!-- Header -->
    <div class="relative min-h-[300px] flex items-center justify-center text-center">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-800 via-blue-900 to-black opacity-80 z-0"></div>
        <div class="relative z-10 px-4">
            <h1 class="text-4xl font-bold text-white mb-4">Publikasi Berita</h1>
            <nav class="text-sm text-gray-200">
                <ol class="flex justify-center space-x-2">
                    <li><a href="/" class="text-white hover:underline">Home</a></li>
                    <li>/</li>
                    <li class="text-white">Detail Berita</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Konten -->
    <section class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-4 gap-10">
            <!-- Konten Utama -->
            <div class="md:col-span-3">
                <!-- Judul -->
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 leading-snug">
                        Mutasi Peserta Didik Resmi Dibuka Secara Online
                    </h1>
                    <div class="text-sm text-gray-500 mt-1">Senin, 1 Mei 2025 | Oleh: <strong class="text-gray-700">Admin Disdik</strong></div>
                </div>

                <!-- Slider Gambar -->
                <div class="relative mb-8 rounded-xl overflow-hidden shadow">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="/images/berita_1.jpg" class="w-full h-120 object-cover" /></div>
                            <div class="swiper-slide"><img src="/images/berita_2.jpg" class="w-full h-120 object-cover" /></div>
                        </div>
                        <div class="swiper-button-next text-blue-700"></div>
                        <div class="swiper-button-prev text-blue-700"></div>
                    </div>
                </div>

                <!-- Isi Berita -->
                <div class="text-gray-800 text-lg leading-relaxed mb-8 space-y-5">
                    <p>
                        Pemerintah melalui Dinas Pendidikan resmi membuka layanan mutasi peserta didik secara daring. Kini, siswa dari jenjang SD, SMP, maupun pendidikan nonformal dapat mengajukan permohonan mutasi melalui platform digital resmi tanpa harus datang ke kantor dinas.
                    </p>
                    <p>
                        Proses ini diharapkan memberikan kemudahan bagi wali murid serta mempercepat penyesuaian administrasi antarsekolah. Semua dokumen persyaratan dapat diunggah langsung dan akan diverifikasi secara daring.
                    </p>
                </div>

                <!-- Tags -->
                <div class="flex gap-2 flex-wrap mb-10">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Pendidikan</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Mutasi</span>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Digitalisasi</span>
                </div>

                <!-- Tombol Kembali -->
                <div class="mb-12">
                    <a href="#" onclick="history.back()" class="inline-flex items-center text-blue-600 hover:underline text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke daftar berita
                    </a>
                </div>

                <!-- Berita Terkait -->
                <div class="mb-12">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Berita Terkait</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach(['berita_3.jpg', 'berita_4.jpg', 'berita_5.jpg'] as $img)
                            <div class="bg-gray-50 rounded-lg shadow hover:shadow-md transition p-4">
                                <img src="/images/{{ $img }}" class="w-full h-40 object-cover rounded mb-3" alt="Berita Terkait" />
                                <h3 class="text-md font-bold text-gray-800 mb-1">Judul Berita Terkait</h3>
                                <p class="text-sm text-gray-600 line-clamp-2">Isi singkat dari berita yang memiliki tag yang sama...</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar: Berita Terbaru -->
            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-gray-800 border-b pb-2">Berita Terbaru</h3>
                <ul class="space-y-5">
                    @foreach([
                        ['img' => 'berita_1.jpg', 'title' => 'Peluncuran Sistem Zonasi Baru Tahun Ajaran 2025', 'date' => '12 Mei 2025'],
                        ['img' => 'berita_2.jpg', 'title' => 'Kegiatan Workshop Guru Inovatif se-Bandung Raya', 'date' => '8 Mei 2025'],
                        ['img' => 'berita_3.jpg', 'title' => 'Evaluasi Program Sekolah Penggerak Tahap II', 'date' => '5 Mei 2025'],
                    ] as $news)
                        <li class="flex items-start gap-4">
                            <img src="/images/{{ $news['img'] }}" class="w-22 h-20 object-cover rounded-md flex-shrink-0" alt="Thumbnail">
                            <div class="flex flex-col">
                                <a href="#" class="text-sm font-semibold text-gray-800 hover:text-blue-700 leading-snug line-clamp-2">
                                    {{ $news['title'] }}
                                </a>
                                <span class="text-xs text-gray-500 mt-1">{{ $news['date'] }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Tombol Lihat Semua -->
                <div class="pt-4 text-center">
                    <a href="#" class="inline-block text-blue-600 text-sm font-medium hover:underline">
                        Lihat Semua Berita &rarr;
                    </a>
                </div>
            </div>


        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush
