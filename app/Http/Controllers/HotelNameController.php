<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\HotelCategory;
use App\Models\HotelName;
use Illuminate\Http\Request;

class HotelNameController extends Controller
{
    public function index()
    {
        $hotelNames = HotelName::with(['city', 'hotelCategory'])->get();
        return view('admin.hotel_names.index', compact('hotelNames'));
    }

    public function create()
    {
        $cities = City::all();
        $hotelCategories = HotelCategory::all();
        return view('admin.hotel_names.create', compact('cities', 'hotelCategories'));
    }

           public function store(Request $request)
                {
                    // Validate the request, including the image
                    $request->validate([
                        'name' => 'required|string|max:255',
                        'city_id' => 'required|integer',
                        'hotel_cat_id' => 'required|integer',
                        'hotel_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image format and size
                    ]);
                
                    // Handle the image upload
                    if ($request->hasFile('hotel_image')) {
                        // Generate a unique file name with timestamp
                        $imageName = time() . '.' . $request->hotel_image->extension();
                
                        // Move the image to the public/images/hotels directory
                        $request->hotel_image->move(public_path('images/hotels'), $imageName);
                
                        // Save the image path
                        $imagePath = 'images/hotels/' . $imageName;
                    }
                
                    // Create a new HotelName entry
                    $data = new HotelName;
                    $data->name = $request->name;
                    $data->city_id = $request->city_id;
                    $data->hotel_cat_id = $request->hotel_cat_id;
                    $data->hotel_image = $imagePath; // Save the image path in the database
                
                    // Save the data
                    $data->save();
                
                    // Redirect with success message
                    return redirect()->route('hotel_names.index')->with('success', 'Hotel Name added successfully.');
                }


    public function edit(HotelName $hotelName)
    {
        $cities = City::all();
        $hotelCategories = HotelCategory::all();
        return view('admin.hotel_names.edit', compact('hotelName', 'cities', 'hotelCategories'));
    }
        public function update(Request $request, HotelName $hotelName)
        {
            $request->validate([
                'name' => 'required',
                'city_id' => 'required',
                'hotel_cat_id' => 'required',
                'hotel_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048' // Image is optional on update
            ]);
        
            // Check if a new image is uploaded
            if ($request->hasFile('hotel_image')) {
                // Generate a unique file name with timestamp
                $imageName = time() . '.' . $request->hotel_image->extension();
        
                // Move the image to the public/images/hotels directory
                $request->hotel_image->move(public_path('images/hotels'), $imageName);
        
                // Save the new image path
                $imagePath = 'images/hotels/' . $imageName;
        
               
        
                // Update the hotel_image field in the database
                $hotelName->hotel_image = $imagePath;
            }
        
            // Update other fields
            $hotelName->update([
                'name' => $request->name,
                'city_id' => $request->city_id,
                'hotel_cat_id' => $request->hotel_cat_id
            ]);
        
            // Save the changes
            $hotelName->save();
        
            return redirect()->route('hotel_names.index')->with('success', 'Hotel details updated successfully.');
        }


    public function destroy(HotelName $hotelName)
    {
        $hotelName->delete();
        return redirect()->route('hotel_names.index');
    }
}
