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
                                        <td><img src="{{ asset($orderItem->product->image ?? 'Not Available') }}" height="50px"
                                                width="50px"></td>

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
