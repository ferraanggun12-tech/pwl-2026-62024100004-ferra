<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // Untuk menampilkan halaman utama jadwal
    public function index()
    {
        $judul = 'Jadwal Dokter';
        return view('jadwal.index', compact('judul'));
    }

    // Untuk menampilkan jadwal berdasarkan hari
    public function show($hari)
    {
        return 'Jadwal Dokter Hari: ' . $hari;
    }
}