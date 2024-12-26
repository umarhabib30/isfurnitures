@extends('admin.layout.admin')

@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- data table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        Sub-Categories
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $index => $subcategory)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $subcategory->category->name }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td><img src="{{asset($subcategory->image)}}" height="50px" width="50px"></td>
                                        <td>
                                            <form action="{{ route('subcategory.delete') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <input type="hidden" value="{{ $subcategory->id }}" name="id">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('subcategory.edit') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <input type="hidden" value="{{ $subcategory->id }}" name="id">
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end data table  -->
        <!-- ============================================================== -->
    </div>
@endsection
