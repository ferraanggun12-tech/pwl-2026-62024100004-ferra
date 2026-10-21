<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['patient', 'doctor.poli'])->get();
        return view('registrasi.index', compact('registrations'));
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