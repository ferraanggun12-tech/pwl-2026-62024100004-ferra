<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; 

class ExaminationController extends Controller
{
    /**
     * Menampilkan daftar pasien/antrean yang harus diperiksa oleh dokter.
     */
    public function index()
    {
        // Mengambil daftar pendaftaran dengan memuat relasi patient, doctor, dan poli di dalam doctor
        $registrations = Registration::with(['patient', 'doctor.poli'])->get(); 
        
        return view('pemeriksaan.index', compact('registrations'));
    }

    /**
     * Menampilkan form input hasil pemeriksaan (diagnosa & resep).
     */
    public function create($id)
    {
        // Mengambil data pendaftaran berdasarkan ID beserta relasi pasien dan dokternya
        $registration = Registration::with(['patient', 'doctor.poli'])->findOrFail($id);
        
        return view('pemeriksaan.create', compact('registration'));
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

        $registration = Registration::findOrFail($id);
        
        // Contoh logika penyimpanan hasil pemeriksaan atau update status pendaftaran menjadi Selesai/Completed
        $registration->update([
            'status' => 'Finished'
        ]);

        return redirect()->route('pemeriksaan.index')->with('success', 'Hasil pemeriksaan berhasil disimpan.');
    }
}