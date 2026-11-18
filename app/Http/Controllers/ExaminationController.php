<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; // Sesuaikan dengan model pendaftaran / antrean klinik

class ExaminationController extends Controller
{
    /**
     * Menampilkan daftar pasien/antrean yang harus diperiksa oleh dokter.
     */
    public function index()
    {
        // Mengambil daftar pendaftaran pasien, pastikan relasi 'patient' dimuat
        $registrations = \App\Models\Registration::with('patient', 'poli','doctor')->get(); 
        
        return view('pemeriksaan.index', compact('registrations'));
    }

    /**
     * Menyimpan hasil pemeriksaan medis / diagnosa dari dokter.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'diagnosa' => 'required|string',
            'resep'    => 'nullable|string',
        ]);

        // Logika penyimpanan data hasil pemeriksaan ke database
        // Contoh: $registration = Registration::findOrFail($id);
        // $registration->update([...]);

        return redirect()->route('pemeriksaan.index')->with('success', 'Hasil pemeriksaan berhasil disimpan.');
    }
}