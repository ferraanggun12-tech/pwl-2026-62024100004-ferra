<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = [
            ['nama' => 'dr. Andi', 'spesialisasi' => 'Spesialis Anak', 'status' => 'aktif'],
            ['nama' => 'dr. Budi', 'spesialisasi' => 'Spesialis Bedah', 'status' => 'cuti'],
            ['nama' => 'dr. Citra', 'spesialisasi' => 'Spesialis Gigi', 'status' => 'aktif'],
            ['nama' => 'dr. Dewi', 'spesialisasi' => 'Spesialis Mata', 'status' => 'aktif'],
            ['nama' => 'dr. Eko', 'spesialisasi' => 'Spesialis Penyakit Dalam', 'status' => 'nonaktif'],
        ];

        return view('dokter.index', compact('doctors'));
    }
}