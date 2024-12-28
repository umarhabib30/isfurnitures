<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function size()
    {
        return view('admin.size.create', ['active' => 'size', 'title' => 'Add Size']);
    }

    public function store(Request $request)
    {
        try {
            $size = Size::create([
                'name' => $request->name,
            ]);

            if ($size) {
                alert()->success('Success', 'Size added successfully');
                return redirect()->back();
            }
        } catch (\Exception $e) {

            alert()->error('Error',  $e->getMessage());
            return redirect()->back();
        }
    }

    public function index()
    {
        $sizes = size::all();
        return view('admin.size.index', ['active' => 'size', 'title' => 'All Size ', 'sizes' => $sizes]);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $size = size::find($id);
        $size = $size->delete();
        if ($size) {
            alert()->success('Success', 'Size delete successfully.');
            return redirect()->back();
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $size = size::find($id);
        return view('admin.size.edit', ['size' => $size, 'active' => 'size', 'title' => 'Update Size']);
    }
    public function update(Request $request)
    {
        $size = size::find($request->id);
        $sizes =  $size->update($request->all());
        if ($sizes) {
            alert()->success('Success', 'Size update successfully.');
            return redirect()->route('size.index');
        } else {
            alert()->error('Error', 'Size not update successfully.');
            return redirect()->route('size.index');
        }
    }
}
