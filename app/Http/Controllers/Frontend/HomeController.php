<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Seat;
use App\Models\Stuff;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        // Fetch latest products with combined sold_qty calculation
        $latestProducts = Product::with('category', 'subcategory')
            ->select(
                'products.id', 
                'products.name', 
                'products.category_id', 
                'products.subcategory_id', 
                'products.sold_qty', 
                'products.price', 
                'products.description', 
                'products.image', // Add any other columns needed
                DB::raw('(IFNULL(products.sold_qty, 0) + IFNULL(SUM(order_items.qty), 0)) as total_sold_qty')
            )
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy(
                'products.id', 
                'products.name', 
                'products.category_id', 
                'products.subcategory_id', 
                'products.sold_qty', 
                'products.price', 
                'products.description', 
                'products.image' // Add these columns to the GROUP BY
            )
            ->take(3)
            ->get();
    
        // Fetch all products with combined sold_qty calculation
        $allProducts = Product::with('category', 'subcategory')
            ->select(
                'products.id', 
                'products.name', 
                'products.category_id', 
                'products.subcategory_id', 
                'products.sold_qty', 
                'products.price', 
                'products.description', 
                'products.image', // Add any other columns needed
                DB::raw('(IFNULL(products.sold_qty, 0) + IFNULL(SUM(order_items.qty), 0)) as total_sold_qty')
            )
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy(
                'products.id', 
                'products.name', 
                'products.category_id', 
                'products.subcategory_id', 
                'products.sold_qty', 
                'products.price', 
                'products.description', 
                'products.image' // Add these columns to the GROUP BY
            )
            ->take(8)
            ->get();
    
        // Calculate the total combined sold quantity across all products
        $totalSoldQty = $allProducts->sum('total_sold_qty');
    
        // Fetch latest subcategories
        $latestSubcategories = SubCategory::latest()->take(4)->get();
    
        // Define page content
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
    
        // Return the view with data
        return view('frontend.content.content', [
            'active' => 'home',
            'title' => 'Home',
            'latestProducts' => $latestProducts,
            'heading' => $heading,
            'description' => $description,
            'latestSubcategories' => $latestSubcategories,
            'allProducts' => $allProducts,
            'totalSoldQty' => $totalSoldQty,
        ]);
    }
    



    public function showSubcategoryProducts($id)
    {
        // Use paginate directly on the query builder
        $products = Product::where('subcategory_id', $id)->paginate(8);  // No need for ->get() here

        $colors = Color::all();
        $subcategories = SubCategory::all();
        $stuffs = Stuff::all();
        $seatNumbers = Seat::all();
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';

        return view('frontend.shop.shop', [
            'active' => 'home',
            'title' => 'Products',
            'products' => $products,
            'heading' => $heading,
            'description' => $description,
            'stuffs' => $stuffs,
            'seatNumbers' => $seatNumbers,
            'colors' => $colors,
            'subcategories' => $subcategories,
        ]);
    }
}
