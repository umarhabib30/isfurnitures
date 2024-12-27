@extends('admin.layout.admin')
@section('content')
    <div class="card">
        <h5 class="card-header">Update Seat Number</h5>
        <div class="card-body">
            <form action="{{ route('seat.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $seatNumber->id }}" name="id">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Name</label>
                    <input id="inputText3" type="text" class="form-control" name="seat_number"
                        value="{{ $seatNumber->seat_number }}" placeholder="Enter Category Name">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
