<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/pasien', [PatientController::class, 'index'])->name('pasien.index');
Route::get('/pasien/show/{id}', [PatientController::class, 'show'])->name('pasien.show');
Route::get('/dokter', [DoctorController::class, 'index'])->name('dokter.index');
Route::get('/poli', [PoliController::class, 'index'])->name('poli.index');
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');