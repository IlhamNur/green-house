<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantList extends Model
{
    use HasFactory;

    protected $table = 'plant_lists';

    protected $fillable = [
        'plant_name',
        'picture',
        'latin_name',
        'temperature',
        'humidity',
        'nutrition',
        'light',
        'water_f',
        'water_e',
        'harvest_time'
    ];
}
