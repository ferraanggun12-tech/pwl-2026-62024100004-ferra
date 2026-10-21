@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="margin: 0;">Detail Dokter</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 200px;">Kode Dokter</th>
                            <td>{{ $doctor->doctor_code }}</td>
                        </tr>
                        <tr>
                            <th>Nama Dokter</th>
                            <td><strong>{{ $doctor->name }}</strong></td>
                        </tr>
                        <tr>
                            <th>Spesialisasi</th>
                            <td>{{ $doctor->specialization }}</td>
                        </tr>
                        <tr>
                            <th>Poli Tempat Bertugas</th>
                            <td>
                                <!-- Menampilkan nama poli dari relasi Eloquent -->
                                <span class="badge badge-info" style="font-size: 14px; padding: 6px 12px;">
                                    {{ $doctor->poli->name ?? 'Tidak ada Poli' }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td>{{ $doctor->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Status Aktif</th>
                            <td>{{ $doctor->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                        </tr>
                    </table>

                    <div style="margin-top: 20px;">
                        <a href="{{ route('dokter.index') }}" style="background-color: #6c757d; color: white; padding: 6px 14px; text-decoration: none; border-radius: 4px;">Kembali</a>
                        <a href="{{ route('dokter.edit', $doctor->id) }}" style="background-color: #ffc107; color: black; padding: 6px 14px; text-decoration: none; border-radius: 4px; margin-left: 5px;">Edit Data</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection