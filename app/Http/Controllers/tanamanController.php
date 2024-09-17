<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tanamanjenis;


class tanamanController extends Controller
{
    public function index()
    {
        return view('tambah-tanaman');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'temperature' => 'required',
        'humidity' => 'required',
        'soil_max' => 'required',
        'soil_min' => 'required',
        'light_intensity' => 'required',
        ]);

        tanamanjenis::create($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post created successfully.');
    }
    public function destroy($id)
    {
        $data = tanamanjenis::find($id);
        $data->delete();
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post deleted successfully');
    }

    public function edit($id)
    {
        $data = tanamanjenis::find($id);
        
        return view('update-tanaman', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required',
        'temperature' => 'required',
        'humidity' => 'required',
        'soil_max' => 'required',
        'soil_min' => 'required',
        'light_intensity' => 'required',
        ]);
        $data = tanamanjenis::find($id);
        $data->update($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post updated successfully.');
    }
}
