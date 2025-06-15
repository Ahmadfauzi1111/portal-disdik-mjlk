@extends('auth.layouts.lp')

@section('content')
    <!-- Page Header Section -->
    <div class="relative min-h-[340px] flex items-center justify-center text-center">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-800 via-blue-900 to-black opacity-80 z-0"></div>
        <div class="relative z-10 px-4">
            <h1 class="text-4xl font-bold text-white mb-4">Publikasi Berita</h1>
            <nav class="text-sm text-gray-200">
                <ol class="flex justify-center space-x-2">
                    <li><a href="/" class="text-white hover:underline">Home</a></li>
                    <li>/</li>
                    <li class="text-white">Publikasi Berita</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Search & Filter -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari berita layanan..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <select
                    id="categoryFilter"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Semua Kategori</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Administrasi">Administrasi</option>
                    <option value="Rekreasi">Rekreasi</option>
                    <option value="Surat">Surat</option>
                </select>
            </div>

            <!-- Total -->
            <div id="totalServices" class="inline-block bg-blue-600 text-white text-sm px-5 py-2 rounded-lg shadow mb-6">
                <strong class="text-lg">0 Berita</strong> <span class="italic">(Update per Juni 2025)</span>
            </div>

            <!-- Grid -->
            <div id="serviceList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>

            <!-- Pagination -->
            <div class="flex justify-center mt-10 gap-4">
                <button id="prevBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Sebelumnya</button>
                <button id="nextBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Berikutnya</button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const services = [
            {
                title: "Mutasi Peserta Didik",
                desc: "Layanan Mutasi untuk siswa SD, SMP, Pauddikmas agar dapat berpindah sekolah secara resmi.",
                tags: ["Pendidikan"],
                img: "/images/berita_1.jpg",
                date: "2025-05-01",
                author: "Admin Disdik"
            },
            {
                title: "Penerimaan Magang/PKL",
                desc: "Kesempatan magang/PKL terbuka bagi mahasiswa dan siswa untuk belajar langsung di lingkungan Dinas.",
                tags: ["Pendidikan"],
                img: "/images/berita_2.jpg",
                date: "2025-04-20",
                author: "Humas Disdik"
            },
            {
                title: "Permohonan Surat Keterangan",
                desc: "Layanan pembuatan surat-surat seperti surat aktif, surat keterangan, dan lainnya secara online.",
                tags: ["Administrasi", "Surat"],
               img: "/images/berita_3.jpg",
                date: "2025-04-15",
                author: "Pelayanan Publik"
            },
            {
                title: "Layanan Kunjungan Edukasi",
                desc: "Menerima permintaan kunjungan dari sekolah lain atau institusi untuk melihat sistem pendidikan lokal.",
                tags: ["Rekreasi", "Pendidikan"],
               img: "/images/berita_4.jpg",
                date: "2025-04-05",
                author: "Sekretariat"
            },
            {
                title: "Pengajuan Dana BOS",
                desc: "Proses pengajuan dana BOS untuk sekolah negeri dan swasta kini lebih mudah melalui portal ini.",
                tags: ["Administrasi"],
               img: "/images/berita_5.jpg",
                date: "2025-03-28",
                author: "Keuangan Disdik"
            },
            {
                title: "Pendaftaran Lomba Pendidikan",
                desc: "Daftar lomba antar pelajar, guru, dan sekolah kini terbuka. Raih prestasi dan tunjukkan potensimu.",
                tags: ["Pendidikan", "Rekreasi"],
               img: "/images/berita_6.jpg",
                date: "2025-03-10",
                author: "Bidang Prestasi"
            },
        ];

        const itemsPerPage = 6;
        let currentPage = 1;
        let filteredServices = services;

        const serviceList = document.getElementById("serviceList");
        const searchInput = document.getElementById("searchInput");
        const totalServices = document.getElementById("totalServices");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");
        const categoryFilter = document.getElementById("categoryFilter");

        function highlightKeyword(text, keyword) {
            if (!keyword) return text;
            const re = new RegExp(`(${keyword})`, "gi");
            return text.replace(re, '<mark class="bg-yellow-200">$1</mark>');
        }

        function renderServices() {
            const keyword = searchInput.value.toLowerCase();
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageItems = filteredServices.slice(start, end);

            if (filteredServices.length === 0) {
                serviceList.innerHTML = `
        <div class="col-span-full text-center text-gray-500 italic">
            <img src="/images/notfound.svg" alt="not found" class="w-40 mx-auto mb-4" />
            Tidak ada berita ditemukan.
        </div>`;
                totalServices.innerHTML = `<strong class="text-lg">0 Berita</strong> <span class="italic">(Update per Juni 2025)</span>`;
                prevBtn.disabled = true;
                nextBtn.disabled = true;
                return;
            }

            serviceList.innerHTML = pageItems.map((service) => {
                const globalIndex = services.indexOf(service);
                const tagsHtml = service.tags.map(tag =>
                    `<span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">${tag}</span>`
                ).join(" ");

                const isRecent = (new Date() - new Date(service.date)) / (1000 * 60 * 60 * 24) < 14;
                const recentBadge = isRecent
                    ? `<span class="absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded shadow">Baru</span>`
                    : "";

                return `
        <a href="{{ route('publikasi.news') }}" class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 overflow-hidden flex flex-col h-full transform hover:scale-[1.01]">
            <div class="relative">
                <img src="${service.img}" alt="gambar berita" class="w-full h-56 object-cover" />
                <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white text-xs px-2 py-1 m-2 rounded">
                    ${new Date(service.date).toLocaleDateString('id-ID')}
                </div>
                ${recentBadge}
            </div>
            <div class="p-5 flex flex-col gap-2 flex-1">
                <h3 class="text-xl font-semibold text-gray-800 leading-tight line-clamp-2">
                    ${highlightKeyword(service.title, keyword)}
                </h3>
                <p class="text-sm text-gray-600 line-clamp-3">
                    ${highlightKeyword(service.desc, keyword)}
                </p>
                <div class="flex justify-between items-end mt-auto pt-2">
                    <span class="text-xs text-gray-500">Oleh <strong>${service.author}</strong></span>
                    <div class="flex flex-wrap gap-1 justify-end">
                        ${tagsHtml}
                    </div>
                </div>
            </div>
        </a>`;
            }).join("");

            totalServices.innerHTML = `<strong class="text-lg">${filteredServices.length} Berita</strong> <span class="italic">(Update per Juni 2025)</span>`;
            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage * itemsPerPage >= filteredServices.length;
        }

        function applyFilters() {
            const keyword = searchInput.value.toLowerCase();
            const selectedCategory = categoryFilter.value;

            filteredServices = services.filter(service => {
                const matchesKeyword =
                    service.title.toLowerCase().includes(keyword) ||
                    service.desc.toLowerCase().includes(keyword) ||
                    service.tags.some(tag => tag.toLowerCase().includes(keyword));
                const matchesCategory = selectedCategory === "" || service.tags.includes(selectedCategory);
                return matchesKeyword && matchesCategory;
            });

            currentPage = 1;
            renderServices();
        }

        searchInput.addEventListener("input", applyFilters);
        categoryFilter.addEventListener("change", applyFilters);
        prevBtn.addEventListener("click", () => {
            if (currentPage > 1) {
                currentPage--;
                renderServices();
            }
        });
        nextBtn.addEventListener("click", () => {
            if (currentPage * itemsPerPage < filteredServices.length) {
                currentPage++;
                renderServices();
            }
        });

        // First render
        renderServices();
    </script>
@endpush
