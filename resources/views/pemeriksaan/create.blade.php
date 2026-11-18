@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    <h2>Form Pemeriksaan Pasien</h2>
    <p>Silakan catat diagnosa dan resep obat untuk pasien berikut.</p>

    <div class="card" style="border: 1px solid #dee2e6; border-radius: 5px; padding: 20px; margin-bottom: 20px; background-color: #f8f9fa;">
        <p><strong>Nama Pasien:</strong> {{ $registration->patient->name ?? '-' }}</p>
        <p><strong>Poli Tujuan:</strong> {{ $registration->doctor->poli->name ?? '-' }}</p>
        <p><strong>Keluhan:</strong> {{ $registration->complaint ?? '-' }}</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemeriksaan.store', $registration->id) }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="diagnosa" style="display: block; font-weight: bold; margin-bottom: 5px;">Diagnosa Medis:</label>
            <textarea name="diagnosa" id="diagnosa" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>{{ old('diagnosa') }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="resep" style="display: block; font-weight: bold; margin-bottom: 5px;">Resep Obat / Catatan Dokter:</label>
            <textarea name="resep" id="resep" rows="3" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ old('resep') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success" style="background-color: #28a745; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer;">Simpan Hasil Pemeriksaan</button>
        <a href="{{ route('pemeriksaan.index') }}" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; margin-left: 10px;">Kembali</a>
    </form>
</div>
@endsection