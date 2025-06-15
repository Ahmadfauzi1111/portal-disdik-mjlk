@extends('auth.layouts.lp')

@push('scripts')
    <script>
        // Data layanan
        const services = [
            {
                title: "Mutasi Peserta Didik",
                desc: "Layanan Mutasi untuk siswa SD, SMP, Pauddikmas",
                tags: ["Rekreasi", "Pendidikan"],
                img: "https://cdn-icons-png.flaticon.com/512/3063/3063821.png"
            },
            {
                title: "Penerimaan Magang/PKL",
                desc: "Layanan magang/PKL untuk mahasiswa dan siswa.",
                tags: ["Pendidikan"],
                img: "https://cdn-icons-png.flaticon.com/512/3063/3063821.png"
            },
            {
                title: "Seleksi Penerimaan Murid Baru (SPMB)",
                desc: "Proses seleksi siswa baru untuk SMA/SMK/SLB.",
                tags: ["Pendidikan"],
                img: "https://cdn-icons-png.flaticon.com/512/3063/3063821.png"
            },
            {
                title: "Legalisir Ijazah",
                desc: "Legalisasi resmi fotokopi ijazah/STTB.",
                tags: ["Administrasi"],
                img: "https://cdn-icons-png.flaticon.com/512/3063/3063821.png"
            },
            {
                title: "Surat Keterangan Pengganti Ijazah",
                desc: "Layanan Surat Keterangan Pengganti Ijazah.",
                tags: ["Administrasi"],
                img: "https://cdn-icons-png.flaticon.com/512/3063/3063821.png"
            },
            {
                title: "Tunjangan Profesi Guru (TPG)",
                desc: "Layanan Tunjangan Profesi Guru (TPG).",
                tags: ["Pendidikan", "Surat"],
                img: "https://cdn-icons-png.flaticon.com/512/2790/2790166.png"
            }
        ];

        const itemsPerPage = 9;
        let currentPage = 1;
        let filteredServices = services;

        const serviceList = document.getElementById("serviceList");
        const searchInput = document.getElementById("searchInput");
        const totalServices = document.getElementById("totalServices");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");

        function highlightKeyword(text, keyword) {
            if (!keyword) return text;
            const re = new RegExp(`(${keyword})`, "gi");
            return text.replace(re, '<mark class="bg-yellow-200">$1</mark>');
        }

        function renderServices() {
            const keyword = searchInput.value.toLowerCase();

            // Filter untuk halaman
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageItems = filteredServices.slice(start, end);

            // Jika tidak ada hasil
            if (filteredServices.length === 0) {
                serviceList.innerHTML = `
                    <div class="col-span-full text-center text-gray-500 italic">
                        Tidak ada layanan ditemukan.
                    </div>
                `;
                totalServices.innerHTML = `
                    <strong class="text-lg">0 Layanan</strong>
                    <span class="italic">(Update per Mei 2025)</span>
                `;
                prevBtn.disabled = true;
                nextBtn.disabled = true;
                return;
            }

            // Render item
            serviceList.innerHTML = pageItems.map((service) => {
                const globalIndex = services.indexOf(service);
                const tagsHtml = service.tags.map(tag =>
                    `<span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded">${tag}</span>`
                ).join(" ");

                return `
                <a href="{{ route('public_service.detail') }}"
                   class="block bg-white rounded-lg shadow p-4 hover:shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-xl flex flex-col h-full">

                    <div class="flex items-center mb-2">
                        <img src="${service.img}" alt="icon" class="w-8 h-8 mr-3 flex-shrink-0" />
                        <h3 class="text-base font-semibold text-gray-800 line-clamp-2">
                            ${highlightKeyword(service.title, keyword)}
                        </h3>
                    </div>

                    <p class="text-sm text-gray-600 line-clamp-2 mb-2">
                        ${highlightKeyword(service.desc, keyword)}
                    </p>

                    <div class="flex flex-wrap gap-2">${tagsHtml}</div>
                </a>
            `;
            }).join("");

            // Update total layanan
            totalServices.innerHTML = `
                <strong class="text-lg">${filteredServices.length} Layanan</strong>
                <span class="italic">(Update per Mei 2025)</span>
            `;

            // Pagination control
            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage * itemsPerPage >= filteredServices.length;
        }

        searchInput.addEventListener("input", () => {
            const keyword = searchInput.value.toLowerCase();
            filteredServices = services.filter(service =>
                service.title.toLowerCase().includes(keyword) ||
                service.desc.toLowerCase().includes(keyword) ||
                service.tags.some(tag => tag.toLowerCase().includes(keyword))
            );
            currentPage = 1;
            renderServices();
        });

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

        // Render pertama kali
        renderServices();
    </script>
@endpush

@section('content')
    <!-- Page Header Section with Gradient Background -->
    <div class="relative min-h-[340px] flex items-center justify-center text-center">
        <!-- Background gradient overlay -->
        <div class="absolute inset-0" style="background: radial-gradient(100% 820.78% at 0% 0%, rgb(8 20 241) 0%, rgba(1, 32, 39, 0.7) 61.62%); z-index: 0;"></div>

        <!-- Foreground content -->
        <div class="relative z-10 px-4">
            <h1 class="text-4xl font-bold text-white mb-4">Layanan Publik</h1>
            <nav class="text-sm text-gray-200">
                <ol class="flex justify-center space-x-2">
                    <li><a href="/" class="text-white hover:underline">Home</a></li>
                    <li>/</li>
                    <li class="text-white">Layanan Publik</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Input Pencarian -->
            <div class="mb-6">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari Layanan Sekolah"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>

            <!-- Total Layanan -->
            <div class="mb-10">
                <div id="totalServices" class="inline-block bg-green-600 text-white text-sm px-5 py-2 rounded-lg shadow">
                    <strong class="text-lg">0 Layanan</strong> <span class="italic">(Update per Mei 2025)</span>
                </div>
            </div>

            <!-- Grid Layanan -->
            <div id="serviceList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>

            <!-- Pagination -->
            <div class="flex justify-center mt-10 gap-4">
                <button id="prevBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Sebelumnya</button>
                <button id="nextBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Berikutnya</button>
            </div>
        </div>
    </section>

@endsection
