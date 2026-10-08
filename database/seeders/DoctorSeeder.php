<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            ['DR001', 'dr. Andi Pratama',   'Umum',          '081200000001', true],
            ['DR002', 'dr. Lina Marlina',   'Anak',          '081200000002', true],
            ['DR003', 'dr. Hendra Wijaya',  'Penyakit Dalam','081200000003', true],
            ['DR004', 'dr. Sari Utami',     'Kulit',         '081200000004', true],
            ['DR005', 'dr. Bayu Santoso',   'Bedah',         null,           false],
            ['DR006', 'dr. Maya Putri',     'Mata',          '081200000006', true],
            ['DR007', 'dr. Fajar Nugroho',  'THT',           '081200000007', false],
            ['DR008', 'dr. Rina Kusuma',    'Gigi',          '081200000008', true],
        ];

        foreach ($doctors as $d) {
            Doctor::create([
                'doctor_code'    => $d[0],
                'name'           => $d[1],
                'specialization' => $d[2],
                'phone'          => $d[3],
                'is_active'      => $d[4],
            ]);
        }
    }
}