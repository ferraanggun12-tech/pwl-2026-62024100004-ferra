@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="card-title" style="margin: 0;">Data Poli</h3>
                    <a href="{{ route('poli.create') }}" style="background-color: #007bff; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px;">+ Tambah Poli</a>
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
                                <th>Kode Poli</th>
                                <th>Nama Poli</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th style="width: 180px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($polis as $poli)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $poli->code }}</td>
                                    <td>
                                        <!-- Link menuju halaman Detail Poli (Show) -->
                                        <a href="{{ route('poli.show', $poli->id) }}" style="color: #007bff; text-decoration: none; font-weight: bold;">
                                            {{ $poli->name }}
                                        </a>
                                    </td>
                                    <td>{{ $poli->description ?? '-' }}</td>
                                    <td>{{ $poli->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('poli.show', $poli->id) }}" style="color: #17a2b8; margin-right: 6px; text-decoration: none; font-weight: bold;">Detail</a>
                                        <a href="{{ route('poli.edit', $poli->id) }}" style="color: #ffc107; margin-right: 6px; text-decoration: none; font-weight: bold;">Edit</a>
                                        
                                        <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus data poli ini?')" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 15px;">Data poli belum ada.</td> 
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection