<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.manage', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.add');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        City::create($request->all());
        return redirect()->route('cities.index');
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate(['name' => 'required']);
        $city->update($request->all());
        return redirect()->route('cities.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}

