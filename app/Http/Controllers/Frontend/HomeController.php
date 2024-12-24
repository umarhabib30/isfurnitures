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
        return view('frontend.content.content', ['active' => 'home', 'title' => 'Home', 'latestProducts' => $latestProducts]);
    }
}
