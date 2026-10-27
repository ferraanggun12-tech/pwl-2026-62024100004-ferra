<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with(['patient', 'doctor.poli']);

        // 1. Search berdasarkan nama pasien
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('patient', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // 2. Filter berdasarkan dokter
        if ($request->has('doctor_id') && $request->doctor_id != '') {
            $query->where('doctor_id', $request->doctor_id);
        }

        // 3. Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // 4. Sorting tanggal terbaru/terlama
        $sortDirection = $request->sort === 'oldest' ? 'asc' : 'desc';
        $query->orderBy('registration_date', $sortDirection);

        // 5. Pagination 10 data per halaman dengan withQueryString()
        $registrations = $query->paginate(10)->withQueryString();
        $doctors = Doctor::all();

        return view('registrasi.index', compact('registrations', 'doctors'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::with('poli')->get();
        return view('registrasi.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'registration_date' => 'required|date',
            'complaint' => 'nullable|string',
            'status' => 'required|string',
        ]);

        Registration::create($request->all());

        return redirect()->route('registrasi.index')->with('success', 'Data pendaftaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::with('poli')->get();

        return view('registrasi.edit', compact('registration', 'patients', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'registration_date' => 'required|date',
            'complaint' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $registration = Registration::findOrFail($id);
        $registration->update($request->all());

        return redirect()->route('registrasi.index')->with('success', 'Data pendaftaran berhasil diubah.');
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrasi.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}