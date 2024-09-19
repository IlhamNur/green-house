<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlantList;

class PlantController extends Controller
{
    public function index()
    {
        $plant_lists = PlantList::all();
        return view('plant-list', ['plant_lists' => $plant_lists]);
    }
}
