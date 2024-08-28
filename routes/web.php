<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use Illuminate\Support\Facades\Route;

Route::prefix('petugas')->group(function () {

    Route::middleware('guest:petugas')->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('petugas.login');
        Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    });

    Route::middleware('auth:petugas')->group(function () {

        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/history', [DashboardController::class, 'history'])->name('history');

        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
        Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('create-pembayaran');
        Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('store-pembayaran');
        Route::delete('/pembayaran/{id:id_pembayaran}', [PembayaranController::class, 'destroy'])->name('delete-pembayaran');
        Route::get('/pembayaran/{id:id_pembayaran}', [PembayaranController::class, 'edit'])->name('edit-pembayaran');
        Route::put('/pembayaran/{id:id_pembayaran}', [PembayaranController::class, 'update'])->name('update-pembayaran');

        // Siswa route
        Route::get('/data-siswa', [SiswaController::class, 'index'])->name('data-siswa');
        Route::get('/create-siswa', [SiswaController::class, 'create'])->name('create-siswa');
        Route::delete('/data-siswa/{id:nisn}', [SiswaController::class, 'destroy'])->name('delete-siswa');
        Route::post('/data-siswa', [SiswaController::class, 'store'])->name('store-siswa');
        Route::get('/create-siswa', [SiswaController::class, 'create'])->name('create-siswa');
        Route::get('/edit-siswa/{id:nisn}', [SiswaController::class, 'edit'])->name('edit-siswa');
        Route::put('/update-siswa/{siswa:nisn}', [SiswaController::class, 'update'])->name('update-siswa');

        //Petugas Route
        Route::get('/data-petugas', [PetugasController::class, 'index'])->name('data-petugas');
        Route::get('/create-petugas', [PetugasController::class, 'create'])->name('create-petugas');
        Route::delete('/data-petugas/{id}', [PetugasController::class, 'destroy'])->name('delete-petugas');
        Route::post('/data-petugas', [PetugasController::class, 'store'])->name('store-petugas');
        Route::get('/create-petugas', [PetugasController::class, 'create'])->name('create-petugas');
        Route::get('/edit-petugas/{id:id_petugas}', [PetugasController::class, 'edit'])->name('edit-petugas');
        Route::put('/update-petugas/{id}', [PetugasController::class, 'update'])->name('update-petugas');

        // SPP route
        Route::get('/data-spp', [SppController::class, 'index'])->name('data-spp');
        Route::get('/create-spp', [SppController::class, 'create'])->name('create-spp');
        Route::delete('/data-spp/{id}', [SppController::class, 'destroy'])->name('delete-spp');
        Route::post('/data-spp', [SppController::class, 'store'])->name('store-spp');
        Route::get('/create-spp', [SppController::class, 'create'])->name('create-spp');
        Route::get('/edit-spp/{id:id_spp}', [SppController::class, 'edit'])->name('edit-spp');
        Route::put('/update-spp/{id}', [SppController::class, 'update'])->name('update-spp');

        //kelas route
        Route::get('/data-kelas', [KelasController::class, 'index'])->name('data-kelas');
        Route::delete('/data-kelas/{id}', [KelasController::class, 'destroy'])->name('delete-kelas');
        Route::post('/data-kelas', [KelasController::class, 'store'])->name('store-kelas');
        Route::get('/create-kelas', [KelasController::class, 'create'])->name('create-kelas');
        Route::get('/edit-kelas/{kelas:id_kelas}', [KelasController::class, 'edit'])->name('edit-kelas');
        Route::put('/update-kelas/{id:id_kelas}', [KelasController::class, 'update'])->name('update-kelas');

        Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan')->middleware('checkLevel:admin');

        Route::get('/pdf', [DashboardController::class, 'printPdf']);
        Route::get('/excel', [DashboardController::class, 'printExcel']);
    });
});
