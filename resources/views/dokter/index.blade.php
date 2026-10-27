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

                <!-- Form Search, Filter & Sorting -->
                <div style="padding: 15px; background: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <form method="GET" action="{{ route('dokter.index') }}" style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/kode dokter..." style="padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px; flex: 1; min-width: 200px;">
                        
                        <select name="poli_id" style="padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px;">
                            <option value="">-- Semua Poli --</option>
                            @foreach($polis as $poli)
                                <option value="{{ $poli->id }}" {{ request('poli_id') == $poli->id ? 'selected' : '' }}>{{ $poli->name }}</option>
                            @endforeach
                        </select>

                        <select name="sort" style="padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px;">
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Urut: Nama</option>
                            <option value="doctor_code" {{ request('sort') == 'doctor_code' ? 'selected' : '' }}>Urut: Kode</option>
                        </select>

                        <select name="direction" style="padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px;">
                            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>A-Z</option>
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Z-A</option>
                        </select>

                        <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 6px 14px; border-radius: 4px; cursor: pointer; font-weight: bold;">Filter</button>
                        <a href="{{ route('dokter.index') }}" style="background-color: #6c757d; color: white; padding: 6px 14px; text-decoration: none; border-radius: 4px; display: inline-block; font-weight: bold;">Reset</a>
                    </form>
                </div>

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
                            @forelse ($doctors as $index => $doctor)
                                <tr>
                                    <td>{{ $doctors->firstItem() + $index }}</td>
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
                                    <td colspan="7" style="text-align: center; padding: 20px; color: #6c757d;">Data dokter tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div style="padding: 15px;">
                    {{ $doctors->links() }}
                    <p style="font-size: 14px; color: #6c757d; margin-top: 5px;">
                        Menampilkan {{ $doctors->count() }} dari {{ $doctors->total() }} data dokter.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection