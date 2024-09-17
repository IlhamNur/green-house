<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanamanjenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'temperature',
        'humidity',
        'soil_max',
        'soil_min',
        'light_intensity',
        'updated_at',
        'created_at',
      ];
}
