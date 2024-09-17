<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_greenhouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_user',
        'id_tanaman',
        'updated_at',
        'created_at',
      ];
}
