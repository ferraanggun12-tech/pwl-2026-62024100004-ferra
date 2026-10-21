<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        // Mengambil data pendaftaran beserta relasi pasien dan dokter
        $registrations = Registration::with(['patient', 'doctor'])->get();
        
        return view('registrasi.index', compact('registrations'));
    }
}