@extends('admin.layout.admin')
@section('content')
    <div class="card">
        <h5 class="card-header">Update Size</h5>
        <div class="card-body">
            <form action="{{ route('size.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $size->id }}" name="id">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Name</label>
                    <input id="inputText3" type="text" class="form-control" name="name"
                        value="{{ $size->name }}" placeholder="Enter  Name">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
