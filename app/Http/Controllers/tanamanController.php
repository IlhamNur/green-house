<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\TanamanJenis;
use App\Models\TanamanJenisAdmin;


class tanamanController extends Controller
{
    public function index()
    {
        return view('tambah-tanaman');
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;

        $request->validate([
        'name' => 'required',
        'temperature' => 'required',
        'humidity' => 'required',
        'soil_max' => 'required',
        'soil_min' => 'required',
        'light_intensity' => 'required',
        ]);

        $request['id_user'] = Auth::user()->id;

        TanamanJenis::create($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post created successfully.');
    }
    public function destroy($id)
    {
        $data = TanamanJenis::find($id);
        $data->delete();
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post deleted successfully');
    }

    public function edit($id)
    {
        $data = TanamanJenis::find($id);
        
        return view('update-tanaman', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $id = Auth::user()->id;

        $request->validate([
        'name' => 'required',
        'temperature' => 'required',
        'humidity' => 'required',
        'soil_max' => 'required',
        'soil_min' => 'required',
        'light_intensity' => 'required',
        ]);

        $request['id_user'] = Auth::user()->id;

        $data = TanamanJenis::find($id);
        $data->update($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post updated successfully.');
    }

    public function gettanamanadmins()
    {
        $datas = DB::select('
            SELECT *
            FROM tanamanjenisadmins
        ');
        return view('plantreff', compact('datas'));
    }

    public function pushtanamanadmins(Request $request, $id)
    {
        $tanamanid = TanamanJenisAdmin::find($id);

        $request['id_user'] = Auth::user()->id;
        $request['name'] = $tanamanid-> name;
        $request['temperature'] = $tanamanid-> temperature;
        $request['humidity'] = $tanamanid-> humidity;
        $request['soil_max'] = $tanamanid-> soil_max;
        $request['soil_min'] = $tanamanid-> soil_min;
        $request['light_intensity'] = $tanamanid-> light_intensity;

        TanamanJenis::create($request->all());
        return redirect()->route('manageGreenhouse')
        ->with('success', 'Post updated successfully.');
    }

}
