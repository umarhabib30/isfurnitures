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

        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
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
            'heading' => $heading,
            'description' => $description
        ]);
    }

    public function filterProducts(Request $request)
    {
        $query = Product::query();

        if ($request->has('color') && $request->color) {
            $query->where('color_id', $request->color);
        }

        if ($request->has('subcategory') && $request->subcategory) {
            $query->where('subcategory_id', $request->subcategory);
        }

        if ($request->filled('max_price') && $request->max_price > 0) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->paginate(8);

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found.']);
        }

        $html = view('frontend.shop.filter', compact('products'))->render();

        return response()->json([
            'products' => $html,
        ]);
    }

    public function productDetail($id)
    {
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        $product = Product::with(['category', 'subcategory', 'images', 'color'])->where('id', $id)->first();
        return view('frontend.shop.productdetail', [
            'active' => 'shop',
            'title' => 'Product Detail',
            'product' => $product,
            'heading' => $heading,
            'description' => $description
        ]);
    }
}
