@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="padding: 20px;">
    <h2>Tambah Data Pasien</h2>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 12px;">
            <label>No. Rekam Medis:</label><br>
            <input type="text" name="medical_record_number" value="{{ old('medical_record_number') }}" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 12px;">
            <label>Nama Pasien:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 12px;">
            <label>Gender (L / P):</label><br>
            <select name="gender" style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Gender --</option>
                <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan (P)</option>
            </select>
        </div>
        <div style="margin-bottom: 12px;">
            <label>Tanggal Lahir:</label><br>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 12px;">
            <label>Alamat:</label><br>
            <textarea name="address" style="width: 100%; padding: 8px;">{{ old('address') }}</textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label>No. Telepon:</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}" style="width: 100%; padding: 8px;">
        </div>
        <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
        <a href="{{ route('pasien.index') }}" style="margin-left: 10px; text-decoration: none; color: #6c757d;">Kembali</a>
    </form>
</div>
@endsection