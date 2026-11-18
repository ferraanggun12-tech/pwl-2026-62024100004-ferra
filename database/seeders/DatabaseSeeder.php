<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bagian Pembuatan Akun Demo (Wajib ada agar akun bisa login)
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.test',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas Pendaftaran',
            'email' => 'pendaftaran@klinik.test',
            'password' => Hash::make('password123'),
            'role' => 'registration',
        ]);

        User::create([
            'name' => 'Dokter Demo',
            'email' => 'dokter@klinik.test',
            'password' => Hash::make('password123'),
            'role' => 'doctor',
        ]);

        // 2. Bagian Panggil Seeder Lainnya
        $this->call([
            PatientSeeder::class, 
            DoctorSeeder::class,
            PoliSeeder::class,  
        ]);
    }
}