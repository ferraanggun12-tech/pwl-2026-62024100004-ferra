@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="card-title" style="margin: 0;">Data Pasien</h3>
                    <a href="{{ route('pasien.create') }}" style="background-color: #007bff; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px;">+ Tambah Pasien</a>
                </div>

                <!-- Flash Message Sukses -->
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
                                <th>No. RM</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th style="width: 150px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $patient->medical_record_number }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ $patient->birth_date }}</td>
                                    <td>{{ $patient->address ?? '-' }}</td>
                                    <td>{{ $patient->phone ?? '-' }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('pasien.edit', $patient->id) }}" style="color: #ffc107; margin-right: 8px; text-decoration: none; font-weight: bold;">Edit</a>
                                        
                                        <form action="{{ route('pasien.destroy', $patient->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data pasien ini?')" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center" style="text-align: center; padding: 15px;">Data pasien belum ada.</td>
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