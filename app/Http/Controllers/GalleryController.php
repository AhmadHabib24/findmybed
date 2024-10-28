<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    //
    public function gallery()
    {
        // Fetch all gallery images from the database
        $galleries = Gallery::all();
    
        // Pass the data to the view
        return view('user.gallery', compact('galleries'));
    }
    

}
