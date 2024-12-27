<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{

    public function seat()
    {
        return view('admin.seat.create', ['active' => 'seat', 'title' => 'Add Seat Numbers']);
    }

    public function store(Request $request)
    {
        try {
            $seat = Seat::create([
                'seat_number' => $request->seat_number,
            ]);

            if ($seat) {
                alert()->success('Success', 'Seat Number added successfully');
                return redirect()->back();
            }
        } catch (\Exception $e) {

            alert()->error('Error',  $e->getMessage());
            return redirect()->back();
        }
    }

    public function index()
    {
        $seatNumbers = Seat::all();
        return view('admin.seat.index', ['active' => 'seat', 'title' => 'All Seat Numbers', 'seatNumbers' => $seatNumbers]);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $SeatNumber = Seat::find($id);
        $SeatNumber = $SeatNumber->delete();
        if ($SeatNumber) {
            alert()->success('Success', 'SeatNumber delete successfully.');
            return redirect()->back();
        }
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $seatNumber = Seat::find($id);
        return view('admin.seat.edit', ['seatNumber' => $seatNumber, 'active' => 'seat', 'title' => 'Update SeatNumber']);
    }
    public function update(Request $request)
    {
        $SeatNumber = Seat::find($request->id);
        $SeatNumbers =  $SeatNumber->update($request->all());
        if ($SeatNumbers) {
            alert()->success('Success', 'SeatNumber update successfully.');
            return redirect()->route('seat.index');
        } else {
            alert()->error('Error', 'SeatNumber not update successfully.');
            return redirect()->route('seat.index');
        }
    }
}
