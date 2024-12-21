<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'active' => 'sub-category',
            'title' => 'Add Sub-Category'
        ];
        return view('admin.subcategory.create', $data);
    }

    public function storeCategory(Request $request)
    {
        try {
            $existingsubCategory = SubCategory::where('name', $request->name)->first();
            if ($existingsubCategory) {
                alert()->error('Error', 'Sub Category already exists.');
                return redirect()->back();
            }

            $subCategory = SubCategory::create($request->all());
            if ($subCategory) {
                alert()->success('Success', 'SubCategory added successfully.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            alert()->error('Error', 'An error occurred: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function subcategory()
    {
        $subcategories = SubCategory::with('category')->get();
        return view('admin.subcategory.index', ['subcategories' => $subcategories, 'active' => 'sub-category', 'title' => 'Sub-Categories']);
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $SubCategory = SubCategory::find($id);
        $SubCategory = $SubCategory->delete();
        if ($SubCategory) {
            alert()->success('Success', 'SubCategory delete successfully.');
            return redirect()->back();
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $SubCategory = SubCategory::find($id);
        return view('admin.subcategory.edit', ['SubCategory' => $SubCategory, 'active' => 'sub-category', 'title' => 'Update Sub-Category']);
    }
    public function update(Request $request)
    {
        $SubCategory = SubCategory::find($request->id);
        $SubCategories =  $SubCategory->update([
            'name' => $request->name
        ]);
        if ($SubCategories) {
            alert()->success('Success', 'SubCategory update successfully.');
            return redirect()->route('subcategory.index');
        } else {
            alert()->error('Error', 'SubCategory not update successfully.');
            return redirect()->route('subcategory.index');
        }
    }
}
