@extends('layouts.app') 

@section('content')
<div class="container" style="padding: 20px;">
    <h2>Pemeriksaan Medis Pasien</h2>
    <p>Daftar antrean pasien yang siap diperiksa oleh dokter.</p>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered" style="width: 100%; border-collapse: collapse; margin-top: 15px;">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th style="border: 1px solid #dee2e6; padding: 8px;">No</th>
                <th style="border: 1px solid #dee2e6; padding: 8px;">Nama Pasien</th>
                <th style="border: 1px solid #dee2e6; padding: 8px;">Poli Tujuan</th>
                <th style="border: 1px solid #dee2e6; padding: 8px;">Keluhan</th>
                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Status</th>
                <th style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($registrations ?? [] as $index => $registration)
        <tr>
            <td style="border: 1px solid #dee2e6; padding: 8px;">{{ $index + 1 }}</td>
            <td style="border: 1px solid #dee2e6; padding: 8px;">{{ $registration->patient->name ?? '-' }}</td>
            
            <!-- Mengambil nama poli melalui relasi dokter -->
            <td style="border: 1px solid #dee2e6; padding: 8px;">
                {{ $registration->doctor->poli->name ?? '-' }}
            </td>
            
            <!-- Mengambil keluhan menggunakan kolom 'complaint' -->
            <td style="border: 1px solid #dee2e6; padding: 8px;">
                {{ $registration->complaint ?? '-' }}
            </td>

            <!-- Kolom Status -->
            <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                @if($registration->status == 'Selesai')
                    <span style="background-color: #28a745; color: white; padding: 3px 8px; border-radius: 4px; font-size: 12px;">Selesai</span>
                @else
                    <span style="background-color: #ffc107; color: black; padding: 3px 8px; border-radius: 4px; font-size: 12px;">{{ $registration->status ?? 'Menunggu' }}</span>
                @endif
            </td>

            <!-- Kolom Aksi Dinamis (Periksa / Edit Hasil) -->
            <td style="border: 1px solid #dee2e6; padding: 8px; text-align: center;">
                @if($registration->status == 'Selesai')
                    <a href="{{ route('pemeriksaan.edit', $registration->id) }}" class="btn btn-sm" style="background-color: #6c757d; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Edit Hasil</a>
                @else
                    <a href="{{ route('pemeriksaan.create', $registration->id) }}" class="btn btn-primary btn-sm" style="background-color: #007bff; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Periksa</a>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="border: 1px solid #dee2e6; padding: 12px; text-align: center; color: #6c757d;">
                Belum ada antrean pasien untuk diperiksa saat ini.
            </td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection