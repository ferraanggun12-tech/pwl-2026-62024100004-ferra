@extends('layouts.app') {{-- Sesuaikan nama file layout kamu dari Pertemuan 3 --}}

   @section('content')
   <div class="container mt-4">
       <h2>Data Dokter</h2>
       <table class="table table-bordered">
           <thead>
               <tr>
                   <th>No</th>
                   <th>Kode Dokter</th>
                   <th>Nama Dokter</th>
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
                               <span class="badge bg-success">Aktif</span>
                           @else
                               <span class="badge bg-danger">Tidak Aktif</span>
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
   @endsection