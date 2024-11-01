<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlantList;

class PlantController extends Controller
{
    public function index()
    {
        $plant_lists = PlantList::all();
        return view('plant-list', compact('plant_lists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'plant_name' => 'required|string|max:255',
            'picture' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'latin_name' => 'required|string|max:255',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'nutrition' => 'required|numeric',
            'light' => 'required|numeric',
            'water_f' => 'required|numeric',
            'water_e' => 'required|numeric',
            'harvest_time' => 'required|numeric'
        ]);

        if ($file = $request->file('picture')) {
            $data['picture'] = $file->store('plant_pictures', 'public');
        }

        PlantList::create($data);

        return redirect()->back()->withSuccess('Plant added successfully!');
    }

    public function destroy($id)
    {
        $plant = PlantList::findOrFail($id);
        $plant->delete();

        return redirect()->back()->withSuccess('Plant deleted successfully!');
    }
}
