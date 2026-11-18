@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    <h2>Tambah User Baru</h2>
    <p>Silakan isi form di bawah ini untuk mendaftarkan user baru ke dalam sistem.</p>

    @if ($errors->any())
        <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" style="max-width: 600px; background: #fff; padding: 20px; border: 1px solid #dee2e6; border-radius: 5px;">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="role" style="display: block; font-weight: bold; margin-bottom: 5px;">Role / Hak Akses:</label>
            <select name="role" id="role" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="registration" {{ old('role') == 'registration' ? 'selected' : '' }}>Registration (Petugas Pendaftaran)</option>
                <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor (Dokter)</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password:</label>
            <input type="password" name="password" id="password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; font-weight: bold; margin-bottom: 5px;">Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Simpan User</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; margin-left: 10px;">Kembali</a>
    </form>
</div>
@endsection