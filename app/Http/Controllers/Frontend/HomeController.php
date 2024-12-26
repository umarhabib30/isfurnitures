<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $latestProducts = Product::with('category')->with('subcategory')->take(3)->get();
        $allProducts = Product::with('category')->with('subcategory')->take(12)->get();
        $latestSubcategories = SubCategory::latest()->take(4)->get();
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        return view('frontend.content.content', ['active' => 'home', 'title' => 'Home', 'latestProducts' => $latestProducts, 'heading' => $heading, 'description' => $description, 'latestSubcategories' => $latestSubcategories ,'allProducts'=>$allProducts]);
    }

    public function showSubcategoryProducts($id)
    {

        $products = Product::where('subcategory_id', $id)->get();
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        return view('frontend.content.product', ['active' => 'home', 'title' => 'Products', 'products' => $products, 'heading' => $heading, 'description' => $description]);
    }
}
