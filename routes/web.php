<?php

use App\Http\Controllers\DinasController;
use App\Http\Controllers\GtkController;
use App\Http\Controllers\HalloDisdikController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PauddikmasController;
use App\Http\Controllers\ProfilePpidController;
use App\Http\Controllers\PublicInformationListController;
use App\Http\Controllers\PublicServiceController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\SdController;
use App\Http\Controllers\SecretariatController;
use App\Http\Controllers\SmpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.pages.home');
});

Route::prefix('profile')->group(function () {
    Route::get('/pejabat', [OfficeController::class, 'index'])->name('profile.office');
    Route::get('/sekretariat', [SecretariatController::class, 'index'])->name('profile.secretariat');
    Route::get('/bidang-sd', [SdController::class, 'index'])->name('profile.sd');
    Route::get('/bidang-smp', [SmpController::class, 'index'])->name('profile.smp');
    Route::get('/bidang-gtk', [GtkController::class, 'index'])->name('profile.gtk');
    Route::get('/bidang-pauddikmas', [PauddikmasController::class, 'index'])->name('profile.pauddikmas');
    Route::get('/dinas', [DinasController::class, 'index'])->name('profile.dinas');
});

Route::prefix('layanan-publik')->group(function () {
    Route::get('/', [PublicServiceController::class, 'index'])->name('public_service');
    Route::get('/detail', [PublicServiceController::class, 'detail'])->name('public_service.detail');
});

Route::prefix('publikasi')->group(function () {
    Route::get('/', [PublikasiController::class, 'index'])->name('publikasi');
    Route::get('/detail', [PublikasiController::class, 'detail'])->name('publikasi.news');
});

Route::prefix('ppid')->group(function () {
    Route::get('/profile-ppid', [ProfilePpidController::class, 'index'])->name('ppid');
    Route::get('/daftar-informasi-publik', [PublicInformationListController::class, 'index'])->name('public_information_list');
});

Route::prefix('hallo-disdik')->group(function () {
    Route::get('/', [HalloDisdikController::class, 'index'])->name('hallo-disdik');
});
