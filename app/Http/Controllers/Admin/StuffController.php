<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stuff;
use Illuminate\Http\Request;

class StuffController extends Controller
{
    public function stuff()
    {
        return view('admin.stuff.create', ['active' => 'stuff', 'title' => 'Add Stuff']);
    }
    public function store(Request $request)
    {
        try {
            $stuff = Stuff::create([
                'name' => $request->name,
            ]);

            if ($stuff) {
                alert()->success('Success', 'Stuffadded successfully');
                return redirect()->back();
            }
        } catch (\Exception $e) {

            alert()->error('Error',  $e->getMessage());
            return redirect()->back();
        }
    }

    public function index()
    {
        $stuffs = Stuff::all();
        return view('admin.stuff.index', ['active' => 'stuff', 'title' => 'All Stuff', 'stuffs' => $stuffs]);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $stuff = Stuff::find($id);
        $stuff = $stuff->delete();
        if ($stuff) {
            alert()->success('Success', 'Stuff delete successfully.');
            return redirect()->back();
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $stuff = Stuff::find($id);
        return view('admin.stuff.edit', ['stuff' => $stuff, 'active' => 'stuff', 'title' => 'Update Stuff']);
    }
    public function update(Request $request)
    {
        $stuff = Stuff::find($request->id);
        $stuffs =  $stuff->update($request->all());
        if ($stuffs) {
            alert()->success('Success', 'Stuff update successfully.');
            return redirect()->route('stuff.index');
        } else {
            alert()->error('Error', 'Stuff not update successfully.');
            return redirect()->route('stuff.index');
        }
    }
}
