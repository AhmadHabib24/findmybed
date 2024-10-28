<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;
use App\Models\HotelName;

class RoomCategoryController extends Controller
{
    public function index()
    {
        // Retrieve all room categories along with the hotel name
        $roomCategories = RoomCategory::with('hotelName')->get(); // Assuming you have a relationship defined
        // dd($roomCategories);
    
        return view('admin.room_categories.index', compact('roomCategories'));
    }

    public function create()
    {
        $hotels = HotelName::all();
        // dd($hotel);
        
        return view('admin.room_categories.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        // Validate input, including the image
        $request->validate([
            'category' => 'required|string|max:255',
            'hotel_name' => 'required|exists:hotel_names,id', // Ensure the hotel exists
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation rules
        ]);
    
        // Handle image upload
        $imageName = null; // Initialize the image name
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName); // Save the image in the public/images folder
        }
    
        // Create a new RoomCategory record
        // dd($request);
        RoomCategory::create([
            'category' => $request->category,
            'hotel_name' => $request->hotel_name, // Store the hotel name in the database
            'image' => $imageName, // Store the image name in the database
        ]);
    
        return redirect()->route('room_categories.index')->with('success', 'Room Category created successfully.');
    }

    public function edit(RoomCategory $roomCategory)
    {
        return view('admin.room_categories.edit', compact('roomCategory'));
    }

    public function update(Request $request, RoomCategory $roomCategory)
    {
        // Validate the input
        $request->validate([
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image validation
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($roomCategory->image && file_exists(public_path('images/' . $roomCategory->image))) {
                unlink(public_path('images/' . $roomCategory->image));
            }

            // Save the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Update the room category with the new image
            $roomCategory->update([
                'category' => $request->category,
                'image' => $imageName,
            ]);
        } else {
            // Update the room category without changing the image
            $roomCategory->update($request->except('_token', 'image'));
        }

        return redirect()->route('room_categories.index')->with('success', 'Room Category updated successfully.');
    }


    public function destroy(RoomCategory $roomCategory)
    {
        $roomCategory->delete();

        return redirect()->route('room_categories.index')->with('success', 'Room Category deleted successfully.');
    }
}
