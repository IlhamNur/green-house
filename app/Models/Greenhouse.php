<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Greenhouse extends Model
{
    use HasFactory;

    protected $table = 'greenhouses';

    protected $fillable = ['name', 'user_id', 'plant_type', 'temperature', 'humidity', 'nutrition', 'light', 'ph', 'water_f',  'water_e', 'pin_status'];
}
