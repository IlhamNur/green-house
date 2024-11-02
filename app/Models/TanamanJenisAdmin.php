<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanamanJenisAdmin extends Model
{
    use HasFactory;

    protected $table = 'tanamanjenisadmins';


    protected $fillable = [
        'name',
        'picture',
        'latin_name',
        'temperature',
        'humidity',
        'soil_max',
        'soil_min',
        'light_intensity',
        'updated_at',
        'created_at',
      ];
}
