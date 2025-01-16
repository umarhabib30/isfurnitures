<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Review;
use App\Models\Seat;
use App\Models\Stuff;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        $query = Product::with(
            'category',
            'subcategory',
            'stuff',
            'seat'
        );

        // Apply filters if they exist
        if ($request->has('color')) {
            $query->where('color_id', $request->color);
        }

        if ($request->has('subcategory')) {
            $query->where('subcategory_id', $request->subcategory);
        }
        if ($request->has('stuff')) {
            $query->where('stuff_id', $request->stuff);
        }
        if ($request->has('seatNumber')) {
            $query->where('seatNumber_id', $request->seatNumber);
        }

        // Order by latest products
        $query->orderBy('created_at', 'desc');

        // Paginate the results
        $products = $query->paginate(20);

        // Fetch filter data
        $colors = Color::all();
        $subcategories = SubCategory::all();
        $stuffs = Stuff::all();
        $seatNumbers = Seat::all();

        return view('frontend.shop.shop', [
            'active' => 'shop',
            'title' => 'Shop',
            'products' => $products,
            'colors' => $colors,
            'subcategories' => $subcategories,
            'heading' => $heading,
            'description' => $description,
            'stuffs' => $stuffs,
            'seatNumbers' => $seatNumbers
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
        if ($request->has('stuff') && $request->stuff) {
            $query->where('stuff_id', $request->stuff);
        }


        if ($request->has('seatNumber') && $request->seatNumber) {
            $query->where('seatnumber_id', $request->seatNumber);
        }
        if ($request->filled('max_price') && $request->max_price > 0) {
            $query->where('price', '<=', (int) $request->max_price);
        }

        $products = $query->paginate(8);
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found.']);
        }
        $html = view('frontend.shop.filter', compact('products'))->render();
        $pagination = view('pagination::bootstrap-5', ['paginator' => $products])->render();

        return response()->json([
            'products' => $html,
            'pagination' => $pagination,
        ]);
    }


    public function productDetail($id)
    {
        $heading = 'Shop the Best';
        $description = 'Explore top products, great prices, fast delivery.';
        $product = Product::with(['category', 'subcategory', 'images', 'color', 'stuff', 'seat'])->where('id', $id)->first();
        $reviews = Review::where('product_id', $id)->get();
        $relatedProducts = Product::with(['category', 'subcategory', 'images', 'color', 'stuff', 'seat'])->where('category_id', $product->category_id)->get();
        $averageRating = $product ? $product->average_rating : 0;
        return view('frontend.shop.productdetail', [
            'active' => 'shop',
            'title' => 'Product Detail',
            'product' => $product,
            'heading' => $heading,
            'description' => $description,
            'reviews' => $reviews,
            'averageRating' => $averageRating,
            'relatedProducts'=>$relatedProducts
        ]);
    }
}
