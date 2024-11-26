<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class period_greenhouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_greenhouse',
        'id_tanaman',
        'tanam_period',
        'tanam_time',
        'panen_time',
        'done',
      ];

    
}
