<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::query();

        // 1. Fitur Search berdasarkan nama atau nomor rekam medis
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('medical_record_number', 'like', "%{$search}%");
            });
        }

        // 2. Filter berdasarkan Gender (L / P)
        if ($request->has('gender') && $request->gender != '') {
            $query->where('gender', $request->gender);
        }

        // 3. Sorting data (Whitelist kolom untuk keamanan)
        $allowedSorts = ['name', 'medical_record_number', 'created_at'];
        $sort = in_array($request->sort, $allowedSorts) ? $request->sort : 'name';
        $direction = $request->direction === 'desc' ? 'desc' : 'asc';
        
        $query->orderBy($sort, $direction);

        // 4. Pagination 10 data per halaman dengan withQueryString() agar parameter filter ikut saat pindah halaman
        $patients = $query->paginate(10)->withQueryString();

        return view('pasien.index', compact('patients'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medical_record_number' => 'required|unique:patients,medical_record_number',
            'name' => 'required|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|max:20',
        ]);

        Patient::create($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit(Patient $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Patient $pasien)
    {
        $validated = $request->validate([
            'medical_record_number' => [
                'required',
                Rule::unique('patients', 'medical_record_number')->ignore($pasien->id),
            ],
            'name' => 'required|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|max:20',
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Patient $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}