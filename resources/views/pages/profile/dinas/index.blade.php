@extends('pages.profile.index')

@section('foreground')
    <h1 class="text-4xl font-bold text-white mb-4">Dinas Pendidikan Majalengka</h1>
    <nav class="text-sm text-gray-200">
        <ol class="flex justify-center space-x-2">
            <li><a href="/" class="text-white hover:underline">Home</a></li>
            <li>/</li>
            <li class="text-white">Dinas Pendidikan Majalengka</li>
        </ol>
    </nav>
@endsection

@section('navtab')
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded bg-blue-50" data-tab="1">
        <i class="fa fa-bars text-blue-600 mr-3"></i>
        <span class="font-medium">Visi & Misi</span>
    </button>
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="2">
        <i class="fa fa-bars text-blue-600 mr-3"></i>
        <span class="font-medium">Struktur dan Organiasi</span>
    </button>
@endsection

@section('content1')
    <div class="bg-white shadow-xl p-9 w-full">
        <div class="w-full lg:max-w-[140%]">
            <img src="{{ asset('images/visi.png') }}" alt="Visi & Misi">
        </div>
    </div>
@endsection

@section('content2')
    <div class="bg-white shadow-xl p-9 w-full">
        <img src="{{ asset('images/struktur.png') }}" alt="Visi & Misi">
    </div>
@endsection
