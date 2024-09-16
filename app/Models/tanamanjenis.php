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
        'ph',
        'soil_moisture',
        'light_intensity',
        'updated_at',
        'created_at',
      ];
}
