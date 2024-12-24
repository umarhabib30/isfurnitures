@extends('admin.layout.admin')
@section('content')
    <div class="card">
        <h5 class="card-header">Add Color</h5>
        <div class="card-body">
            <form action="{{ route('color.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Name</label>
                    <input id="inputText3" type="text" class="form-control" name="name"
                        placeholder="Enter Color Name">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
