@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Dokter</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No.</th>
                                <th>Kode Dokter</th>
                                <th>Nama</th>
                                <th>Spesialisasi</th>
                                <th>No. Telepon</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->doctor_code }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->specialization }}</td>
                                    <td>{{ $doctor->phone ?? '-' }}</td>
                                    <td>
                                        @if($doctor->is_active)
                                            Aktif
                                        @else
                                            Tidak Aktif
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data dokter belum ada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>
@endsection