<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Doctor::with('poli');

        // 1. Fitur Search berdasarkan nama atau kode dokter
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('doctor_code', 'like', "%{$search}%");
            });
        }

        // 2. Filter berdasarkan Poli
        if ($request->has('poli_id') && $request->poli_id != '') {
            $query->where('poli_id', $request->poli_id);
        }

        // 3. Sorting (Whitelist kolom untuk keamanan)
        $sortable = ['name', 'doctor_code', 'specialization'];
        $sort = in_array($request->sort, $sortable) ? $request->sort : 'name';
        $direction = $request->direction === 'desc' ? 'desc' : 'asc';
        
        $query->orderBy($sort, $direction);

        // 4. Pagination 10 data per halaman dengan withQueryString()
        $doctors = $query->paginate(10)->withQueryString();
        $polis = \App\Models\Poli::all();

        return view('dokter.index', compact('doctors', 'polis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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