<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\HotelName;
use App\Models\City;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with(['roomCategory', 'hotel', 'city'])->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $roomCategories = RoomCategory::all();
        $hotels = HotelName::all();
        $cities = City::all();
        return view('admin.rooms.create', compact('roomCategories', 'hotels', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_category_id' => 'required|exists:room_categories,id',
            'hotel_id' => 'required|exists:hotel_names,id',
            'city_id' => 'required|exists:cities,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room added successfully.');
    }

    public function edit(Room $room)
    {
        $roomCategories = RoomCategory::all();
        $hotels = HotelName::all();
        $cities = City::all();
        return view('admin.rooms.edit', compact('room', 'roomCategories', 'hotels', 'cities'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_category_id' => 'required|exists:room_categories,id',
            'hotel_id' => 'required|exists:hotel_names,id',
            'city_id' => 'required|exists:cities,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}

