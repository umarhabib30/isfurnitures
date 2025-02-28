<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about()
    {
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        return view('frontend.about.about', ['active' => 'about', 'title' => 'About Us', 'heading' => $heading, 'description' => $description]);
    }
}
