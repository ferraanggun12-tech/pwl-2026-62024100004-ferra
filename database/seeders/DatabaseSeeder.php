<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
    ['email' => 'admin@klinik.test'],
    [
        'name' => 'Admin Klinik',
        'password' => Hash::make('password123'),
    ]
    );

    User::firstOrCreate(
        ['email' => 'petugas@klinik.test'],
        [
            'name' => 'Petugas Klinik',
            'password' => Hash::make('password123'),
        ]
    );

        $this->call([
            PatientSeeder::class, 
            DoctorSeeder::class,
            PoliSeeder::class,  
        ]);
    }
}
