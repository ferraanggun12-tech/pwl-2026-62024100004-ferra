@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 800px;">
    <h2 style="margin-bottom: 20px; font-weight: bold;">Edit Data Pendaftaran</h2>

    <form action="{{ route('registrasi.update', $registration->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Pasien:</label>
            <select name="patient_id" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" required>
                <option value="">-- Pilih Pasien --</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $registration->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Dokter Tujuan:</label>
            <select name="doctor_id" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $registration->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }} (Poli: {{ $doctor->poli->name ?? '-' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Tanggal Pendaftaran:</label>
            <input type="date" name="registration_date" value="{{ $registration->registration_date }}" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Keluhan:</label>
            <textarea name="complaint" rows="3" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" placeholder="Tuliskan keluhan pasien...">{{ $registration->complaint }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Status:</label>
            <select name="status" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;" required>
                <option value="waiting" {{ $registration->status == 'waiting' ? 'selected' : '' }}>Waiting (Menunggu)</option>
                <option value="examined" {{ $registration->status == 'examined' ? 'selected' : '' }}>Examined (Diperiksa)</option>
                <option value="finished" {{ $registration->status == 'finished' ? 'selected' : '' }}>Finished (Selesai)</option>
            </select>
        </div>

        <div>
            <button type="submit" style="background-color: #28a745; color: white; padding: 8px 16px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; margin-right: 10px;">Simpan Perubahan</button>
            <a href="{{ route('registrasi.index') }}" style="color: #6c757d; text-decoration: none; font-weight: bold;">Kembali</a>
        </div>
    </form>
</div>
@endsection