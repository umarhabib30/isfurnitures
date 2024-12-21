<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $categories = Category::all();
        $data=[
            'active' => 'product',
            'title' => 'Add Product',
            'categories' => $categories
        ];
        return view('admin.product.create', $data);
    }

    public function getSubcategories($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)->get();

        return response()->json($subcategories);
    }

    public function storeProduct(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'original_price' => 'required|numeric|min:0',

        ]);

        try {
            $product = Product::create([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $validatedData['name'],
                'original_price' => $validatedData['original_price'],
                'sale_price' => $request->sale_price,
                'delivery_charge' => $request->delivery_charge,
                'delivery_time' => $request->delivery_time,
                'discount_price' => $request->discount_price,
                'discount_time' => $request->discount_time,
                'description' => $request->description,
            ]);

            foreach($request->images as $image){
                $path = ImageHelper::saveImage('productimages',$image);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path
                ]);
            }

            alert()->success('Success', 'Product added successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            alert()->error('Error', $e->getMessage(),);
            return redirect()->back();
        }
    }

    public function showProducts()
    {
        $products = Product::with('category')->with('subcategory')->get();
        return view('admin.product.index',)->with('products', $products);
    }
}
