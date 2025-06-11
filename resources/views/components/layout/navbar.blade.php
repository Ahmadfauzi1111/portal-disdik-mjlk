@push('scripts')
    <script>
        document.querySelectorAll('ul > li > button').forEach(button => {
            button.addEventListener('click', (e) => {
                const expanded = button.getAttribute('aria-expanded') === 'true';
                // Tutup semua submenu dulu
                document.querySelectorAll('ul > li > button').forEach(btn => {
                    btn.setAttribute('aria-expanded', 'false');
                    document.getElementById(btn.getAttribute('aria-controls')).classList.add('hidden');
                });
                // Toggle submenu yang diklik
                if (!expanded) {
                    button.setAttribute('aria-expanded', 'true');
                    document.getElementById(button.getAttribute('aria-controls')).classList.remove('hidden');
                }
                e.stopPropagation();
            });
        });

        // Klik di luar menu akan menutup semua submenu
        document.addEventListener('click', () => {
            document.querySelectorAll('ul > li > button').forEach(btn => {
                btn.setAttribute('aria-expanded', 'false');
                document.getElementById(btn.getAttribute('aria-controls')).classList.add('hidden');
            });
        });
    </script>
@endpush

<nav class="fixed top-0 z-50 w-full flex flex-col bg-blue-700 transition-colors ease-brand duration-250 lg:bg-black/30 lg:backdrop-filter lg:backdrop-blur-lg lg:hover:bg-blue-700">
    <div class="container mx-auto flex items-center justify-between lg:justify-center px-4 sm:px-6 lg:px-8 h-20">
        <!-- Logo -->
        <a href="/" aria-current="page" target="null" aria-label="Beranda" class="w-7 h-9 lg:w-[38px] lg:h-[38px] xl:w-[197px] xl:h-[38px]">
            <picture aria-hidden="true">
                <source media="(min-width:1280px)" srcset="{{ url('images/logo-disdik.png') }}" width="228" height="44" alt="Beranda">
                <img src="{{ url('images/logo-mobile.png') }}" width="28" height="36" alt="Beranda" class="w-full h-full">
            </picture>
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex items-center gap-4 text-white ml-6 relative">
            <li class="relative">
                <button
                    class="flex items-center gap-2 cursor-pointer px-2 py-1 rounded-lg hover:bg-blue-600 hover:bg-opacity-40"
                    aria-expanded="false"
                    aria-controls="submenu-profile"
                    id="btn-profile"
                    type="button"
                >
                    <span class="leading-7">Profile</span>
                    <div aria-hidden="true" class="flex justify-center items-center">
                        <img src="{{ url('images/svg/chevron-down.svg') }}" alt="">
                    </div>
                </button>
                <ul
                    id="submenu-profile"
                    class="absolute top-full left-0 mt-1 bg-blue-700 rounded-md shadow-lg hidden min-w-[250px] z-10"
                    role="menu"
                    aria-labelledby="btn-profile"
                >
                    <li>
                        <a href="{{ route('profile.dinas') }}" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Profile Disdik</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.office') }}" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Profile Pejabat</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.secretariat') }}" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Sekretariat</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.gtk') }}" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Bidang GTK</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.pauddikmas') }}" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Bidang Pauddikmas</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.sd') }}" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Bidang SD</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.smp') }}" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Bidang SMP</a>
                    </li>
                </ul>
            </li>

            <li class="relative">
                <button
                    class="flex items-center gap-2 cursor-pointer px-2 py-1 rounded-lg hover:bg-blue-600 hover:bg-opacity-40"
                    aria-expanded="false"
                    aria-controls="submenu-layanan"
                    id="btn-layanan"
                    type="button"
                >
                    <span class="leading-7">Layanan Publik</span>
                    <div aria-hidden="true" class="flex justify-center items-center">
                        <img src="{{ url('images/svg/chevron-down.svg') }}" alt="">
                    </div>
                </button>
                <ul
                    id="submenu-layanan"
                    class="absolute top-full left-0 mt-1 bg-blue-700 rounded-md shadow-lg hidden min-w-[150px] z-10"
                    role="menu"
                    aria-labelledby="btn-layanan"
                >
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Permohonan</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Prosedur</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Jadwal</a></li>
                </ul>
            </li>

            <li class="relative">
                <button
                    class="flex items-center gap-2 cursor-pointer px-2 py-1 rounded-lg hover:bg-blue-600 hover:bg-opacity-40"
                    aria-expanded="false"
                    aria-controls="submenu-publikasi"
                    id="btn-publikasi"
                    type="button"
                >
                    <span class="leading-7">Publikasi</span>
                    <div aria-hidden="true" class="flex justify-center items-center">
                        <img src="{{ url('images/svg/chevron-down.svg') }}" alt="">
                    </div>
                </button>
                <ul
                    id="submenu-publikasi"
                    class="absolute top-full left-0 mt-1 bg-blue-700 rounded-md shadow-lg hidden min-w-[150px] z-10"
                    role="menu"
                    aria-labelledby="btn-publikasi"
                >
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Berita</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Artikel</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Laporan</a></li>
                </ul>
            </li>

            <li class="relative">
                <button
                    class="flex items-center gap-2 cursor-pointer px-2 py-1 rounded-lg hover:bg-blue-600 hover:bg-opacity-40"
                    aria-expanded="false"
                    aria-controls="submenu-spmb"
                    id="btn-spmb"
                    type="button"
                >
                    <span class="leading-7">SPMB</span>
                    <div aria-hidden="true" class="flex justify-center items-center">
                        <img src="{{ url('images/svg/chevron-down.svg') }}" alt="">
                    </div>
                </button>
                <ul
                    id="submenu-spmb"
                    class="absolute top-full left-0 mt-1 bg-blue-700 rounded-md shadow-lg hidden min-w-[150px] z-10"
                    role="menu"
                    aria-labelledby="btn-spmb"
                >
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Informasi Pendaftaran</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Jadwal Seleksi</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Pengumuman</a></li>
                </ul>
            </li>

            <li class="relative">
                <button
                    class="flex items-center gap-2 cursor-pointer px-2 py-1 rounded-lg hover:bg-blue-600 hover:bg-opacity-40"
                    aria-expanded="false"
                    aria-controls="submenu-ppid"
                    id="btn-ppid"
                    type="button"
                >
                    <span class="leading-7">PPID</span>
                    <div aria-hidden="true" class="flex justify-center items-center">
                        <img src="{{ url('images/svg/chevron-down.svg') }}" alt="">
                    </div>
                </button>
                <ul
                    id="submenu-ppid"
                    class="absolute top-full left-0 mt-1 bg-blue-700 rounded-md shadow-lg hidden min-w-[150px] z-10"
                    role="menu"
                    aria-labelledby="btn-ppid"
                >
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Informasi Publik</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Permohonan Informasi</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-blue-600" role="menuitem">Laporan</a></li>
                </ul>
            </li>
        </ul>

        <!-- Mobile Toggle Button -->
        <div class="flex lg:hidden">
            <button id="mobile-menu-toggle" type="button" class="text-white focus:outline-none" aria-label="Menu">
                <svg id="icon-open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg id="icon-close" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden flex flex-col bg-blue-600 px-4 py-4 space-y-2 lg:hidden">
        <div class="fixed bottom-0 left-0 right-0 z-50 border-t border-blue-500 navigation__sidebar top-20 bg-blue-600 lg:hidden">
            <div class="container mx-auto px-6 2xl:px-0 xl:max-w-7xl h-full">
                <div class="flex flex-col w-full h-full py-4 overflow-y-auto navigation__sidebar__container">
                    <section class="flex flex-col min-w-0"><details id="sidebar-menu-1" class="py-4 text-white transition-all duration-150 ease-in navigation__sidebar__menu"><summary class="flex items-center justify-between cursor-pointer"><h3>
                        Berita Jawa Barat
                      </h3> <div class="flex items-center justify-center w-6 h-6 rounded-full navigation__sidebar__button hover:bg-blue-600"><div class="flex justify-center items-center transition-transform ease-in cursor-pointer" fill="white" style="width: 16px; height: 16px;"><i class="jds-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="jds-icon__svg" style="width: 16px; height: 16px; transform: rotate(0deg); fill: currentcolor;"><path d="M10.7024 14.7285L18.7124 7.15369C18.8979 6.97849 19 6.74462 19 6.49525C19 6.24588 18.8979 6.01201 18.7124 5.83682L18.1227 5.27898C17.7384 4.916 17.1138 4.916 16.7301 5.27898L10.0037 11.6397L3.26988 5.27193C3.08447 5.09673 2.8373 5 2.57374 5C2.30989 5 2.06272 5.09673 1.87716 5.27193L1.28756 5.82976C1.10214 6.00509 0.999999 6.23882 0.999999 6.48819C0.999999 6.73757 1.10214 6.97144 1.28756 7.14663L9.30496 14.7285C9.49095 14.9041 9.73929 15.0006 10.0033 15C10.2683 15.0006 10.5165 14.9041 10.7024 14.7285Z"></path></svg></i></div></div></summary> <ul class="flex flex-col gap-6 py-3 pl-6 mt-3 border-l-2 border-blue-500"><li><a href="/berita?kategori=ekonomi" class="text-sm font-normal leading-6" target="null">
                            Ekonomi
                          </a></li><li><a href="/berita?kategori=kesehatan" class="text-sm font-normal leading-6" target="null">
                            Kesehatan
                          </a></li><li><a href="/berita?kategori=pendidikan" class="text-sm font-normal leading-6" target="null">
                            Pendidikan
                          </a></li><li><a href="/berita?kategori=pemerintahan" class="text-sm font-normal leading-6" target="null">
                            Pemerintahan
                          </a></li><li><a href="/berita?kategori=infrastruktur" class="text-sm font-normal leading-6" target="null">
                            Infrastruktur
                          </a></li><li><a href="/berita?kategori=sosial" class="text-sm font-normal leading-6" target="null">
                            Sosial
                          </a></li><li><a href="/berita?kategori=teknologi" class="text-sm font-normal leading-6" target="null">
                            Teknologi
                          </a></li></ul></details><details id="sidebar-menu-2" class="py-4 text-white transition-all duration-150 ease-in navigation__sidebar__menu"><summary class="flex items-center justify-between cursor-pointer"><h3>
                        Layanan Publik
                      </h3> <div class="flex items-center justify-center w-6 h-6 rounded-full navigation__sidebar__button hover:bg-blue-600"><div class="flex justify-center items-center transition-transform ease-in cursor-pointer" fill="white" style="width: 16px; height: 16px;"><i class="jds-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="jds-icon__svg" style="width: 16px; height: 16px; transform: rotate(0deg); fill: currentcolor;"><path d="M10.7024 14.7285L18.7124 7.15369C18.8979 6.97849 19 6.74462 19 6.49525C19 6.24588 18.8979 6.01201 18.7124 5.83682L18.1227 5.27898C17.7384 4.916 17.1138 4.916 16.7301 5.27898L10.0037 11.6397L3.26988 5.27193C3.08447 5.09673 2.8373 5 2.57374 5C2.30989 5 2.06272 5.09673 1.87716 5.27193L1.28756 5.82976C1.10214 6.00509 0.999999 6.23882 0.999999 6.48819C0.999999 6.73757 1.10214 6.97144 1.28756 7.14663L9.30496 14.7285C9.49095 14.9041 9.73929 15.0006 10.0033 15C10.2683 15.0006 10.5165 14.9041 10.7024 14.7285Z"></path></svg></i></div></div></summary> <ul class="flex flex-col gap-6 py-3 pl-6 mt-3 border-l-2 border-blue-500"><li><a href="/layanan-fase-kehidupan/daftar-layanan?kategori=Administrasi%20Kependudukan" class="text-sm font-normal leading-6" target="null">
                            Administrasi Kependudukan
                          </a></li><li><a href="/layanan-fase-kehidupan/daftar-layanan?kategori=Kelahiran" class="text-sm font-normal leading-6" target="null">
                            Kelahiran
                          </a></li><li><a href="/layanan-fase-kehidupan/daftar-layanan?kategori=Sekolah" class="text-sm font-normal leading-6" target="null">
                            Sekolah
                          </a></li><li><a href="/layanan-fase-kehidupan/daftar-layanan?kategori=Pendidikan%20Tinggi" class="text-sm font-normal leading-6" target="null">
                            Pendidikan Tinggi
                          </a></li><li><a href="/layanan-fase-kehidupan/daftar-layanan?kategori=Lowongan%20Pekerjaan" class="text-sm font-normal leading-6" target="null">
                            Lowongan Pekerjaan
                          </a></li><li><a href="/layanan-fase-kehidupan/daftar-layanan?kategori=Kesehatan%20Individu%20%26%20Keluarga" class="text-sm font-normal leading-6" target="null">
                            Kesehatan Individu &amp; Keluarga
                          </a></li></ul></details><details id="sidebar-menu-3" class="py-4 text-white transition-all duration-150 ease-in navigation__sidebar__menu"><summary class="flex items-center justify-between cursor-pointer"><h3>
                        Dashboard Publik
                      </h3> <div class="flex items-center justify-center w-6 h-6 rounded-full navigation__sidebar__button hover:bg-blue-600"><div class="flex justify-center items-center transition-transform ease-in cursor-pointer" fill="white" style="width: 16px; height: 16px;"><i class="jds-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="jds-icon__svg" style="width: 16px; height: 16px; transform: rotate(0deg); fill: currentcolor;"><path d="M10.7024 14.7285L18.7124 7.15369C18.8979 6.97849 19 6.74462 19 6.49525C19 6.24588 18.8979 6.01201 18.7124 5.83682L18.1227 5.27898C17.7384 4.916 17.1138 4.916 16.7301 5.27898L10.0037 11.6397L3.26988 5.27193C3.08447 5.09673 2.8373 5 2.57374 5C2.30989 5 2.06272 5.09673 1.87716 5.27193L1.28756 5.82976C1.10214 6.00509 0.999999 6.23882 0.999999 6.48819C0.999999 6.73757 1.10214 6.97144 1.28756 7.14663L9.30496 14.7285C9.49095 14.9041 9.73929 15.0006 10.0033 15C10.2683 15.0006 10.5165 14.9041 10.7024 14.7285Z"></path></svg></i></div></div></summary> <ul class="flex flex-col gap-6 py-3 pl-6 mt-3 border-l-2 border-blue-500"><li><a href="/verifikasi-link?url=https%3A%2F%2Fdashboard.jabarprov.go.id%2Fid%2Ftopic%2Fkesehatan" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Kesehatan
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fdashboard.jabarprov.go.id%2Fid%2Ftopic%2Fkependudukan" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Kependudukan
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fdashboard.jabarprov.go.id%2Fid%2Ftopic%2Findustri%2Findustri-vs-tenaga-kerja-vs-investasi-jawa-barat" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Industri
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fdashboard.jabarprov.go.id%2Fid%2Ftopic%2Fpendidikan" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Pendidikan
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fdashboard.jabarprov.go.id%2Fid%2Fdashboard-pikobar%2Ftrace%2Fstatistik" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Informasi Covid-19
                          </a></li></ul></details><details id="sidebar-menu-4" class="py-4 text-white transition-all duration-150 ease-in navigation__sidebar__menu"><summary class="flex items-center justify-between cursor-pointer"><h3>
                        Profil Jawa Barat
                      </h3> <div class="flex items-center justify-center w-6 h-6 rounded-full navigation__sidebar__button hover:bg-blue-600"><div class="flex justify-center items-center transition-transform ease-in cursor-pointer" fill="white" style="width: 16px; height: 16px;"><i class="jds-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="jds-icon__svg" style="width: 16px; height: 16px; transform: rotate(0deg); fill: currentcolor;"><path d="M10.7024 14.7285L18.7124 7.15369C18.8979 6.97849 19 6.74462 19 6.49525C19 6.24588 18.8979 6.01201 18.7124 5.83682L18.1227 5.27898C17.7384 4.916 17.1138 4.916 16.7301 5.27898L10.0037 11.6397L3.26988 5.27193C3.08447 5.09673 2.8373 5 2.57374 5C2.30989 5 2.06272 5.09673 1.87716 5.27193L1.28756 5.82976C1.10214 6.00509 0.999999 6.23882 0.999999 6.48819C0.999999 6.73757 1.10214 6.97144 1.28756 7.14663L9.30496 14.7285C9.49095 14.9041 9.73929 15.0006 10.0033 15C10.2683 15.0006 10.5165 14.9041 10.7024 14.7285Z"></path></svg></i></div></div></summary> <ul class="flex flex-col gap-6 py-3 pl-6 mt-3 border-l-2 border-blue-500"><li><a href="/selayang-pandang" class="text-sm font-normal leading-6" target="null">
                            Selayang Pandang
                          </a></li><li><a href="/tentang-jawa-barat/" class="text-sm font-normal leading-6" target="null">
                            Tentang Jawa Barat
                          </a></li><li><a href="/arsip-dan-dokumen" class="text-sm font-normal leading-6" target="null">
                            Arsip dan Dokumen
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fjdih.jabarprov.go.id" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Jaringan Dokumentasi dan Informasi Hukum
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Flpse.jabarprov.go.id" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Layanan Pengadaan Secara Elektronik
                          </a></li><li><a href="/sapawarga" class="text-sm font-normal leading-6" target="null">
                            Sapawarga
                          </a></li></ul></details><details id="sidebar-menu-5" class="py-4 text-white transition-all duration-150 ease-in navigation__sidebar__menu"><summary class="flex items-center justify-between cursor-pointer"><h3>
                        PPID
                      </h3> <div class="flex items-center justify-center w-6 h-6 rounded-full navigation__sidebar__button hover:bg-blue-600"><div class="flex justify-center items-center transition-transform ease-in cursor-pointer" fill="white" style="width: 16px; height: 16px;"><i class="jds-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="jds-icon__svg" style="width: 16px; height: 16px; transform: rotate(0deg); fill: currentcolor;"><path d="M10.7024 14.7285L18.7124 7.15369C18.8979 6.97849 19 6.74462 19 6.49525C19 6.24588 18.8979 6.01201 18.7124 5.83682L18.1227 5.27898C17.7384 4.916 17.1138 4.916 16.7301 5.27898L10.0037 11.6397L3.26988 5.27193C3.08447 5.09673 2.8373 5 2.57374 5C2.30989 5 2.06272 5.09673 1.87716 5.27193L1.28756 5.82976C1.10214 6.00509 0.999999 6.23882 0.999999 6.48819C0.999999 6.73757 1.10214 6.97144 1.28756 7.14663L9.30496 14.7285C9.49095 14.9041 9.73929 15.0006 10.0033 15C10.2683 15.0006 10.5165 14.9041 10.7024 14.7285Z"></path></svg></i></div></div></summary> <ul class="flex flex-col gap-6 py-3 pl-6 mt-3 border-l-2 border-blue-500"><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Fppid_jabar" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Profil PPID
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Ftata-cara-permohonan" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Alur Layanan Informasi Publik
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Fform-permohonan-info" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Permohonan Informasi Publik
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Ftata-cara-ajukan-keberatan" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Pengajuan Keberatan
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Fdaftar-info-publik" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Informasi yang Wajib Tersedia Setiap Saat
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Finfo-berkala" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Informasi Publik Berkala
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Finfo-serta-merta" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Informasi Publik Serta Merta
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Fcara-selesaikan-sengketa-info" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Tata Cara Penyelesaian Sengketa
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Fcara-pengaduan-salah-guna" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Tata Cara Pengaduan
                          </a></li><li><a href="/verifikasi-link?url=https%3A%2F%2Fppid.jabarprov.go.id%2Fpages%2Fdaftar-info-dikecualikan" class="text-sm font-normal leading-6" target="_blank" rel="noopener noreferrer">
                            Daftar Informasi Dikecualikan
                          </a></li></ul></details></section>
                </div>
            </div>
        </div>
    </div>
</nav>
