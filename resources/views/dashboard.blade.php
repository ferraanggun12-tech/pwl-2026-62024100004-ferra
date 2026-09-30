@extends('layouts.app')

@section('title', 'Dashboard Klinik')

@section('content')
    <h1>Dashboard Klinik</h1>
    <p>Selamat datang di Sistem Informasi Klinik.</p>
    <ul>
        <li>Jumlah Pasien: {{ $jumlahPasien }}</li>
        <li>Jumlah Dokter: {{ $jumlahDokter }}</li>
        <li>Jumlah Poli: {{ $jumlahPoli }}</li>
    </ul>
@endsection