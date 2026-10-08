<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $patients = [
            ['RM0001', 'Ahmad',  'L', '2000-05-10', 'Kudus',  '081234567890'],
            ['RM0002', 'Siti',   'P', '2001-08-15', 'Jepara', '081234567891'],
            ['RM0003', 'Budi',   'L', '1999-03-22', 'Pati',   '081234567892'],
            ['RM0004', 'Dewi',   'P', '2002-11-30', 'Demak',  '081234567893'],
            ['RM0005', 'Rizky',  'L', '1998-07-07', 'Kudus',  '081234567894'],
        ];

        foreach ($patients as $p) {
            Patient::create([
                'medical_record_number' => $p[0],
                'name'       => $p[1],
                'gender'     => $p[2],
                'birth_date' => $p[3],
                'address'    => $p[4],
                'phone'      => $p[5],
            ]);
        }
    }
}