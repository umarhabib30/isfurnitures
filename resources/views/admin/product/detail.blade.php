@extends('admin.layout.admin')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset($product->image) }}" alt="" height="350px">
        </div>
        <div class="col-md-8 ">
            <h2>{{ $product->name }}</h2>
            <p>
                {{ $product->description }}
            </p>
            <table class="table">
                <tr>
                    <th>Category : </th>
                    <td>{{ $product->category->name }}</td>
                    <th>Sub-Category : </th>
                    <td>{{ $product->subcategory->name }}</td>
                </tr>
                <tr>
                    <th>Origial Price : </th>
                    <td> {{ $product->original_price }} €</td>
                    <th>Sales price : </th>
                    <td>{{ $product->sale_price }} €</td>
                </tr>
                <tr>
                    <th>Delivery Charges : </th>
                    <td>{{ $product->delivery_charge }}</td>
                    <th>Discount : </th>
                    <td>{{ $product->discount_price ? $product->discount_price : '0.00' }}</td>
                </tr>
            </table>
        </div>
    </div>
    <h2 class="mt-4">Images</h2>
    <div class="row mt-4">
        @foreach ($product->images as $image)
            <div class="col-md-3">
                <div class="card">

                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset($image->image) }}" alt="Card image cap" height="150px">
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('product.image.delete',$image->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
