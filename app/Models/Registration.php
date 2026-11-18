<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Relasi ke Model Patient (Pasien)
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    /**
     * Relasi ke Model Poli
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }

    /**
     * Relasi ke Model Doctor (Dokter)
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id'); // Sesuaikan foreign key jika di database bernama doctor_id / dokter_id
    }
}