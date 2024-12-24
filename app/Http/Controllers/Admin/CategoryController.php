<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create', ['active' => 'category', 'title' => 'Add Category']);
    }
    public function store(Request $request)
    {
        try {
            $existingCategory = Category::where('name', $request->name)->first();
            if ($existingCategory) {
                alert()->error('Error', 'Category already exists.');
                return redirect()->back();
            }

            $category = Category::create($request->all());
            if ($category) {
                alert()->success('Success', 'Category added successfully.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            alert()->error('Error', 'An error occurred: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories, 'active' => 'category', 'title' => 'Categories']);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category = $category->delete();
        if ($category) {
            alert()->success('Success', 'Category delete successfully.');
            return redirect()->back();
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category, 'active' => 'category', 'title' => 'Update Category']);
    }
    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $categories =  $category->update($request->all());
        if ($categories) {
            alert()->success('Success', 'Category update successfully.');
            return redirect()->route('category.index');
        } else {
            alert()->error('Error', 'Category not update successfully.');
            return redirect()->route('category.index');
        }
    }
}
