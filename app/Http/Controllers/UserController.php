<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\City;
use App\Models\Contact;
use App\Models\HotelName;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\HotelCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\ClientReview;
use App\Models\About;
use App\Models\Gallery;







use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    
{
    
    $reviews = ClientReview::all();
    $aboutInfo = About::all();
    // dd($reviews);
    // Fetch all room categories along with the associated rooms
    $roomcategory = RoomCategory::with('rooms')->get();

    // Fetch unique IDs for room categories, hotels, and cities
    $roomCategoryIds = Room::distinct('room_category_id')->pluck('room_category_id');
    $hotelIds = Room::distinct('hotel_id')->pluck('hotel_id');
    $cityIds = Room::distinct('city_id')->pluck('city_id');

    // Fetch names for these IDs
    $roomCategoryOptions = RoomCategory::whereIn('id', $roomCategoryIds)->pluck('Category', 'id');
    $hotelOptions = HotelName::whereIn('id', $hotelIds)->pluck('name', 'id');

    // Fetch only ID and name from the City table
    $cityOptions = City::pluck('name', 'id');

    return view('user.index', [
        'roomcategory' => $roomcategory,
        'roomCategoryOptions' => $roomCategoryOptions,
        'hotelOptions' => $hotelOptions,
        'cityOptions' => $cityOptions,
        'clientreview' => $reviews,
         'aboutInfo' => $aboutInfo
    ]);
}




    public function Booking(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date',
            'city_id' => 'required',
            'hotel_id' => 'required',
        ]);

        // Fetch the form data
        $arrivalDate = $request->input('arrival_date');
        $departureDate = $request->input('departure_date');
        $cityId = $request->input('city_id');
        $hotelId = $request->input('hotel_id');

        // Fetch the hotel name based on hotel_id
        $hotelName = HotelName::where('id', $hotelId)->pluck('name')->first();

        // Fetch the city name based on city_id
        $cityName = City::where('id', $cityId)->pluck('name')->first();

        // Fetch the rooms based on hotel_id and city_id
        $rooms = Room::where('hotel_id', $hotelId)
            ->where('city_id', $cityId)
            ->get();

        // Initialize an array to store room data with category and images
        $roomData = [];

        // Loop through each room to fetch the category and image
        foreach ($rooms as $room) {
            // Fetch room category based on room_category_id
            $roomCategory = RoomCategory::select('id', 'category', 'image', 'created_at', 'updated_at')
                ->where('id', $room->room_category_id)
                ->first();

            // Prepare data for each room including the category and image
            $roomData[] = [
                'room_id' => $room->id,
                'room_category_id' => $roomCategory->id,
                'room_category_name' => $roomCategory->category,
                'room_category_image' => $roomCategory->image,
                'created_at' => $roomCategory->created_at,
                'updated_at' => $roomCategory->updated_at,
            ];
        }

        // Pass the data to the view
        return view('user.Booking', compact('arrivalDate', 'departureDate', 'cityId', 'cityName', 'hotelId', 'hotelName', 'roomData'));
    }


    // Add this method to your controller

    public function confirmBooking($room_category_id)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user's role is 'user'
            if (Auth::user()->role === 'user') {
                // Save the authenticated user's ID in the session
                session()->put('authid', Auth::id());

                // Debug session data
                dd(session()->all()); // Check if 'authid' is stored correctly

                // Redirect to the booking confirmation page with the room_category_id
                return redirect()->route('confirm', ['room_category_id' => $room_category_id]);
            } else {
                // If role is not 'user', redirect to login with an error message
                return redirect()->route('login')->with('message', 'Access denied. Only users can confirm bookings.');
            }
        } else {
            // If user is not authenticated, redirect to the login page with a message
            return redirect()->route('login')->with('message', 'Please login first before confirming the booking.');
        }
    }




