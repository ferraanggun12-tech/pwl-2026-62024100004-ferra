<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $fillable = [
    'code',
    'name',
    'description',
    'is_active',
];
}
