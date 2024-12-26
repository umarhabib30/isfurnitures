@extends('admin.layout.admin')

@section('content')
    <div class="card">
        <h5 class="card-header">Add Sub-Category</h5>
        <div class="card-body">
            <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="inputText3" class="col-form-label">Select Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select One Value Only</option>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $category->id }}" @if ($key ==0) selected

                                @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                            <label for="inputText3" class="col-form-label">Name</label>
                            <input id="inputText3" type="text" class="form-control" name="name" placeholder="Enter Category Name">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="inputText3" class="col-form-label">Image</label>
                        <input id="file" type="file" class="form-control" name="image" placeholder="Pick Up Image">
                </div>
                </div>
                <input type="submit" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
@endsection
