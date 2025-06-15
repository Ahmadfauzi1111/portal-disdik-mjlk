@extends('auth.layouts.lp')

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sections = document.querySelectorAll("section[id]");
            const navLinks = document.querySelectorAll(".scroll-link");

            function activateLink() {
                let current = "";
                sections.forEach(section => {
                    const sectionTop = section.offsetTop - 120;
                    if (pageYOffset >= sectionTop) {
                        current = section.getAttribute("id");
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove("bg-blue-100", "text-blue-700", "font-semibold");
                    if (link.dataset.target === current) {
                        link.classList.add("bg-blue-100", "text-blue-700", "font-semibold");
                    }
                });
            }

            window.addEventListener("scroll", activateLink);

            navLinks.forEach(link => {
                link.addEventListener("click", function (e) {
                    e.preventDefault();
                    const targetId = link.getAttribute("href").substring(1);
                    document.getElementById(targetId).scrollIntoView({ behavior: "smooth", block: "start" });
                });
            });
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="relative min-h-[340px] flex items-center justify-center text-center">
        <div class="absolute inset-0" style="background: radial-gradient(100% 820.78% at 0% 0%, rgb(8 20 241) 0%, rgba(1, 32, 39, 0.7) 61.62%);"></div>
        <div class="relative z-10 px-4">
            <h1 class="text-4xl font-bold text-white mb-4">Mutasi Siswa</h1>
            <nav class="text-sm text-gray-200">
                <ol class="flex justify-center space-x-2">
                    <li><a href="/" class="text-white hover:underline">Home</a></li>
                    <li>/</li>
                    <li class="text-white">Mutasi Siswa</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <section class="pt-16 pb-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 flex flex-col lg:flex-row gap-8">
            <!-- Sidebar -->
            <div class="w-full lg:w-1/3 space-y-4">
                <div class="bg-white shadow rounded-xl p-4 space-y-2">
                    <h2 class="text-lg font-semibold text-gray-800 mb-3">Konten Layanan</h2>
                    @foreach ([
                        'media' => 'Media dan Informasi',
                        'manfaat' => 'Manfaat Layanan',
                        'fasilitas' => 'Fasilitas',
                        'syarat' => 'Syarat & Ketentuan',
                        'alur' => 'Alur Layanan',
                        'faq' => 'FAQ'
                    ] as $id => $label)
                        <a href="#{{ $id }}" data-target="{{ $id }}" class="scroll-link block w-full text-left px-4 py-2 rounded-lg hover:bg-blue-50 transition">{{ $label }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Content -->
            <div class="w-full lg:w-2/3 space-y-12">
                <!-- Media dan Informasi -->
                <section id="media" class="scroll-mt-32">
                    <div class="bg-white rounded-xl shadow p-6 space-y-6">
                        <div class="rounded-xl overflow-hidden">
                            <img src="{{ asset('images/mutasi-siswa.png') }}" alt="Mutasi Siswa" class="w-full h-auto object-cover">
                        </div>

                        <div class="flex items-center justify-between bg-blue-600 text-white px-4 py-3 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <img src="{{ asset('images/operator.png') }}" class="w-8 h-8 rounded-full" alt="Operator">
                                <span class="font-semibold">Kontak Hotline</span>
                                <span class="font-bold">081120010011</span>
                            </div>
                            <a href="tel:081120010011" class="bg-white text-blue-700 px-4 py-1 rounded font-semibold hover:bg-green-100 transition">Hubungi Sekarang 📞</a>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="border rounded-lg p-4">
                                <div class="text-sm text-gray-600">Jam Operasional ({{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }})</div>
                                <div class="text-blue-700 font-semibold">Buka - Tutup Pukul 18:00</div>
                            </div>
                            <div class="border rounded-lg p-4">
                                <div class="text-sm text-gray-600">Email Hotline</div>
                                <div class="text-red-600 font-semibold">bpsdm@jabarprov.go.id</div>
                            </div>
                            <div class="border rounded-lg p-4">
                                <div class="text-sm text-gray-600">Tarif Layanan</div>
                                <div class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium inline-block">Gratis</div>
                            </div>
                            <div class="border rounded-lg p-4">
                                <div class="text-sm text-gray-600">Link Akses</div>
                                <a href="https://bpsdm.jabarprov.go.id/" target="_blank" class="text-green-700 font-semibold underline">bpsdm.jabarprov.go.id 🌐</a>
                            </div>
                            <div class="border rounded-lg p-4 md:col-span-2">
                                <div class="text-sm text-gray-600">Alamat Website Resmi</div>
                                <a href="https://bpsdm.jabarprov.go.id/" target="_blank" class="text-blue-700 font-medium underline">https://bpsdm.jabarprov.go.id/</a>
                            </div>
                            <div class="border rounded-lg p-4">
                                <div class="text-sm text-gray-600">Alamat</div>
                                <div class="text-gray-800">Jl. Kolonel Masturi KM. 3.5 No. 11, Cimahi Utara</div>
                            </div>
                            <div class="border rounded-lg p-4">
                                <div class="text-sm text-gray-600">Telepon</div>
                                <div class="text-gray-800">081120010011</div>
                            </div>
                            <div class="border rounded-lg p-4 md:col-span-2">
                                <div class="text-sm text-gray-600">Social Media</div>
                                <div class="flex space-x-4 text-blue-600 text-lg">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-tiktok"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Manfaat -->
                <section id="manfaat" class="scroll-mt-32">
                    <div class="bg-white rounded-xl shadow p-6 space-y-4 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Manfaat Layanan</h2>
                        <ul class="list-disc pl-6 text-gray-700 space-y-2 text-left inline-block">
                            <li>Transisi legal siswa antar sekolah.</li>
                            <li>Kemudahan pengajuan online.</li>
                            <li>Verifikasi data terjamin.</li>
                            <li>Koordinasi antar sekolah difasilitasi.</li>
                            <li>Status proses transparan.</li>
                        </ul>
                    </div>
                </section>

                <!-- Fasilitas -->
                <section id="fasilitas" class="scroll-mt-32">
                    <div class="bg-white rounded-xl shadow p-6 space-y-4 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Fasilitas yang Tersedia</h2>
                        <ul class="list-disc pl-6 text-gray-700 space-y-2 text-left inline-block">
                            <li>Portal online layanan mutasi.</li>
                            <li>Formulir elektronik dan validasi otomatis.</li>
                            <li>Layanan customer support online & offline.</li>
                            <li>Dashboard monitoring status.</li>
                        </ul>
                    </div>
                </section>

                <!-- Syarat -->
                <section id="syarat" class="scroll-mt-32">
                    <div class="bg-white rounded-xl shadow p-6 space-y-4 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Syarat & Ketentuan</h2>
                        <ol class="list-decimal pl-6 text-gray-700 space-y-2 text-left inline-block">
                            <li>Surat permohonan dari orang tua.</li>
                            <li>Rapor & ijazah terakhir.</li>
                            <li>Formulir mutasi lengkap.</li>
                            <li>Disetujui sekolah asal & tujuan.</li>
                        </ol>
                    </div>
                </section>

                <!-- Alur -->
                <section id="alur" class="scroll-mt-32">
                    <div class="bg-white rounded-xl shadow p-6 space-y-4 text-center">
                        <h2 class="text-2xl font-semibold text-gray-800">Alur atau Prosedur</h2>
                        <ol class="list-decimal pl-6 text-gray-700 space-y-2 text-left inline-block">
                            <li>Pengajuan oleh orang tua/siswa.</li>
                            <li>Verifikasi dokumen.</li>
                            <li>Rekomendasi dari sekolah asal.</li>
                            <li>Persetujuan dari sekolah tujuan.</li>
                            <li>Penerbitan surat mutasi.</li>
                        </ol>
                    </div>
                </section>

                <!-- FAQ -->
                <section id="faq" class="scroll-mt-32">
                    <div class="bg-white rounded-xl shadow p-6 space-y-4">
                        <h2 class="text-2xl font-semibold text-gray-800 text-center">Frequently Asked Questions</h2>
                        <div class="space-y-3">
                            @foreach ([
                                ["q" => "Apakah layanan ini gratis?", "a" => "Ya, layanan ini tidak dipungut biaya."],
                                ["q" => "Apakah mutasi bisa dilakukan antar provinsi?", "a" => "Bisa, selama mendapat persetujuan dari dua sekolah."],
                                ["q" => "Apakah bisa dilakukan secara online?", "a" => "Ya, cukup isi formulir dan unggah dokumen secara daring."]
                            ] as $item)
                                <div class="border rounded-lg">
                                    <button class="w-full text-left px-4 py-3 font-semibold text-gray-800 hover:bg-gray-100 focus:outline-none" onclick="this.nextElementSibling.classList.toggle('hidden')">
                                        {{ 'Q: ' . $item['q'] }}
                                    </button>
                                    <div class="px-4 pb-4 text-gray-700 hidden">
                                        {{ 'A: ' . $item['a'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
