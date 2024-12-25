<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        return view('frontend.blog.blog', ['active' => 'blogs', 'title' => 'Blogs', 'heading' => $heading, 'description' => $description]);
    
       }
}
