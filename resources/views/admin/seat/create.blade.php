@extends('admin.layout.admin')
@section('content')
    <div class="card">
        <h5 class="card-header">Add Seat</h5>
        <div class="card-body">
            <form action="{{ route('seat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Seat Number </label>
                    <input id="inputText3" type="text" class="form-control" name="seat_number"
                        placeholder="Enter Seat Number">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
