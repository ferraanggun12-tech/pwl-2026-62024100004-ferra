@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0; font-weight: bold;">Data Pendaftaran</h2>
        <a href="{{ route('registrasi.create') }}" style="background-color: #007bff; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; font-weight: bold;">+ Tambah Pendaftaran</a>
    </div>

    <table style="width: 100%; border-collapse: collapse; background: white;">
        <thead>
            <tr style="border-bottom: 2px solid #dee2e6; text-align: left;">
                <th style="padding: 12px;">No.</th>
                <th style="padding: 12px;">Nama Pasien</th>
                <th style="padding: 12px;">Dokter Tujuan</th>
                <th style="padding: 12px;">Tanggal Daftar</th>
                <th style="padding: 12px;">Keluhan</th>
                <th style="padding: 12px;">Status</th>
                <th style="padding: 12px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $index => $item)
            <tr style="border-bottom: 1px solid #dee2e6;">
                <td style="padding: 12px;">{{ $index + 1 }}</td>
                <td style="padding: 12px;">{{ $item->patient->name ?? '-' }}</td>
                <td style="padding: 12px;">{{ $item->doctor->name ?? '-' }}</td>
                <td style="padding: 12px;">{{ $item->registration_date }}</td>
                <td style="padding: 12px;">{{ $item->complaint ?? '-' }}</td>
                <td style="padding: 12px;">{{ ucfirst($item->status) }}</td>
                <td style="padding: 12px;">
                    <a href="{{ route('registrasi.edit', $item->id) }}" style="color: #ffc107; text-decoration: none; margin-right: 10px; font-weight: bold;">Edit</a>
                    <form action="{{ route('registrasi.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold; padding: 0;">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection