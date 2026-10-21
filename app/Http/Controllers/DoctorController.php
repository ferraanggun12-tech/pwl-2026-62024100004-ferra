<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan data dokter beserta relasi poli-nya
        $doctors = Doctor::with('poli')->get();
        return view('dokter.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil data poli untuk pilihan dropdown di form tambah dokter
        $polis = \App\Models\Poli::all();
        return view('dokter.create', compact('polis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_code' => 'required|unique:doctors',
            'name' => 'required',
            'specialization' => 'required',
            'poli_id' => 'required|exists:polis,id',
        ]);

        Doctor::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menggunakan with('poli') untuk mencegah N+1 Query Problem sesuai materi
        $doctor = Doctor::with('poli')->findOrFail($id);
        
        return view('dokter.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $polis = \App\Models\Poli::all();
        
        return view('dokter.edit', compact('doctor', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_code' => 'required|unique:doctors,doctor_code,' . $id,
            'name' => 'required',
            'specialization' => 'required',
            'poli_id' => 'required|exists:polis,id',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}