@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="padding: 20px;">
    <h2>Edit Data Poli</h2>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('poli.update', $poli->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 12px;">
            <label>Kode Poli:</label><br>
            <input type="text" name="code" value="{{ old('code', $poli->code) }}" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 12px;">
            <label>Nama Poli:</label><br>
            <input type="text" name="name" value="{{ old('name', $poli->name) }}" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 12px;">
            <label>Deskripsi:</label><br>
            <textarea name="description" style="width: 100%; padding: 8px;">{{ old('description', $poli->description) }}</textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Status:</label><br>
            <select name="is_active" style="width: 100%; padding: 8px;">
                <option value="1" {{ old('is_active', $poli->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('is_active', $poli->is_active) == '0' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" style="background-color: #ffc107; color: black; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Perbarui</button>
        <a href="{{ route('poli.index') }}" style="margin-left: 10px; text-decoration: none; color: #6c757d;">Kembali</a>
    </form>
</div>
@endsection