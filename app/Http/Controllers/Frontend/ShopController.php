<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $query = Product::with('category', 'subcategory');

        if ($request->has('color')) {
            $query->where('color_id', $request->color);
        }

        if ($request->has('subcategory')) {
            $query->where('subcategory_id', $request->subcategory);
        }

        $products = $query->paginate(8);

        $colors = Color::all();
        $subcategories = SubCategory::all();

        return view('frontend.shop.shop', [
            'active' => 'shop',
            'title' => 'Shop',
            'products' => $products,
            'colors' => $colors,
            'subcategories' => $subcategories,
        ]);
    }

    public function filterProducts(Request $request)
    {
        $query = Product::query();

        // Filter by color
        if ($request->has('color') && $request->color) {
            $query->where('color_id', $request->color);
        }

        // Filter by subcategory
        if ($request->has('subcategory') && $request->subcategory) {
            $query->where('subcategory_id', $request->subcategory);
        }

        // Paginate results
        $products = $query->paginate(8);

        // If no products found
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found.']);
        }

        // Generate the HTML for products and pagination
        $html = view('frontend.shop.filter', compact('products'))->render();
        
        return response()->json([
            'products' => $html,
           
        ]);
    }
}
