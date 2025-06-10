@extends('layouts.lp')

@push('bootstrap-css')
    <link href="{{ asset('finanza/css/bootstrap.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Header Section with Gradient Background -->
    <div class="relative min-h-[340px] flex items-center justify-center text-center">
        <!-- Background gradient overlay -->
        <div class="absolute inset-0" style="background: radial-gradient(100% 820.78% at 0% 0%, rgb(8 20 241) 0%, rgba(1, 32, 39, 0.7) 61.62%); z-index: 0;"></div>

        <!-- Foreground content -->
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


    <!-- Service Section Start -->
    <section class="pt-32 pb-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Nav Tabs -->
                <div class="w-full lg:w-1/3 space-y-4 self-start" id="tabs">
                    <button class="tab-btn w-full flex items-center text-left border p-4 rounded bg-blue-50" data-tab="1">
                        <i class="fa fa-bars text-blue-600 mr-3"></i>
                        <span class="font-medium">Kepala Dinas Pendidikan</span>
                    </button>
                    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="2">
                        <i class="fa fa-bars text-blue-600 mr-3"></i>
                        <span class="font-medium">Sekertaris Dinas</span>
                    </button>
                    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="3">
                        <i class="fa fa-bars text-blue-600 mr-3"></i>
                        <span class="font-medium">Kepala Bidang GTK</span>
                    </button>
                    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="4">
                        <i class="fa fa-bars text-blue-600 mr-3"></i>
                        <span class="font-medium">Kepala Bidang Pauddikmas</span>
                    </button>
                    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="5">
                        <i class="fa fa-bars text-blue-600 mr-3"></i>
                        <span class="font-medium">Kepala Bidang SD</span>
                    </button>
                    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="6">
                        <i class="fa fa-bars text-blue-600 mr-3"></i>
                        <span class="font-medium">Kepala Bidang SMP</span>
                    </button>
                    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="7">
                        <i class="fa fa-bars text-blue-600 mr-3"></i>
                        <span class="font-medium">Kepala Seksi Tenaga Pendidikan</span>
                    </button>
                    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="8">
                        <i class="fa fa-bars text-blue-600 mr-3"></i>
                        <span class="font-medium">Kepala Seksi Pendidikan</span>
                    </button>
                    <div class="mt-6 flex justify-center space-x-2">
                        <button class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">1</button>
                        <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-blue-600 hover:text-white">2</button>
                        <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-blue-600 hover:text-white">3</button>
                        <span class="px-3 py-1 text-gray-400">...</span>
                        <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-blue-600 hover:text-white">Next</button>
                    </div>

                </div>

                <!-- Tab Content -->
                <div class="w-full lg:w-2/3">
                    <div class="tab-content w-full space-y-6 transition-all duration-500 ease-in-out">
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="1">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <div class="w-full lg:max-w-[45%]">
                                    <img src="{{ asset('images/wabup.png') }}" class="w-full object-cover rounded" alt="Kepala Dinas Pendidikan">
                                </div>
                                <h3 class="text-2xl font-semibold">Kepala Dinas Pendidikan</h3>
                            </div>
                        </div>
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="2">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <div class="w-full lg:max-w-[40%]">
                                    <img src="{{ asset('images/wabup.png') }}" class="w-full object-cover rounded" alt="Kepala Dinas Pendidikan">
                                </div>
                                <h3 class="text-2xl font-semibold">Kepala Dinas Pendidikan</h3>
                                <p class="text-gray-700 max-w-xl">Sambutan dari Kepala Dinas Pendidikan mengenai layanan pendidikan dan visi ke depan dalam meningkatkan kualitas belajar.</p>
                            </div>
                        </div>
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="3">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <div class="w-full lg:max-w-[40%]">
                                    <img src="{{ asset('images/wabup.png') }}" class="w-full object-cover rounded" alt="Kepala Dinas Pendidikan">
                                </div>
                                <h3 class="text-2xl font-semibold">Kepala Dinas Pendidikan</h3>
                                <p class="text-gray-700 max-w-xl">Sambutan dari Kepala Dinas Pendidikan mengenai layanan pendidikan dan visi ke depan dalam meningkatkan kualitas belajar.</p>
                            </div>
                        </div>
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="4">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <div class="w-full lg:max-w-[40%]">
                                    <img src="{{ asset('images/wabup.png') }}" class="w-full object-cover rounded" alt="Kepala Dinas Pendidikan">
                                </div>
                                <h3 class="text-2xl font-semibold">Kepala Dinas Pendidikan</h3>
                                <p class="text-gray-700 max-w-xl">Sambutan dari Kepala Dinas Pendidikan mengenai layanan pendidikan dan visi ke depan dalam meningkatkan kualitas belajar.</p>
                            </div>
                        </div>
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="5">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <div class="w-full lg:max-w-[40%]">
                                    <img src="{{ asset('images/wabup.png') }}" class="w-full object-cover rounded" alt="Kepala Dinas Pendidikan">
                                </div>
                                <h3 class="text-2xl font-semibold">Kepala Dinas Pendidikan</h3>
                                <p class="text-gray-700 max-w-xl">Sambutan dari Kepala Dinas Pendidikan mengenai layanan pendidikan dan visi ke depan dalam meningkatkan kualitas belajar.</p>
                            </div>
                        </div>
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="6">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <div class="w-full lg:max-w-[40%]">
                                    <img src="{{ asset('images/wabup.png') }}" class="w-full object-cover rounded" alt="Kepala Dinas Pendidikan">
                                </div>
                                <h3 class="text-2xl font-semibold">Kepala Dinas Pendidikan</h3>
                                <p class="text-gray-700 max-w-xl">Sambutan dari Kepala Dinas Pendidikan mengenai layanan pendidikan dan visi ke depan dalam meningkatkan kualitas belajar.</p>
                            </div>
                        </div>
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="7">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <div class="w-full lg:max-w-[40%]">
                                    <img src="{{ asset('images/wabup.png') }}" class="w-full object-cover rounded" alt="Kepala Dinas Pendidikan">
                                </div>
                                <h3 class="text-2xl font-semibold">Kepala Dinas Pendidikan</h3>
                                <p class="text-gray-700 max-w-xl">Sambutan dari Kepala Dinas Pendidikan mengenai layanan pendidikan dan visi ke depan dalam meningkatkan kualitas belajar.</p>
                            </div>
                        </div>
                        <div class="tab-pane active opacity-100 transition-opacity duration-500 ease-in-out" data-content="8">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <div class="w-full lg:max-w-[40%]">
                                    <img src="{{ asset('images/wabup.png') }}" class="w-full object-cover rounded" alt="Kepala Dinas Pendidikan">
                                </div>
                                <h3 class="text-2xl font-semibold">Kepala Dinas Pendidikan</h3>
                                <p class="text-gray-700 max-w-xl">Sambutan dari Kepala Dinas Pendidikan mengenai layanan pendidikan dan visi ke depan dalam meningkatkan kualitas belajar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

@endsection
