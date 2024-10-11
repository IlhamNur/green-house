<?php

namespace App\Http\Controllers;

use App\Models\Greenhouse;
use App\Models\SensorData;
use App\Models\User;
use App\Models\Period;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'user') {
            $userId = Auth::user()->id;
            $greenhouse = Greenhouse::where('pin_status', '1')->where('user_id', $userId)->first();


            if ($greenhouse) {
                $today = Carbon::today();
                $greenhouseId = $greenhouse->id;
                $period = Period::where('gh_id', $greenhouseId)->count();
                $period = Period::where('gh_id', $greenhouseId)->where('period', $period)->first();

                $target = Carbon::parse($period->created_at->copy()->addDays($period->harvest_time)->format('Y-m-d H:i:s'));

                $daysUntil = (int) abs($today->diffInDays($target, false));

                $sensorDatas = SensorData::where('greenhouse_id', $greenhouseId)->where('period_id', $period->id)->latest()->take(7)->get();
                if ($sensorDatas) {
                    return view('index', ['greenhouse' => $greenhouse, 'sensorDatas' => $sensorDatas, 'daysUntil' => $daysUntil]);
                }

                return view('index', ['greenhouse' => $greenhouse, 'daysUntil' => $daysUntil]);
            }

            return view('index');
        } else {
            $users = User::all();
            $greenhouses = Greenhouse::orderBy('user_id', 'asc')->get();
            $periods = Period::all();

            return view('greenhouse-manage', ['greenhouses' => $greenhouses, 'users' => $users, 'periods' => $periods]);
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
