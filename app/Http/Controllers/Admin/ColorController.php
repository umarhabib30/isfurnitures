<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ColorController extends Controller
{
    public function color()
    {
        return view('admin.color.create', ['active' => 'color', 'title' => 'Add Color']);
    }

    public function store(Request $request)
    {
        try {
            $existingColor = Color::where('name', $request->name)->first();
            if ($existingColor) {
                alert()->error('Error', 'Color already exists.');
                return redirect()->back();
            }

            $color = Color::create([
                'name' => $request->name
            ]);

            if ($color) {
                alert()->success('Success', 'Color added successfully.');
            } else {
                alert()->error('Error', 'Failed to add color.');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error storing color: ' . $e->getMessage());
            alert()->error('Error', 'Something went wrong. Please try again later.');
            return redirect()->back();
        }
    }
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', ['colors' => $colors, 'active' => 'color', 'title' => 'Color']);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $color = Color::find($id);
        $color = $color->delete();
        if ($color) {
            alert()->success('Success', 'Color delete successfully.');
            return redirect()->back();
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $color = Color::find($id);
        return view('admin.color.edit', ['color' => $color, 'active' => 'color', 'title' => 'Update Color']);
    }
    public function update(Request $request)
    {
        $color = Color::find($request->id);
        $colors =  $color->update($request->all());
        if ($colors) {
            alert()->success('Success', 'Color update successfully.');
            return redirect()->route('color.index');
        } else {
            alert()->error('Error', 'Color not update successfully.');
            return redirect()->route('color.index');
        }
    }
}
