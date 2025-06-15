@extends('auth.pages.profile.index')

@section('foreground')
    <h1 class="text-4xl font-bold text-white mb-4">Sekretariat</h1>
    <nav class="text-sm text-gray-200">
        <ol class="flex justify-center space-x-2">
            <li><a href="/" class="text-white hover:underline">Home</a></li>
            <li>/</li>
            <li class="text-white">Sekretariat</li>
        </ol>
    </nav>
@endsection

@section('navtab')
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded bg-blue-50" data-tab="1">
        <i class="fa fa-bars text-blue-600 mr-3"></i>
        <span class="font-medium">Sekretariat</span>
    </button>
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="2">
        <i class="fa fa-bars text-blue-600 mr-3"></i>
        <span class="font-medium">Tugas dan Fungsi</span>
    </button>
@endsection

@section('content1')
    <div class="bg-white shadow-xl p-9 w-full">
        <h2 style="font-size: 22px; font-weight: bold;">Sekretariat</h2>
        <p style="font-size: 18px">Sekretariat mempunyai tugas pokok menyelenggarakan administrasi Dinas, meliputi perencanaan dan pelaporan keuangan dan aset, kepegawaian dan umum serta membantu Kepala Dinas mengkoordinasikan Bidang-Bidang.</p>
    </div>
@endsection

@section('content2')
    <div class="bg-white shadow-xl p-9 w-full">
        <h2 style="font-size: 22px; font-weight: bold;">Tugas dan Fungsi</h2>
        <div class="text-lg">
            <ul class="list-disc pl-5 space-y-1">
                <li>
                    Penyelenggaraan koordinasi, penghimpunan, dan pengkajian bahan kebijakan teknis di bidang pendidikan, khususnya aspek pendidikan menengah dan khusus, yang dilaksanakan oleh Bidang-Bidang.
                </li>
                <li>
                    Penyelenggaraan perencanaan dan pelaporan, pengadministrasian keuangan dan aset, serta kepegawaian dan umum.
                </li>
                <li>
                    Penyelenggaraan evaluasi dan pelaporan Dinas.
                </li>
                <li>
                    Penyelenggaraan fungsi lain sesuai dengan tugas pokok dan fungsinya.
                </li>
            </ul>
        </div>

    </div>
@endsection