public function storeSession(Request $request)
{
    // Validate incoming data
    $validatedData = $request->validate([
        'arrivalDate' => 'required|date',
        'departureDate' => 'required|date',
        'cityName' => 'required|string|max:255',
        'hotelName' => 'required|string|max:255',
        'room_category_id' => 'required|integer',
        'room_category_name' => 'required|string|max:255',
    ]);

    // Store the validated data in session
    session($validatedData);

    return response()->json(['success' => true]);
}


    public function submitBooking(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'special_requests' => 'nullable|string',

        ]);

        // Get session data
        $arrivalDate = session('arrivalDate');
        $departureDate = session('departureDate');
        $cityName = session('cityName');
        $hotelName = session('hotelName');
        // $roomCategoryId = session('room_category_id');
        $roomCategoryName = session('room_category_name');
        session()->put('authid', Auth::id());


        // dd(session()->all());

        // Debug output to check the value of 'authid'
        // dd(session()->all());

        // Insert the data into the bookings table
        DB::table('bookings')->insert([
            'authid' => Auth::id(), // assuming the user is authenticated
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            'special_requests' => $request->input('special_requests'),
            'arrival_date' => $arrivalDate,
            'departure_date' => $departureDate,
            'city' => $cityName,
            'hotel' => $hotelName,
            // Save room category ID
            'room_category' => $roomCategoryName, // Save room category name
            'price' => 100, // Assuming static price or you can calculate dynamically
            'payment_status' => 'No', // default to 'No'
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to a confirmation page or wherever needed
        return redirect()->route('user.index')->with('message', 'Booking submitted successfully!');
    }


    public function confirm(Request $request)
    {
        $roomCategoryId = $request->query('room_category_id');

        return view('user.confirm-booking', compact('roomCategoryId'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            // 'authid' is not required as it's retrieved from the session
        ]);
    
        // Retrieve authid from the session
        $authid = session('authid'); // Ensure you have stored authid in the session earlier
    
        // Create a new contact record
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'authid' => $authid, // Use authid from the session
        ]);
    
        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    





    //========================================================================New Function========================
        public function fetch_hotels(Request $request)
        {
            $cityId = $request->input('city_id');
        
            // Fetch hotels based on the provided city ID
            $hotels = HotelName::where('city_id', $cityId)->get();
        
            // Fetch city based on city_id
            $city = City::find($cityId); // Assuming there's a City model
        
            // Fetch categories for each hotel
            $categories = [];
            foreach ($hotels as $hotel) {
                $category = HotelCategory::find($hotel->hotel_cat_id); // Assuming there's a HotelCategory model
                $categories[$hotel->id] = $category ? $category->category : 'Unknown Category';
            }
        
            // Fetch rooms for all hotels
            $rooms = [];
            $roomCategories = []; // To hold room categories for each room
            foreach ($hotels as $hotel) {
                $rooms[$hotel->id] = Room::where('hotel_id', $hotel->id)->get();
        
                foreach ($rooms[$hotel->id] as $room) {
                    // Fetch room category for each room
                    $roomCategory = RoomCategory::find($room->room_category_id); // Assuming there's a RoomCategory model
                    $roomCategories[$room->id] = $roomCategory ? $roomCategory->category : 'Unknown Category';
                }
            }
        
            // Return view with data
            return view('user.hotel', compact('hotels', 'rooms', 'city', 'categories', 'roomCategories'));
        }

public function roomdetails(Request $request, $id)
{
    // Fetch rooms for the specified hotel
    $rooms = Room::where('hotel_id', $id)->get();

    // Fetch hotel details
    $hotel = HotelName::find($id);
    $hotelName = $hotel ? $hotel->name : '';
    $hotelid = $hotel ? $hotel->id : '';

    $roomDetails = [];

    foreach ($rooms as $room) {
        // Get room category details
        $roomCategory = RoomCategory::find($room->room_category_id);
        $categoryid = $roomCategory ? $roomCategory->id : 'Unknown Category';
        $categoryName = $roomCategory ? $roomCategory->category : 'Unknown Category';
        $categoryimage = $roomCategory ? $roomCategory->image : 'loading';

        // Get city details
        $city = City::find($room->city_id);
        $cityName = $city ? $city->name : 'Unknown City';

        // Prepare room data
        
        $roomDetails[] = [
            'hotel_id' => $hotelid,
            'hotel_name' => $hotelName, // Add hotel name
            'price' => $room->price,
            'description' => $room->description,
            'category' => $categoryName,
            'category_id' => $categoryid,
            'image'=> $categoryimage,
            'city' => $cityName,
        ];
    }

    // Uncomment this for debugging
    // dd($roomDetails);

    // Return view with room details
    return view('user.room_categories', compact('roomDetails'));
}
public function confirm_booking($id, Request $request)
{
    $hotel_id = Crypt::decrypt($id);
    $hotel_name = Crypt::decrypt($request->get('hotel_name'));
    $price = Crypt::decrypt($request->get('price'));
    $description = Crypt::decrypt($request->get('description'));
    $category = Crypt::decrypt($request->get('category'));
    $category_id = Crypt::decrypt($request->get('category_id'));
    $city = Crypt::decrypt($request->get('city'));

    return view('user.finalbooking', compact(
        'hotel_id', 
        'hotel_name', 
        'price', 
        'description', 
        'category', 
        'category_id', 
        'city'
    ));
}
public function confirm_booking_store(Request $request)
{
    // Validate the incoming data
    $request->validate([
        'hotel_id' => 'required|integer',
        'category_id' => 'required|integer',
        'roomPrice' => 'required|numeric',
        'city' => 'required|string|max:255',
        'arrival_date' => 'required|date',
        'departure_date' => 'required|date',
        'fullName' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:15',
        'specialRequest' => 'nullable|string|max:500',
    ]);

    // Create a new booking record
    Booking::create([
        'full_name' => $request->fullName,
        'email' => $request->email,
        'phone_number' => $request->phone,
        'special_requests' => $request->specialRequest,
        'arrival_date' => $request->arrival_date,
        'departure_date' => $request->departure_date,
        'city' => $request->city,
        'hotel' => $request->hotel_id, // Assuming hotel_id is stored as hotel
        'room_category' => $request->category_id, // Assuming category_id is stored as room_category
        'price' => $request->roomPrice,
    ]);

    return redirect()->route('user.index')->with('message', 'Booking confirmed successfully!');
}


        public function appgallery()
        {
            // Fetch all gallery images from the database
            $galleries = Gallery::all();
        
            dd($galleries);
            // Pass the data to the view
            return view('user.layouts.app', compact('galleries'));
        }










}
