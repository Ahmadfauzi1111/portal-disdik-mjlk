<?php

use App\Http\Controllers\DinasController;
use App\Http\Controllers\GtkController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PauddikmasController;
use App\Http\Controllers\SdController;
use App\Http\Controllers\SecretariatController;
use App\Http\Controllers\SmpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
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
