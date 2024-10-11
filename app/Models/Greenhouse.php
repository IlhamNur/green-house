<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Greenhouse extends Model
{
    use HasFactory;

    protected $table = 'greenhouses';

    protected $fillable = ['name', 'user_id', 'pin_status'];
}
