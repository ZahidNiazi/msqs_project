<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        // Fetch latest About Us (you can also use first() if only one record exists)
        $about = AboutUs::latest()->first();

        return view('frontend.aboutus', compact('about'));
    }
}
