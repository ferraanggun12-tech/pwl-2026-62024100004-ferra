<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExaminationController;

Route::get('/', function () {
    return view('welcome');
});

// 1. Route untuk Guest (Hanya bisa diakses jika BELUM login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// 2. Route yang diproteksi Middleware Auth (Hanya bisa diakses setelah LOGIN)
Route::middleware('auth')->group(function () {
    
    // Dashboard dapat diakses oleh semua user yang sudah login[cite: 12]
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --- HAK AKSSES BERDASARKAN ROLE (RBAC) ---

    // Hanya Admin (Manajemen User)
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    // Admin dan Petugas Pendaftaran (Akses Pasien & Registrasi)[cite: 11]
    Route::middleware('role:admin,registration')->group(function () {
        Route::resource('pasien', PatientController::class);
        Route::resource('registrasi', RegistrationController::class);
    });

    // Dokter (Akses Pemeriksaan)[cite: 11]
    Route::middleware('role:doctor')->group(function () {
        Route::get('/pemeriksaan', [ExaminationController::class, 'index'])->name('pemeriksaan.index');
    });

    // Admin (Akses Kelola Master Data: Dokter & Poli)[cite: 5, 11]
    Route::middleware('role:admin')->group(function () {
        Route::resource('dokter', DoctorController::class);
        Route::resource('poli', PoliController::class);
    });

    // Jadwal dapat diakses oleh user yang login
    Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);

    // Proses Logout (Wajib metode POST)
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});