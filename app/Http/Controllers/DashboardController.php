<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// PASTI KAN NAMA CLASS-NYA ADALAH DashboardController
class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPasien = 25;
        $jumlahDokter = 8;
        $jumlahPoli = 4;

        return view('dashboard', compact('jumlahPasien', 'jumlahDokter', 'jumlahPoli'));
    }
}