@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="padding: 20px;">
    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 class="card-title" style="margin: 0;">Detail Poli: {{ $poli->name }}</h3>
            <a href="{{ route('poli.index') }}" style="background-color: #6c757d; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px;">Kembali</a>
        </div>

        <div class="card-body" style="padding: 20px;">
            <table style="width: 100%; margin-bottom: 20px; line-height: 1.8;">
                <tr>
                    <td style="width: 150px; font-weight: bold;">Kode Poli</td>
                    <td>: {{ $poli->code }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Nama Poli</td>
                    <td>: {{ $poli->name }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Deskripsi</td>
                    <td>: {{ $poli->description ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Status</td>
                    <td>: {{ $poli->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                </tr>
            </table>

            <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">

            <h4>Daftar Dokter di {{ $poli->name }}</h4>
            <table class="table table-bordered text-nowrap" style="width: 100%; margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="width: 50px;">No.</th>
                        <th>Kode Dokter</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Telepon</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($poli->doctors as $doctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $doctor->doctor_code }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->specialization }}</td>
                            <td>{{ $doctor->phone ?? '-' }}</td>
                            <td>{{ $doctor->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 15px;">Belum ada dokter yang terdaftar di poli ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection