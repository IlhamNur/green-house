<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tanamanjenis;


class DataSensor extends Controller
{
    public function welcome()
    {
        $data = DB::select('
        select * from sensor_data 
        order by id desc
        limit 1');

        return view('welcome', compact('data'));
    }
}
