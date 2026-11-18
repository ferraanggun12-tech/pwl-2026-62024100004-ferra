@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    <!-- Bagian Header & Tombol Tambah di Kanan Atas -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">Manajemen User</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; font-weight: bold;">
            + Tambah User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data User -->
    <table class="table table-bordered" style="width: 100%; border-collapse: collapse; background-color: #fff;">
        <thead>
            <tr style="background-color: #f8f9fa;">
                <th style="border: 1px solid #dee2e6; padding: 10px; width: 60px;">No.</th>
                <th style="border: 1px solid #dee2e6; padding: 10px;">Nama</th>
                <th style="border: 1px solid #dee2e6; padding: 10px;">Email</th>
                <th style="border: 1px solid #dee2e6; padding: 10px;">Role</th>
                <th style="border: 1px solid #dee2e6; padding: 10px; width: 120px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users ?? [] as $index => $user)
            <tr>
                <td style="border: 1px solid #dee2e6; padding: 10px;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #dee2e6; padding: 10px;">{{ $user->name }}</td>
                <td style="border: 1px solid #dee2e6; padding: 10px;">{{ $user->email }}</td>
                <td style="border: 1px solid #dee2e6; padding: 10px;">{{ ucfirst($user->role) }}</td>
                <td style="border: 1px solid #dee2e6; padding: 10px; text-align: center;">
                    <a href="{{ route('users.edit', $user->id) }}" style="color: #ffc107; text-decoration: none; font-weight: bold; margin-right: 8px;">Edit</a>
                    
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold; padding: 0;">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="border: 1px solid #dee2e6; padding: 15px; text-align: center; color: #6c757d;">
                    Belum ada data user yang terdaftar.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection