@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0; font-weight: bold;">Data Pendaftaran</h2>
        <a href="{{ route('registrasi.create') }}" style="background-color: #007bff; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; font-weight: bold;">+ Tambah Pendaftaran</a>
    </div>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Search, Filter & Sorting Pendaftaran -->
    <form method="GET" action="{{ route('registrasi.index') }}" style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pasien..." style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px; flex: 1; min-width: 180px;">
        
        <select name="doctor_id" style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            <option value="">-- Semua Dokter --</option>
            @foreach($doctors as $doc)
                <option value="{{ $doc->id }}" {{ request('doctor_id') == $doc->id ? 'selected' : '' }}>{{ $doc->name }}</option>
            @endforeach
        </select>

        <select name="status" style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            <option value="">-- Semua Status --</option>
            <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>Waiting</option>
            <option value="examined" {{ request('status') == 'examined' ? 'selected' : '' }}>Examined</option>
            <option value="finished" {{ request('status') == 'finished' ? 'selected' : '' }}>Finished</option>
        </select>

        <select name="sort" style="padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
        </select>

        <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; font-weight: bold;">Filter</button>
        <a href="{{ route('registrasi.index') }}" style="background-color: #6c757d; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; display: inline-block; font-weight: bold;">Reset</a>
    </form>

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
            @forelse($registrations as $index => $item)
            <tr style="border-bottom: 1px solid #dee2e6;">
                <td style="padding: 12px;">{{ $registrations->firstItem() + $index }}</td>
                <td style="padding: 12px;">{{ $item->patient->name ?? '-' }}</td>
                <td style="padding: 12px;">{{ $item->doctor->name ?? '-' }} (Poli: {{ $item->doctor->poli->name ?? '-' }})</td>
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
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 30px; color: #6c757d; font-style: italic;">
                    Data pendaftaran tidak ditemukan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="margin-top: 20px;">
        {{ $registrations->links() }}
        <p style="font-size: 14px; color: #6c757d; margin-top: 5px;">
            Menampilkan {{ $registrations->count() }} dari {{ $registrations->total() }} data pendaftaran.
        </p>
    </div>
</div>
@endsection