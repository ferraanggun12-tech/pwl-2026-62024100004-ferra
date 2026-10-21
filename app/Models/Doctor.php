<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_code',
        'name',
        'specialization',
        'phone',
        'is_active',
        'poli_id'
    ];

    // Relasi: Doctor milik satu Poli
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}