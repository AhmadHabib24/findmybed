<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\ClientReview;
use App\Models\About;



use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin Dashboard View
    function dashboard()
    {
        return view('admin.dashboard');
    }


public function client_booking()
{
    // Fetch booking data with hotel names and room categories using raw queries
    $bookingdata = DB::table('bookings')
        ->select('bookings.*', 'hotel_names.name as hotel_names', 'room_categories.category as room_category')
        ->leftJoin('hotel_names', 'bookings.hotel', '=', 'hotel_names.id') // Corrected table name to 'hotels'
        ->leftJoin('room_categories', 'bookings.room_category', '=', 'room_categories.id')
        ->get();

    // Dump the data for debugging
    // dd($bookingdata);

    // Return the view with the fetched data
    return view('admin.booking.index', compact('bookingdata'));
}

    public function index()
    {
        // Fetch all contact records
        $contacts = Contact::all();

        // Pass the contacts to the view
        return view('admin.contactform.contact-deatils', compact('contacts'));
    }
    public function destroy($id)
    {
        // Find the contact record by ID and delete it
        $contact = Contact::findOrFail($id);
        $contact->delete();

        // Redirect back with a success message
        return redirect()->route('contact-details')->with('success', 'Contact deleted successfully!');
    }
    
    public function galleryview()
        {
            // Fetch all gallery data from the database
            $galleries = Gallery::all();  // You can also use pagination like: Gallery::paginate(10);
    
            // Pass the data to the view
            return view('admin.gallery.index', ['galleries' => $galleries]);
        }
        public function storeGallery(Request $request)
            {
                // Validate the request
                $request->validate([
                    'name' => 'required|string|max:255',
                    'alt_text' => 'required|string|max:255',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
            
                // Handle the image upload
                if ($request->hasFile('image')) {
                    // Generate a unique name for the image based on the current timestamp
                    $imageName = time() . '.' . $request->image->extension();
                    
                    // Move the image to the 'public/images' folder
                    $request->image->move(public_path('gallery'), $imageName);
            
                    // Save the image path in the database as 'images/imageName'
                    $imagePath = 'gallery/' . $imageName;
                }
            
                // Store the gallery image details in the database
                Gallery::create([
                    'name' => $request->name,
                    'alt_text' => $request->alt_text,
                    'image_path' => $imagePath, // Use the image path stored above
                ]);
            
                return redirect()->route('gallery.index')->with('success', 'Image added successfully!');
            }
            
            public function editGallery($id)
            {
                $gallery = Gallery::findOrFail($id);
                return view('admin.gallery.edit', compact('gallery')); // Return gallery data as JSON
            }
            public function updateGallery(Request $request, $id)
            {
                // Validate the incoming request
                $request->validate([
                    'name' => 'required|string|max:255',
                    'alt_text' => 'required|string|max:255',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
                ]);
            
                // Find the gallery image by ID
                $gallery = Gallery::findOrFail($id);
            
                // Update the gallery image details
                $gallery->name = $request->name;
                $gallery->alt_text = $request->alt_text;
            
                // Check if a new image is uploaded
                if ($request->hasFile('image')) {
                    // Delete the old image if necessary
                    if (File::exists(public_path($gallery->image_path))) {
                        File::delete(public_path($gallery->image_path));
                    }
            
                    // Upload the new image
                    $imageName = time() . '.' . $request->image->extension();
                    $request->image->move(public_path('gallery'), $imageName);
                    $gallery->image_path = 'gallery/' . $imageName; // Update the path
                }
            
                // Save the changes
                $gallery->save();
                // dd('saved');
            
                // Redirect back with a success message
                return redirect()->route('gallery.index')->with('success', 'Gallery image updated successfully!');
            }
                public function destroyGallery($id)
                    {
                        $gallery = Gallery::findOrFail($id);
                    
                        // Delete the image file from storage
                        if (File::exists(public_path($gallery->image_path))) {
                            File::delete(public_path($gallery->image_path));
                        }
                    
                        // Delete the gallery entry
                        $gallery->delete();
                    
                        return redirect()->route('gallery.index')->with('success', 'Gallery image deleted successfully!');
                    }


                 public function clientreviewview()
                    {
                        // Fetch all client reviews
                        $clientReviews = ClientReview::all(); 
                
                        // Pass the data to the view
                        return view('admin.client_review.index', compact('clientReviews'));
                    }
                    
                    public function storereview(Request $request)
                        {
                            // Validate the incoming request
                            $validatedData = $request->validate([
                                'client_name' => 'required|string|max:255',
                                'client_review' => 'required|string',
                                'rating' => 'required|integer|min:1|max:5',
                                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
                            ]);
                    
                            // Handle the image upload
                            if ($request->hasFile('image')) {
                                // Generate a unique name for the image based on the current timestamp
                                $imageName = time() . '.' . $request->image->extension();
                                
                                // Move the image to the 'public/gallery' folder
                                $request->image->move(public_path('clientreview'), $imageName);
                        
                                // Save the image path in the database as 'gallery/imageName'
                                $imagePath = 'clientreview/' . $imageName;
                            }
                    
                            // Create a new review
                            ClientReview::create([
                                'client_name' => $validatedData['client_name'],
                                'client_review' => $validatedData['client_review'],
                                'rating' => $validatedData['rating'],
                                'image_path' => $imagePath, // Save the image path
                            ]);
                    
                            // Redirect back with a success message
                            return redirect()->route('client-review.index')->with('message', 'Review added successfully!');
                        }
                        
                         public function editreview($id)
                            {
                                $review = ClientReview::findOrFail($id);
                                return view('admin.client_review.edit', compact('review')); // Return gallery data as JSON
                            }
                            
                            public function updatereview(Request $request, $id)
                                {
                                    // Find the existing review by ID
                                    $review = ClientReview::findOrFail($id);
                            
                                    // Validate the incoming request
                                    $validatedData = $request->validate([
                                        'client_name' => 'required|string|max:255',
                                        'client_review' => 'required|string',
                                        'rating' => 'required|integer|min:1|max:5',
                                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image if present
                                    ]);
                            
                                    // Update review details
                                    $review->client_name = $validatedData['client_name'];
                                    $review->client_review = $validatedData['client_review'];
                                    $review->rating = $validatedData['rating'];
                            
                                    // Handle the image upload if a new image is provided
                                    if ($request->hasFile('image')) {
                                        // Generate a unique name for the image based on the current timestamp
                                        $imageName = time() . '.' . $request->image->extension();
                                        
                                        // Move the image to the 'public/gallery' folder
                                        $request->image->move(public_path('clientreview'), $imageName);
                                
                                        // Save the image path in the database as 'gallery/imageName'
                                        $imagePath = 'clientreview/' . $imageName;
                                        
                                        // Update the image path in the review
                                        $review->image_path = $imagePath;
                                    }
                            
                                    // Save the updated review
                                    $review->save();
                            
                                    // Redirect back with a success message
                                    return redirect()->route('client-review.index')->with('message', 'Review updated successfully!');
                                }
                                
                                
                                public function destroyreview($id)
                                    {
                                        $clientreview = ClientReview::findOrFail($id);
                                    
                                        // Delete the image file from storage
                                        if (File::exists(public_path($clientreview->image_path))) {
                                            File::delete(public_path($clientreview->image_path));
                                        }
                                    
                                        // Delete the gallery entry
                                        $clientreview->delete();
                                    
                                        return redirect()->route('client-review.index')->with('success', 'Review  deleted successfully!');
                                    }
                                    
                                    
                                    public function aboutindex()
                                    {
                                         $aboutInfo = About::all();
                                         return view('admin.about.index', [
                                            'aboutInfo' => $aboutInfo, // Pass about information to the view
                                        ]);
                                       
                                    }
public function aboutstore(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'alt_text' => 'required|string|max:500',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max size as needed
    ]);

    if ($request->hasFile('image')) {
                                // Generate a unique name for the image based on the current timestamp
                                $imageName = time() . '.' . $request->image->extension();
                                
                                // Move the image to the 'public/gallery' folder
                                $request->image->move(public_path('about'), $imageName);
                        
                                // Save the image path in the database as 'gallery/imageName'
                                $imagePath = 'about/' . $imageName;
                            }

    // Create a new About instance
    About::create([
        'heading' => $request->name,
        'description' => $request->alt_text,
        'image' => $imagePath, // Save the path of the uploaded image
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'About information added successfully!');
}
 public function aboutdestory($id)
                                    {
                                        $aboutInfo = About::findOrFail($id);
                                    
                                        // Delete the image file from storage
                                        if (File::exists(public_path($aboutInfo->image_path))) {
                                            File::delete(public_path($aboutInfo->image_path));
                                        }
                                    
                                        // Delete the gallery entry
                                        $aboutInfo->delete();
                                    
                                        return redirect()->route('about.index')->with('success', 'Review  deleted successfully!');
                                    }

                            
                            
}
