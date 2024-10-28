<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientReview;
use App\Models\About;

class AboutusController extends Controller
{
    public function aboutus()
    {
        // Fetch all client reviews
        $reviews = ClientReview::all();

        // Fetch all about information
        $aboutInfo = About::all(); // You can change this to find a specific record if needed

        return view('user.aboutus', [
            'clientreview' => $reviews,
            'aboutInfo' => $aboutInfo, // Pass about information to the view
        ]);
    }
}
