@extends('auth.pages.profile.index')

@section('foreground')
    <h1 class="text-4xl font-bold text-white mb-4">Profile PPID</h1>
    <nav class="text-sm text-gray-200">
        <ol class="flex justify-center space-x-2">
            <li><a href="/" class="text-white hover:underline">Home</a></li>
            <li>/</li>
            <li class="text-white">Profile PPID</li>
        </ol>
    </nav>
@endsection

@section('navtab')
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded bg-blue-50" data-tab="1">
        <i class="fa fa-bars text-blue-600 mr-3"></i>
        <span class="font-medium">Profile PPID</span>
    </button>
    <button class="tab-btn w-full flex items-center text-left border p-4 rounded" data-tab="2">
        <i class="fa fa-bars text-blue-600 mr-3"></i>
        <span class="font-medium">Maklumat Pelayanan</span>
    </button>
@endsection

@section('content1')
    <div class="bg-white shadow-xl p-9 w-full">
        <h2 style="font-size: 22px; font-weight: bold;">Profile PPID</h2>
        <p>PPID (Pejabat Pengelola Informasi dan Dokumentasi) adalah pejabat yang bertanggung jawab di bidang penyimpanan,
            pendokumentasian, penyediaan, dan/atau pelayanan informasi di badan publik. Dalam Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan
            Informasi Publik (KIP),
            diakui bahwa hak memperoleh informasi adalah bagian dari hak asasi manusia dan keterbukaan informasi publik merupakan salah satu ciri dari
            negara demokratis.
            Pemberlakukan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik menjadi penting karena menjadi salah satu pendorong
            dari semangat anti korupsi,
            dimana dengan keterbukaan publik menjadikan proses pembangunan menjadi lebih transparan dan akuntabel. Demikian pula dengan harapan
            meningkatnya partisipasi publik dalam proses pembangunan.
            Setiap Badan Publik mempunyai kewajiban dalam menyediakan dan melayani permohonan informasi publik secara cepat, tepat waktu, ekonomis dan
            dengan cara yang sederhana.
            Salah satu tugas dari Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah menyediakan akses informasi publik bagi pemohon
            informasi.</p>
    </div>
@endsection

@section('content2')
    <div class="bg-white shadow-xl p-9 w-full">
        <h2 style="font-size: 22px; font-weight: bold;">Maklumat Pelayanan</h2>
        <div class="text-lg">
            <ul class="list-disc pl-5 space-y-1">
                <li>
                    Maklumat Pelayanan
                </li>
            </ul>
        </div>

    </div>
@endsection
