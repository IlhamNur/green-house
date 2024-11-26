<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_Greenhouse extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $table = 'list_greenhouses';

    protected $fillable = [
        'name',
        'id_user',
        'pin_status',
        'updated_at',
        'created_at',
      ];
}
