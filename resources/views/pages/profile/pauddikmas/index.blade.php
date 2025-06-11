@extends('pages.profile.index')

@section('foreground')
    <h1 class="text-4xl font-bold text-white mb-4">Bidang Pauddikmas</h1>
    <nav class="text-sm text-gray-200">
        <ol class="flex justify-center space-x-2">
            <li><a href="/" class="text-white hover:underline">Home</a></li>
            <li>/</li>
            <li class="text-white">Bidang Pauddikmas</li>
        </ol>
    </nav>
@endsection

@section('navtab')
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded bg-blue-50" data-tab="1">
        <i class="fa fa-bars text-blue-600 mr-3"></i>
        <span class="font-medium">Bidang Pauddikmas</span>
    </button>
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="2">
        <i class="fa fa-bars text-blue-600 mr-3"></i>
        <span class="font-medium">Tugas dan Fungsi</span>
    </button>
@endsection

@section('content1')
    <div class="bg-white shadow-xl p-9 w-full">
        <h2 style="font-size: 22px; font-weight: bold;">Bidang Pauddikmas</h2>
    </div>
@endsection

@section('content2')
    <div class="bg-white shadow-xl p-9 w-full">
        <h2 style="font-size: 22px; font-weight: bold;">Tugas dan Fungsi</h2>
        <div class="text-lg">
            <ul class="list-disc pl-5 space-y-1">
                <li>
                    Bidang Pauddikmas
                </li>
            </ul>
        </div>

    </div>
@endsection
