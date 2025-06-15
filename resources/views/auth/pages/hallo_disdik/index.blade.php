@extends('auth.layouts.lp')

@section('content')
    <div id="loadingOverlay" class="absolute inset-0 bg-white/80 flex items-center justify-center hidden z-50">
        <span class="animate-spin text-2xl">⏳</span>
    </div>

    <!-- Header Section -->
    <header class="relative w-full h-[220px] sm:h-[400px] md:h-[560px] lg:h-[640px] xl:h-[740px] bg-no-repeat bg-cover bg-center flex items-center justify-center text-center"
            style="background-image: url('{{ asset('images/hallo-disdik.png') }}');"
            aria-label="Banner Pendidikan">
    </header>

    <section class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-4 uppercase">Kategori Video</h2>
            <hr class="border-gray-300 w-1/2 mx-auto mb-6">

            <!-- Filter Kategori Tabs -->
            <div class="flex overflow-x-auto gap-3 mb-6 justify-start sm:justify-center px-2 sm:px-0">
                @foreach($kategoriList as $kat)
                    <button
                        id="btn-tab-{{ $kat }}"
                        onclick="changeTab('{{ $kat }}')"
                        class="kategori-tab px-4 sm:px-6 py-2 rounded-full font-semibold transition text-base sm:text-xl text-gray-800 hover:text-teal-600 bg-white whitespace-nowrap flex-shrink-0"
                    >
                        {{ strtoupper($kat) }}
                    </button>
                @endforeach
            </div>

            <!-- Pencarian -->
            <div class="flex flex-col sm:flex-row gap-3 mb-10 w-full px-4 sm:px-0 max-w-7xl mx-auto">
                <input type="text" id="searchInput" placeholder="Cari Video"
                       class="flex-1 rounded-xl border border-gray-300 px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-yellow-400">

                <button type="button" onclick="applySearch()"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-4 py-3 rounded-xl text-base transition-all">
                    🔍 CARI
                </button>

                <button type="button" onclick="resetSearch()"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-3 rounded-xl text-base transition-all">
                    🧹 RESET
                </button>
            </div>

            <!-- Modal Video -->
            <div id="videoModal" class="fixed inset-0 z-50 bg-black/70 flex items-center justify-center hidden">
                <div class="relative w-full max-w-4xl aspect-video">
                    <iframe id="youtubePlayer"
                            class="w-full h-full rounded-xl shadow-lg"
                            src=""
                            frameborder="0"
                            allow="autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>

                    <button onclick="closeModal()"
                            class="absolute top-2 right-2 text-white bg-black bg-opacity-50 hover:bg-opacity-80 rounded-full px-3 py-1 text-xl font-bold z-50">
                        &times;
                    </button>
                </div>
            </div>

            <!-- Grid Video -->
            @foreach($kategoriList as $kat)
                <div class="video-tab" id="tab-{{ $kat }}" style="display:none">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6" id="grid-{{ $kat }}">
                        @foreach($videos[$kat] as $video)
                            <div class="group border rounded shadow bg-white hover:shadow-lg cursor-pointer transition video-card" data-title="{{ strtolower($video['title']) }}">
                                <div class="relative" onclick="openModal('{{ $video['id'] }}')">
                                    <img src="https://img.youtube.com/vi/{{ $video['id'] }}/0.jpg"
                                         class="w-full aspect-video object-cover rounded-t" alt="{{ $video['title'] }}">
                                </div>
                                <div class="p-4 text-left">
                                    <h2 class="font-semibold text-base line-clamp-2">{{ $video['title'] }}</h2>
                                    <p class="text-sm text-gray-500 mt-1">{{ $video['kategori'] }} · {{ \Carbon\Carbon::parse($video['tanggal'])->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6 flex justify-center gap-4">
                        <button onclick="prevPage('{{ $kat }}')" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white font-bold rounded-lg">&laquo;</button>
                        <button onclick="nextPage('{{ $kat }}')" class="px-4 py-2 bg-blue-400 hover:bg-blue-500 text-white font-bold rounded-lg">&raquo;</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @push('styles')
        <style>
            #videoModal {
                transition: all 0.3s ease;
            }
            .kategori-tab {
                white-space: nowrap;
                flex-shrink: 0;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            let activeTab = @json($kategoriList[0]);
            const perPage = 6;
            const pageState = {};

            function changeTab(tab) {
                activeTab = tab;

                document.querySelectorAll('.video-tab').forEach(e => e.style.display = 'none');
                document.getElementById(`tab-${tab}`).style.display = 'block';

                document.querySelectorAll('.kategori-tab').forEach(e => {
                    e.classList.remove('bg-teal-500', 'text-white');
                    e.classList.add('text-gray-800', 'hover:text-teal-600', 'bg-white');
                });

                const activeButton = document.getElementById(`btn-tab-${tab}`);
                if (activeButton) {
                    activeButton.classList.remove('text-gray-800', 'hover:text-teal-600', 'bg-white');
                    activeButton.classList.add('bg-teal-500', 'text-white');
                }

                resetPagination(tab, false); // Jangan scroll saat pertama kali load tab
            }

            function openModal(videoId) {
                document.body.style.overflow = 'hidden';
                document.getElementById('loadingOverlay').classList.remove('hidden');
                document.getElementById('youtubePlayer').onload = () => {
                    document.getElementById('loadingOverlay').classList.add('hidden');
                };
                document.getElementById('youtubePlayer').src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                document.getElementById('videoModal').classList.remove('hidden');
            }

            function closeModal() {
                document.body.style.overflow = '';
                document.getElementById('youtubePlayer').src = "";
                document.getElementById('videoModal').classList.add('hidden');
            }

            function applySearch() {
                const keyword = document.getElementById('searchInput').value.toLowerCase();
                const cards = document.querySelectorAll(`#grid-${activeTab} .video-card`);
                cards.forEach(card => {
                    const title = card.dataset.title;
                    card.style.display = title.includes(keyword) ? 'block' : 'none';
                });
            }

            function resetSearch() {
                document.getElementById('searchInput').value = '';
                applySearch();
            }

            function resetPagination(tab, scroll = true) {
                pageState[tab] = 1;
                paginate(tab, scroll);
            }

            function paginate(tab, scroll = true) {
                const cards = document.querySelectorAll(`#grid-${tab} .video-card`);
                const page = pageState[tab] || 1;
                const start = (page - 1) * perPage;
                const end = start + perPage;

                cards.forEach((card, i) => {
                    card.style.display = i >= start && i < end ? 'block' : 'none';
                });

                if (scroll) {
                    const grid = document.getElementById(`grid-${tab}`);
                    if (grid) {
                        grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            }

            function prevPage(tab) {
                if (pageState[tab] > 1) {
                    pageState[tab]--;
                    paginate(tab, true);
                }
            }

            function nextPage(tab) {
                const cards = document.querySelectorAll(`#grid-${tab} .video-card`);
                const totalPages = Math.ceil(cards.length / perPage);
                if ((pageState[tab] || 1) < totalPages) {
                    pageState[tab] = (pageState[tab] || 1) + 1;
                    paginate(tab, true);
                }
            }

            document.addEventListener('DOMContentLoaded', function () {
                changeTab(activeTab);
            });
        </script>
    @endpush
@endsection
