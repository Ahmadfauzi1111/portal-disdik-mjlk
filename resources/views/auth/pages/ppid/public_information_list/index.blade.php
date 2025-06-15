@extends('auth.layouts.lp')

@section('content')
    <!-- Page Header Section with Gradient Background -->
    <div class="relative min-h-[340px] flex items-center justify-center text-center">
        <!-- Background gradient overlay -->
        <div class="absolute inset-0" style="background: radial-gradient(100% 820.78% at 0% 0%, rgb(8 20 241) 0%, rgba(1, 32, 39, 0.7) 61.62%); z-index: 0;"></div>

        <!-- Foreground content -->
        <div class="relative z-10 px-4">
            <h1 class="text-4xl font-bold text-white mb-4">Daftar Informasi Publik</h1>
            <nav class="text-sm text-gray-200">
                <ol class="flex justify-center space-x-2">
                    <li><a href="/" class="text-white hover:underline">Home</a></li>
                    <li>/</li>
                    <li class="text-white">Daftar Informasi Publik</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Daftar Dokumen</h1>

        <!-- Pencarian & Filter Tahun -->
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4 mb-4 space-y-3 md:space-y-0">
            <input
                type="text"
                id="searchInput"
                placeholder="Cari dokumen..."
                class="w-full md:w-2/3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            />

            <select
                id="filterYear"
                class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="">Semua Tahun</option>
            </select>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded shadow">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Dokumen</th>
                    <th class="px-4 py-2 text-left cursor-pointer select-none" id="sortYear">
                        Tahun
                        <span id="sortIcon" class="ml-1">⬍</span>
                    </th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
                </thead>
                <tbody id="docTableBody" class="divide-y divide-gray-200"></tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center mt-6 space-x-4">
            <button id="prevBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Sebelumnya</button>
            <button id="nextBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Berikutnya</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const documents = [
            { name: "Panduan PPDB", year: 2023, file: "/docs/panduan-ppdb-2023.pdf" },
            { name: "Formulir Pendaftaran", year: 2022, file: "/docs/formulir-2022.pdf" },
            { name: "Peraturan Sekolah", year: 2024, file: "/docs/peraturan-2024.pdf" },
            { name: "Jadwal Ujian Nasional", year: 2021, file: "/docs/ujian-2021.pdf" },
            { name: "Hasil Akreditasi", year: 2020, file: "/docs/akreditasi-2020.pdf" },
            { name: "Kurikulum 2024", year: 2024, file: "/docs/kurikulum-2024.pdf" },
            { name: "Laporan Tahunan", year: 2023, file: "/docs/laporan-2023.pdf" },
            { name: "Rencana Anggaran", year: 2022, file: "/docs/anggaran-2022.pdf" },
        ];

        let currentPage = 1;
        const itemsPerPage = 5;
        let filteredDocs = [...documents];
        let sortAscending = true;

        const tableBody = document.getElementById("docTableBody");
        const searchInput = document.getElementById("searchInput");
        const filterYear = document.getElementById("filterYear");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");

        function renderYearOptions() {
            const years = [...new Set(documents.map(d => d.year))].sort((a, b) => b - a);
            years.forEach(year => {
                const option = document.createElement("option");
                option.value = year;
                option.textContent = year;
                filterYear.appendChild(option);
            });
        }

        function renderTable() {
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageItems = filteredDocs.slice(start, end);

            tableBody.innerHTML = pageItems.map((doc, index) => `
            <tr>
                <td class="px-4 py-2">${start + index + 1}</td>
                <td class="px-4 py-2">${doc.name}</td>
                <td class="px-4 py-2">${doc.year}</td>
                <td class="px-4 py-2">
                    <a href="${doc.file}" target="_blank" class="text-blue-600 hover:underline">Unduh</a>
                </td>
            </tr>
        `).join("");

            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage * itemsPerPage >= filteredDocs.length;
        }

        function applyFilterAndSearch() {
            const keyword = searchInput.value.toLowerCase();
            const selectedYear = filterYear.value;

            filteredDocs = documents.filter(doc => {
                const matchesKeyword = doc.name.toLowerCase().includes(keyword);
                const matchesYear = selectedYear ? doc.year.toString() === selectedYear : true;
                return matchesKeyword && matchesYear;
            });

            currentPage = 1;
            renderTable();
        }

        function sortByYear() {
            filteredDocs.sort((a, b) => sortAscending ? a.year - b.year : b.year - a.year);
            sortAscending = !sortAscending;
            updateSortIcon();
            currentPage = 1;
            renderTable();
        }

        function updateSortIcon() {
            document.getElementById("sortIcon").textContent = sortAscending ? "⬆" : "⬇";
        }

        // Event Listeners
        searchInput.addEventListener("input", applyFilterAndSearch);
        filterYear.addEventListener("change", applyFilterAndSearch);
        prevBtn.addEventListener("click", () => {
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });
        nextBtn.addEventListener("click", () => {
            if (currentPage * itemsPerPage < filteredDocs.length) {
                currentPage++;
                renderTable();
            }
        });
        document.getElementById("sortYear").addEventListener("click", sortByYear);

        // Init
        renderYearOptions();
        renderTable();
    </script>
@endpush

