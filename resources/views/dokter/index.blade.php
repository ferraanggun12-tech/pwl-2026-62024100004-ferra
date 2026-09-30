@extends('layouts.app')

@section('title', 'Data Dokter')

@section('content')
    <h1>Daftar Dokter Klinik</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>Status Praktik</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor['nama'] }}</td>
                    <td>{{ $doctor['spesialisasi'] }}</td>
                    <td>
                        @if ($doctor['status'] === 'aktif')
                            <span style="color: green; font-weight: bold;">Aktif</span>
                        @elseif ($doctor['status'] === 'cuti')
                            <span style="color: orange; font-weight: bold;">Cuti</span>
                        @else
                            <span style="color: red; font-weight: bold;">Tidak Aktif</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data dokter.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection