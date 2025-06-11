@extends('layouts.lp')

@push('scripts')
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
@endpush

@section('content')
    <!-- Page Header Section with Gradient Background -->
    <div class="relative min-h-[340px] flex items-center justify-center text-center">
        <!-- Background gradient overlay -->
        <div class="absolute inset-0" style="background: radial-gradient(100% 820.78% at 0% 0%, rgb(8 20 241) 0%, rgba(1, 32, 39, 0.7) 61.62%); z-index: 0;"></div>

        <!-- Foreground content -->
        <div class="relative z-10 px-4">
            @yield('foreground')
        </div>
    </div>


    <!-- Service Section Start -->
    <section class="pt-32 pb-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Nav Tabs -->
                <div class="w-full lg:w-1/3 space-y-4 self-start" id="tabs">
                    @yield('navtab')
                </div>

                <!-- Tab Content -->
                <div class="w-full lg:w-2/3">
                    <div class="tab-content w-full space-y-6 transition-all duration-500 ease-in-out">
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="1">
                            <div class="flex flex-col text-left">
                                <div class="w-full">
                                    @yield('content1')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="2">
                            <div class="flex flex-col text-left">
                                <div class="w-full">
                                    @yield('content2')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

@endsection
