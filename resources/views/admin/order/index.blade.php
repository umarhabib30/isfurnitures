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
                        Orders
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>Address</th>
                                    <th>Order Note</th>
                                    <th>Grand Total</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->firstname ?? 'Not Available' }}</td>
                                        <td>{{ $order->lastname ?? 'Not Available' }}</td>
                                        <td>{{ $order->email ?? 'Not Available' }}</td>
                                        <td>{{ $order->phone_no ?? 'Not Available' }}</td>
                                        <td>{{ $order->city ?? 'Not Available' }}</td>
                                        <td>{{ $order->zip_code ?? 'Not Available' }}</td>
                                        <td>{{ $order->address ?? 'Not Available' }}</td>
                                        <td>{{ $order->order_note ?? 'Not Available' }}</td>
                                        <td>{{ $order->grand_total ?? 'Not Available' }}</td>
                                        <td>{{ $order->qty ?? 'Not Available' }}</td>
                                        <td>
                                            <a href="{{ route('order.detail', $order->id) }}"
                                                class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Sr#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>Address</th>
                                    <th>Order Note</th>
                                    <th>Grand Total</th>
                                    <th>Qty</th>
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
