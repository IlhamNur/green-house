<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_Greenhouse extends Model
{
    use HasFactory;

    protected $table = 'list_greenhouses';

    protected $fillable = [
        'name',
        'id_user',
        'id_tanaman',
        'pin_status',
        'updated_at',
        'created_at',
      ];
}
