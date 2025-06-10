<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-majalengka.png') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <meta name="googlebot" content="index, follow" />
        <meta name="googlebot-news" content="index, follow" />

        @yield('meta')
    </head>
    <body class="top: 0px; position: fixed; width: 100%; height: 100%; overflow-y: scroll; overscroll-behavior: contain;">
        @include('components.layout.navbar')

        @include('components.layout.side-panel')

        @yield('content')

        @include('components.layout.footer')

    </body>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".tab-btn");
            const panes = document.querySelectorAll(".tab-pane");

            // Inisialisasi: tampilkan hanya pane aktif (biasanya yang pertama)
            panes.forEach(pane => {
                if (pane.dataset.content === "1") {
                    pane.classList.remove("hidden", "opacity-0");
                    pane.classList.add("opacity-100");
                } else {
                    pane.classList.add("hidden", "opacity-0");
                    pane.classList.remove("opacity-100");
                }
            });

            // Inisialisasi tab highlight
            tabs.forEach(tab => {
                if (tab.dataset.tab === "1") {
                    tab.classList.add("bg-blue-500");
                } else {
                    tab.classList.remove("bg-blue-500");
                }
            });

            // Event listener tab switching
            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    const target = tab.dataset.tab;

                    tabs.forEach(t => t.classList.remove("bg-blue-500"));
                    tab.classList.add("bg-blue-500");

                    panes.forEach(pane => {
                        if (pane.dataset.content === target) {
                            pane.classList.remove("hidden");
                            setTimeout(() => {
                                pane.classList.remove("opacity-0");
                                pane.classList.add("opacity-100");
                            }, 10);
                        } else {
                            pane.classList.remove("opacity-100");
                            pane.classList.add("opacity-0");
                            setTimeout(() => {
                                pane.classList.add("hidden");
                            }, 500);
                        }
                    });
                });
            });
        });
    </script>




</html>
