<?php

namespace App\Http\Controllers;

use App\Models\{Greenhouse, SensorData, User, Period};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'user') {
            $greenhouse = Greenhouse::where('pin_status', 1)->where('user_id', $user->id)->first();

            if ($greenhouse) {
                $currentPeriod = Period::where('gh_id', $greenhouse->id)->orderBy('period', 'desc')->first();

                if ($currentPeriod) {
                    $targetDate = Carbon::parse($currentPeriod->created_at)->addDays($currentPeriod->harvest_time);
                    $daysUntilHarvest = (int) abs(Carbon::today()->diffInDays($targetDate, false));

                    $sensorData = SensorData::where('greenhouse_id', $greenhouse->id)
                        ->where('period_id', $currentPeriod->id)
                        ->latest()
                        ->take(7)
                        ->get();

                    return view('index', [
                        'greenhouse' => $greenhouse,
                        'sensorDatas' => $sensorData,
                        'period' => $currentPeriod,
                        'daysUntil' => $daysUntilHarvest
                    ]);
                }
            }

            return view('index');
        }

        return view('greenhouse-manage', [
            'users' => User::all(),
            'greenhouses' => Greenhouse::orderBy('user_id')->get(),
            'periods' => Period::all()
        ]);
    }

    public function getSensorData()
    {
        $user = Auth::user();
        $greenhouse = Greenhouse::where('pin_status', 1)->where('user_id', $user->id)->first();

        $sensorData = $greenhouse ? SensorData::where('greenhouse_id', $greenhouse->id)->latest()->take(7)->get() : [];

        return response()->json($sensorData);
    }
}
