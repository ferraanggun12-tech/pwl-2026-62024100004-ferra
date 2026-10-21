@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="padding: 20px;">
    <h2>Tambah Data Dokter</h2>

    {{-- Menampilkan Pesan Error Validasi --}}
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        
        <div style="margin-bottom: 12px;">
            <label>Kode Dokter:</label><br>
            <input type="text" name="doctor_code" value="{{ old('doctor_code') }}" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 12px;">
            <label>Nama Dokter:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 12px;">
            <label>Spesialisasi:</label><br>
            <input type="text" name="specialization" value="{{ old('specialization') }}" style="width: 100%; padding: 8px;">
        </div>

        {{-- BAGIAN PILIHAN POLI (RELASI) --}}
        <div style="margin-bottom: 12px;">
            <label>Pilih Poli:</label><br>
            <select name="poli_id" style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Poli --</option>
                @foreach ($polis as $poli)
                    <option value="{{ $poli->id }}" @selected(old('poli_id') == $poli->id)>
                        {{ $poli->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 12px;">
            <label>No. Telepon:</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Status:</label><br>
            <select name="is_active" style="width: 100%; padding: 8px;">
                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
        <a href="{{ route('dokter.index') }}" style="margin-left: 10px; text-decoration: none; color: #6c757d;">Kembali</a>
    </form>
</div>
@endsection