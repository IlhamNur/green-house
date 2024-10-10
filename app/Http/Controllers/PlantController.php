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

    public function store(Request $request)
    {
        $data = $request->validate([
            'plant_name' => 'required',
            'picture' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'latin_name' => 'required',
            'temperature' => 'required',
            'humidity' => 'required',
            'nutrition' => 'required',
            'light' => 'required',
            'water_f' => 'required',
            'water_e' => 'required',
        ]);

        // Handle the file upload
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('plant_pictures', 'public');
        }

        // Save the data to the database
        PlantList::create($data);

        return redirect()->back()->with('success', 'Plant added successfully!');
    }

    public function destroy($id)
    {
        PlantList::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Plant deleted successfully!');
    }
}
