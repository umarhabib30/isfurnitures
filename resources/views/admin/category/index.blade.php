@extends('admin.layout.app')

@section('content')
    <div class="single-product-tab-area mg-b-30">
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description">Show Categories</a></li>
                                <table id="myTable" class="display mt-5">
                                    <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $index => $category)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <form action="{{ route('category.delete') }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" value="{{$category->id}}" name="id">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>

                                                <td>
                                                    <form action="{{ route('category.edit') }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" value="{{$category->id}}" name="id">
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection

@section('css')
    <style>
        #myTable thead th,
        #myTable tbody tr td {
            color: white;
        }
    </style>
@endsection
