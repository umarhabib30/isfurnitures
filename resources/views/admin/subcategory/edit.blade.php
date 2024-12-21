@extends('admin.layout.admin')

@section('content')

    <div class="card">
        <h5 class="card-header">Update Sub-Category</h5>
        <div class="card-body">
            <form action="{{ route('subcategory.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="id" type="hidden" value="{{ $SubCategory->id }}">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="inputText3" class="col-form-label">Name</label>
                        <input type="text" value="{{ $SubCategory->name }}" name="name" required class="form-control"
                        placeholder="Enter SubCategory Name">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
@endsection
