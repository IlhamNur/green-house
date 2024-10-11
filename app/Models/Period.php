<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $table = 'periods';

    protected $fillable = ['gh_id', 'plant_type', 'temperature', 'humidity', 'nutrition', 'light', 'water_f',  'water_e', 'period', 'harvest_time'];
}
