<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Modul Klinik (Dokter, Pasien, Poli, Jadwal, Registrasi)
    Route::resource('dokter', DoctorController::class);
    Route::resource('pasien', PatientController::class);
    Route::resource('poli', PoliController::class);
    Route::resource('registrasi', RegistrationController::class);
    
    Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);

    // Proses Logout (Wajib metode POST)
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});