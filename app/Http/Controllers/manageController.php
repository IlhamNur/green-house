<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\list_greenhouse;

class manageController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $data = DB::select('
            SELECT LG.name AS greenhouse, TJ.name AS tanaman
            FROM list_greenhouses AS LG
            INNER JOIN tanamanjenis AS TJ ON LG.id_tanaman = TJ.id
            WHERE LG.id_user = ?
        ', [$id]);
        // dd($data);

        return view('manage-greenhouse', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'id_tanaman' => 'required', 
        ]);
        $request['id_user'] = Auth::user()->id;

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
        'id_tanaman' => 'required',
        ]);
        $request['id_user'] = Auth::user()->id;
        $data = list_greenhouse::find($id);
        $data->update($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post updated successfully.');
    }
}
