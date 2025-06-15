{{-- resources/views/auth/pages/profile/profile.blade.php --}}
@extends('auth.pages.profile.index')

@section('foreground')
    <h1 class="text-4xl font-bold text-white mb-4">Profile Dinas Pendidikan Majalengka</h1>
    <nav class="text-sm text-gray-200">
        <ol class="flex justify-center space-x-2">
            <li><a href="/" class="text-white hover:underline">Home</a></li>
            <li>/</li>
            <li class="text-white">Profile Dinas Pendidikan Majalengka</li>
        </ol>
    </nav>
@endsection

@section('navtab')
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded transition" data-tab="1">
        <i class="fa fa-eye text-blue-600 mr-3"></i>
        <span class="font-medium">Visi & Misi</span>
    </button>
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded transition" data-tab="2">
        <i class="fa fa-sitemap text-blue-600 mr-3"></i>
        <span class="font-medium">Struktur Organisasi</span>
    </button>
@endsection

@section('content1')
    <div class="w-full max-w-5xl mx-auto">
        <img src="{{ asset('images/visi.png') }}" alt="Visi & Misi" class="w-full h-auto object-contain rounded">
    </div>
@endsection

@section('content2')
    <div class="w-full max-w-5xl mx-auto">
        <img src="{{ asset('images/struktur.png') }}" alt="Struktur Organisasi" class="w-full h-auto object-contain rounded">
    </div>
@endsection
