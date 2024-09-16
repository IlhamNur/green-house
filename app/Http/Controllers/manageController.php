<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\list_greenhouse;

class manageController extends Controller
{
    public function index()
    {
        $data = DB::select('
        select * from list_greenhouses
        ');

        return view('manage-greenhouse', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'tanaman' => 'required', 
        ]);

        list_greenhouse::create($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post created successfully.');
    }
    public function destroy($id)
    {
        $data = list_greenhouse::find($id);
        $data->delete();
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post deleted successfully');
    }
    public function edit($id)
    {
        $data = list_greenhouse::find($id);
        return view('info-greenhouse', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|max:255',
        'tanaman' => 'required',
        ]);
        $data = list_greenhouse::find($id);
        $data->update($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post updated successfully.');
    }
}
