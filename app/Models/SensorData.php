<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $table = 'sensor_datas';

    protected $fillable = ['greenhouse_id', 'temperature', 'humidity', 'nutrition', 'light', 'ph', 'water_level'];
}
