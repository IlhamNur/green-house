<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanamanJenis extends Model
{
    use HasFactory;

    protected $table = 'tanamanjenis';

    protected $fillable = [
        'id_user',
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
