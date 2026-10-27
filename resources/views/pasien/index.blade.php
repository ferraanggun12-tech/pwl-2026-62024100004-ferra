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

                <!-- Form Search, Filter Gender & Sorting -->
                <div style="padding: 15px; background: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <form method="GET" action="{{ route('pasien.index') }}" style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / No. RM..." style="padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px; flex: 1; min-width: 200px;">
                        
                        <select name="gender" style="padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px;">
                            <option value="">-- Semua Gender --</option>
                            <option value="L" {{ request('gender') == 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                            <option value="P" {{ request('gender') == 'P' ? 'selected' : '' }}>Perempuan (P)</option>
                        </select>

                        <select name="sort" style="padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px;">
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Urut: Nama</option>
                            <option value="medical_record_number" {{ request('sort') == 'medical_record_number' ? 'selected' : '' }}>Urut: No. RM</option>
                            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Urut: Tanggal Input</option>
                        </select>

                        <select name="direction" style="padding: 6px 10px; border: 1px solid #ced4da; border-radius: 4px;">
                            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>A-Z (Asc)</option>
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Z-A (Desc)</option>
                        </select>

                        <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 6px 14px; border-radius: 4px; cursor: pointer; font-weight: bold;">Filter</button>
                        <a href="{{ route('pasien.index') }}" style="background-color: #6c757d; color: white; padding: 6px 14px; text-decoration: none; border-radius: 4px; display: inline-block; font-weight: bold;">Reset</a>
                    </form>
                </div>

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
                            @forelse ($patients as $index => $patient)
                                <tr>
                                    <td>{{ $patients->firstItem() + $index }}</td>
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
                                    <td colspan="8" class="text-center" style="text-align: center; padding: 20px; color: #6c757d;">Data pasien tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination & Informasi Data -->
                <div style="padding: 15px;">
                    {{ $patients->links() }}
                    <p style="font-size: 14px; color: #6c757d; margin-top: 5px;">
                        Menampilkan {{ $patients->count() }} dari {{ $patients->total() }} data pasien.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection