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

Route::resource('pasien', PatientController::class);
Route::get('/dokter', [DoctorController::class, 'index'])->name('dokter.index');
Route::resource('dokter', DoctorController::class);
Route::resource('poli', PoliController::class);
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');