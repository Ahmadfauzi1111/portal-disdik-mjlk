@extends('auth.layouts.lp')

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll(".tab-btn");
            const panes = document.querySelectorAll(".tab-pane");

            function activateTab(index) {
                tabs.forEach(tab => tab.classList.remove("bg-blue-500", "text-white"));
                panes.forEach(pane => {
                    pane.classList.add("hidden", "opacity-0");
                    pane.classList.remove("opacity-100");
                });

                tabs[index].classList.add("bg-blue-500", "text-white");
                panes[index].classList.remove("hidden");
                setTimeout(() => {
                    panes[index].classList.remove("opacity-0");
                    panes[index].classList.add("opacity-100");
                }, 10);
            }

            tabs.forEach((tab, index) => {
                tab.addEventListener("click", () => activateTab(index));
            });

            // Inisialisasi default tab pertama
            activateTab(0);
        });
    </script>
@endpush

@section('content')
    <!-- Header -->
    <div class="relative min-h-[340px] flex items-center justify-center text-center">
        <div class="absolute inset-0" style="background: radial-gradient(100% 820.78% at 0% 0%, rgb(8 20 241) 0%, rgba(1, 32, 39, 0.7) 61.62%); z-index: 0;"></div>
        <div class="relative z-10 px-4">
            <h1 class="text-4xl font-bold text-white mb-4">Profile Pejabat</h1>
            <nav class="text-sm text-gray-200">
                <ol class="flex justify-center space-x-2">
                    <li><a href="/" class="text-white hover:underline">Home</a></li>
                    <li>/</li>
                    <li class="text-white">Profile Pejabat</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Content -->
    <section class="pt-32 pb-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Nav Tabs -->
                <div class="w-full lg:w-1/3 space-y-4 self-start" id="tabs">
                    @foreach ($officials as $index => $data)
                        <button class="tab-btn w-full flex items-center text-left border p-4 rounded bg-blue-50 hover:bg-blue-100 transition" data-tab="{{ $index + 1 }}">
                            <i class="fa fa-bars text-blue-600 mr-3"></i>
                            <span class="font-medium">{{ $data['title'] }}</span>
                        </button>
                    @endforeach

                    <!-- Pagination Dummy -->
                    <div class="mt-6 flex justify-center space-x-2">
                        <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">1</button>
                        <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-blue-600 hover:text-white">2</button>
                        <span class="px-3 py-1 text-gray-400">...</span>
                        <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-blue-600 hover:text-white">Next</button>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="w-full lg:w-2/3">
                    <div class="tab-content w-full space-y-6 transition-all duration-500 ease-in-out">
                        @foreach ($officials as $index => $data)
                            <div class="tab-pane opacity-0 hidden transition-opacity duration-500 ease-in-out" data-content="{{ $index + 1 }}">
                                <div class="flex flex-col items-center text-center space-y-4">
                                    <div class="w-full lg:w-[55.3333%]">
                                        <img src="{{ asset('images/' . $data['img']) }}" class="w-full h-auto aspect-[4/5] object-cover rounded-xl shadow mx-auto" alt="{{ $data['title'] }}">
                                    </div>
                                    <h3 class="text-2xl font-semibold">{{ $data['title'] }}</h3>
                                    <p class="text-gray-700 max-w-xl">{{ $data['name'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
