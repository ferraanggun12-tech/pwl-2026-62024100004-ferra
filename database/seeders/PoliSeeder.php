<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        Poli::updateOrCreate(
            ['code' => 'POL001'],
            ['name' => 'Poli Umum', 'description' => 'Pemeriksaan kesehatan umum', 'is_active' => true]
        );

        Poli::updateOrCreate(
            ['code' => 'POL002'],
            ['name' => 'Poli Gigi', 'description' => 'Perawatan dan pengobatan gigi', 'is_active' => true]
        );

        Poli::updateOrCreate(
            ['code' => 'POL003'],
            ['name' => 'Poli Anak', 'description' => 'Kesehatan tumbuh kembang anak', 'is_active' => true]
        );

        Poli::updateOrCreate(
            ['code' => 'POL004'],
            ['name' => 'Poli Kandungan', 'description' => 'Kesehatan ibu dan kandungan', 'is_active' => true]
        );

        Poli::updateOrCreate(
            ['code' => 'POL005'],
            ['name' => 'Poli Penyakit Dalam', 'description' => 'Penanganan organ dalam dewasa', 'is_active' => true]
        );
    }
}