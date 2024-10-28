<?php

namespace App\Http\Controllers;

use App\Models\HotelCategory;
use Illuminate\Http\Request;

class HotelCategoryController extends Controller
{
    public function index()
    {
        $hotelCategories = HotelCategory::all();
        return view('admin.hotel_categories.index', compact('hotelCategories'));
    }

    public function create()
    {
        return view('admin.hotel_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['category' => 'required']);
        HotelCategory::create($request->all());
        return redirect()->route('hotel_categories.index');
    }

    public function edit(HotelCategory $hotelCategory)
    {
        return view('admin.hotel_categories.edit', compact('hotelCategory'));
    }

    public function update(Request $request, HotelCategory $hotelCategory)
    {
        $request->validate(['category' => 'required']);
        $hotelCategory->update($request->all());
        return redirect()->route('hotel_categories.index');
    }

    public function destroy(HotelCategory $hotelCategory)
    {
        $hotelCategory->delete();
        return redirect()->route('hotel_categories.index');
    }
}
