<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $judul = 'Data Poli';
        return view('poli.index', compact('judul'));
    }
}