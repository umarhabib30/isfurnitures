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
                        Order Detail
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Order Person Name</th>
                                    <th>Order Last Name</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Total</th>
                                    <th>Qty</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $index => $orderItem)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $orderItem->order->firstname ?? 'Not Available' }}</td>
                                        <td>{{ $orderItem->order->lastname ?? 'Not Available' }}</td>
                                        <td>{{ $orderItem->product->name ?? 'Not Available' }}</td>
                                        <td>{{ $orderItem->product->price ?? 'Not Available' }}</td>
                                        <td>{{ $orderItem->total ?? 'Not Available' }}</td>
                                        <td>{{ $orderItem->qty ?? 'Not Available' }}</td>
                                        <td><img src="{{ asset($orderItem->product->image ?? 'Not Available') }}" height="50px" width="50px"></td>
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

        <!-- ============================================================== -->
        <!-- Order Summary Card -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        Order Summary
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>First Name:</strong> {{ $orderItems->first()->order->firstname ?? 'Not Available' }}</p>
                            <p><strong>Last Name:</strong> {{ $orderItems->first()->order->lastname ?? 'Not Available' }}</p>
                            <p><strong>Email:</strong> {{ $orderItems->first()->order->email ?? 'Not Available' }}</p>
                            <p><strong>Phone No:</strong> {{ $orderItems->first()->order->phone_no ?? 'Not Available' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Zip Code:</strong> {{ $orderItems->first()->order->zip_code ?? 'Not Available' }}</p>
                            <p><strong>City:</strong> {{ $orderItems->first()->order->city ?? 'Not Available' }}</p>
                            <p><strong>Address:</strong> {{ $orderItems->first()->order->address ?? 'Not Available' }}</p>
                            <p><strong>Order Note:</strong> {{ $orderItems->first()->order->order_note ?? 'Not Available' }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Total Quantity:</strong> {{ $orderItems->sum('qty') }}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p><strong>Grand Total:</strong> £{{ $orderItems->first()->order->grand_total ?? 'Not Available' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Order Summary Card -->
        <!-- ============================================================== -->
    </div>
@endsection
