<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Seat;
use App\Models\Stuff;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $categories = Category::all();
        $colors = Color::all();
        $stuffs = Stuff::all();
        $seatNumbers = Seat::all();
        $data = [
            'active' => 'product',
            'title' => 'Add Product',
            'categories' => $categories,
            'colors' => $colors,
            'stuffs' => $stuffs,
            'seatNumbers' => $seatNumbers
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
            if ($request->hasFile('image')) {
                $thumbnail = ImageHelper::saveImage($request->image, 'productthumnails');
            } else {
                $thumbnail = '';
            }

            $product = Product::create([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $validatedData['name'],
                'original_price' => $validatedData['original_price'],
                'price' => $request->sale_price,
                'delivery_charge' => $request->delivery_charge,
                'delivery_time' => $request->delivery_time,
                'discount_price' => $request->discount_price,
                'discount_time' => $request->discount_time,
                'description' => $request->description,
                'color_id' => $request->color_id,
                'image' => $thumbnail,
                'seatnumber_id' => $request->seatnumber_id,
                'stuff_id' => $request->stuff_id,
                'size' => $request->size,
            ]);

            foreach ($request->images as $image) {
                $path = ImageHelper::saveImage($image, 'productimages');
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
        $products = Product::with('category')->with('subcategory')->with('color')->get();
        $data = [
            'active' => 'product',
            'title' => 'Add Product',
            'products' => $products
        ];
        return view('admin.product.index', $data);
    }

    public function delete($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            alert()->success('Success', 'Product deleted successfully.');
            return redirect()->back();
        } catch (Exception $e) {
            alert()->error('Error', $e->getMessage(),);
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $product = Product::find($id);
            $categories = Category::all();
            $colors = Color::all();
            $stuffs = Stuff::all();
            $seatNumbers = Seat::all();
            $subcategories = SubCategory::where('category_id', $product->category_id)->get();
            $data = [
                'active' => 'product',
                'title' => 'Edit Product',
                'categories' => $categories,
                'product' => $product,
                'subcategories' => $subcategories,
                'colors' => $colors,
                'stuffs' => $stuffs,
                'seatNumbers' => $seatNumbers
            ];
            return view('admin.product.edit', $data);
        } catch (Exception $e) {
            alert()->error('Error', $e->getMessage(),);
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {

        try {
            $product = Product::find($request->id);
            if ($request->hasFile('images')) {
                $images = $product->images;
                foreach ($images as $image) {
                    $delete_image = ProductImage::find($image->id);
                    $delete_image->delete();
                }
                foreach ($request->images as $image) {
                    $path = ImageHelper::saveImage($image, 'productimages');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path,
                    ]);
                }
                $data = $request->all();
                if ($request->hasFile('image')) {
                    $storeimage = ImageHelper::saveImage($request->image, 'productthumnails');
                    $data['image'] = $storeimage;
                }
                $product->update($data);
                alert()->success('Success', 'Product updated successfully.');
                return redirect('/index/product');
            } else {
                $data = $request->all();
                if ($request->hasFile('image')) {
                    $storeimage = ImageHelper::saveImage($request->image, 'productthumnails');
                    $data['image'] = $storeimage;
                }
                $product->update($data);
                alert()->success('Success', 'Product updated successfully.');
                return redirect('/index/product');
            }
        } catch (\Exception $e) {
            alert()->error('Error', $e->getMessage(),);
            return redirect()->back();
        }
    }

    public function details($id)
    {
        $product = Product::find($id);
        $data = [
            'active' => 'product',
            'title' => 'Add Product',
            'product' => $product
        ];
        return view('admin.product.detail', $data);
    }

    public function deleteImage($id)
    {
        try {
            $image = ProductImage::find($id);
            $image->delete();
            alert()->success('Success', 'Product image delete successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            alert()->error('Error', $e->getMessage(),);
            return redirect()->back();
        }
    }
}
