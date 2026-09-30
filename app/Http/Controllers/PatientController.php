<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
{
    $patients = [
        ['id' => 1, 'nama' => 'Ferra', 'alamat' => 'Kudus'],
        ['id' => 2, 'nama' => 'Anggun', 'alamat' => 'Jepara'],
        ['id' => 3, 'nama' => 'Lestari', 'alamat' => 'Pati'],
    ];

    return view('pasien.index', compact('patients'));
}
    public function show($id)
{
    return 'Menampilkan pasien dengan ID: ' . $id;
}
}
