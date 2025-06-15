{{-- resources/views/auth/pages/profile/index.blade.php --}}
@extends('auth.layouts.lp')

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".tab-btn");
            const panes = document.querySelectorAll(".tab-pane");

            // Inisialisasi: tampilkan hanya pane aktif
            panes.forEach(pane => {
                if (pane.dataset.content === "1") {
                    pane.classList.remove("hidden", "opacity-0");
                    pane.classList.add("opacity-100");
                } else {
                    pane.classList.add("hidden", "opacity-0");
                    pane.classList.remove("opacity-100");
                }
            });

            tabs.forEach(tab => {
                if (tab.dataset.tab === "1") {
                    tab.classList.add("bg-blue-500", "text-white");
                } else {
                    tab.classList.remove("bg-blue-500", "text-white");
                }
            });

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    const target = tab.dataset.tab;

                    tabs.forEach(t => t.classList.remove("bg-blue-500", "text-white"));
                    tab.classList.add("bg-blue-500", "text-white");

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
@endpush

@section('content')
    <div class="relative min-h-[340px] flex items-center justify-center text-center">
        <div class="absolute inset-0" style="background: radial-gradient(100% 820.78% at 0% 0%, rgb(8 20 241) 0%, rgba(1, 32, 39, 0.7) 61.62%); z-index: 0;"></div>
        <div class="relative z-10 px-4">
            @yield('foreground')
        </div>
    </div>

    <section class="pt-32 pb-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-10">
                <!-- Nav Tabs (lebih kiri) -->
                <div class="w-full lg:w-1/4 space-y-4 self-start" id="tabs">
                    @yield('navtab')
                </div>

                <!-- Tab Content -->
                <div class="w-full lg:w-3/4">
                    <div class="tab-content w-full space-y-6 transition-all duration-500 ease-in-out">
                        <div class="tab-pane opacity-100 transition-opacity duration-500 ease-in-out" data-content="1">
                            @yield('content1')
                        </div>
                        <div class="tab-pane opacity-0 hidden transition-opacity duration-500 ease-in-out" data-content="2">
                            @yield('content2')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
