<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $latestProducts = Product::with('category')->with('subcategory')->take(3)->get();
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        return view('frontend.content.content', ['active' => 'home', 'title' => 'Home', 'latestProducts' => $latestProducts, 'heading' => $heading, 'description' => $description]);
    }
}
