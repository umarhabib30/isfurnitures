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
                        Products
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Product Name</th>
                                    <th>Original Price</th>
                                    <th>Sale Price</th>
                                    <th>Delivery Charge</th>
                                    <th>Color</th>
                                    <th>Stuff</th>
                                    <th>Seats</th>
                                    <th>size</th>
                                    {{-- <th>Delivery Time</th> --}}
                                    {{-- <th>Discount Price</th> --}}
                                    <th>Action</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ asset($product->image) }}" alt="" height="50px"></td>

                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->subcategory->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->original_price }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->delivery_charge }}</td>
                                        <td>{{ $product->color->name ?? 'No color' }}</td>
                                        <td>{{ $product->stuff->name ?? 'No available' }}</td>
                                        <td>{{ $product->seat->seat_number ?? 'No available' }}</td>
                                        <td>{{ $product->size ?? 'No size' }}</td>

                                        {{-- <td>{{ $product->delivery_time }}</td> --}}
                                        {{-- <td>{{ $product->discount_price }}</td> --}}

                                        <td>
                                            <a href="{{ route('product.delete', $product->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('product.details', $product->id) }}"
                                                class="btn btn-primary">View</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Product Name</th>
                                    <th>Original Price</th>
                                    <th>Sale Price</th>
                                    <th>Delivery Charge</th>
                                    <th>Color</th>
                                    {{-- <th>Delivery Time</th> --}}
                                    {{-- <th>Discount Price</th> --}}
                                    <th>Action</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
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
