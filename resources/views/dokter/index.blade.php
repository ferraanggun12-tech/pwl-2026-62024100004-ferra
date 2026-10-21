@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="card-title" style="margin: 0;">Data Dokter</h3>
                    <a href="{{ route('dokter.create') }}" style="background-color: #007bff; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px;">+ Tambah Dokter</a>
                </div>

                @if (session('success'))
                    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin: 15px; border-radius: 4px;">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered text-nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No.</th>
                                <th>Kode Dokter</th>
                                <th>Nama Dokter</th>
                                <th>Spesialisasi</th>
                                <th>Poli</th>
                                <th>No. Telepon</th>
                                <th style="width: 180px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->doctor_code }}</td>
                                    <td>
                                        <a href="{{ route('dokter.show', $doctor->id) }}" style="color: #007bff; text-decoration: none; font-weight: bold;">
                                            {{ $doctor->name }}
                                        </a>
                                    </td>
                                    <td>{{ $doctor->specialization }}</td>
                                    <td>{{ $doctor->poli->name ?? '-' }}</td>
                                    <td>{{ $doctor->phone ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('dokter.show', $doctor->id) }}" style="color: #17a2b8; margin-right: 6px; text-decoration: none; font-weight: bold;">Detail</a>
                                        <a href="{{ route('dokter.edit', $doctor->id) }}" style="color: #ffc107; margin-right: 6px; text-decoration: none; font-weight: bold;">Edit</a>
                                        
                                        <form action="{{ route('dokter.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus data dokter ini?')" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="text-align: center; padding: 15px;">Data dokter belum ada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection