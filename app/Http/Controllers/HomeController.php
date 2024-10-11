<?php

namespace App\Http\Controllers;

use App\Models\Greenhouse;
use App\Models\SensorData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'user') {
            $userId = Auth::user()->id;
            $greenhouse = Greenhouse::where('pin_status', '1')->where('user_id', $userId)->first();


            if ($greenhouse) {
                $greenhouseId = $greenhouse->id;
                $sensorDatas = SensorData::where('greenhouse_id', $greenhouseId)->latest()->take(7)->get();
                if ($sensorDatas) {
                    return view('index', ['greenhouse' => $greenhouse, 'sensorDatas' => $sensorDatas]);
                }

                return view('index', ['greenhouse' => $greenhouse]);
            }

            return view('index');
        } else {
            $users = User::all();
            $greenhouses = Greenhouse::orderBy('user_id', 'asc')->get();

            return view('greenhouse-manage', ['greenhouses' => $greenhouses, 'users' => $users]);
        }
    }

    public function getSensorData()
    {
        $userId = Auth::user()->id;
        $greenhouse = Greenhouse::where('pin_status', '1')->where('user_id', $userId)->first();

        if ($greenhouse) {
            $sensorDatas = SensorData::where('greenhouse_id', $greenhouse->id)->latest()->take(7)->get();
            return response()->json($sensorDatas);
        }

        return response()->json([]);
    }
}
