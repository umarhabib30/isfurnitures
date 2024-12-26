@extends('frontend.layout.app')
@section('content')
    <div class="untree_co-section">
        <div class="container">

            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border bg-white">
                        <!-- Start of Form -->
                        <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="firstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="lastname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="address"
                                        placeholder="Street address" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_state_country" class="text-black">City <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_state_country" name="city" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">Posta / Zip <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_postal_zip" name="zip_code" required>
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email Address</label>
                                    <input type="email" class="form-control" id="c_email_address" name="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="phoneno"
                                        placeholder="Phone Number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="order_note" id="c_order_notes" cols="30" rows="5" class="form-control"
                                    placeholder="Write your notes here..."></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-black btn-lg py-3 btn-block">Place Order</button>
                            </div>
                        </form>
                        <!-- End of Form -->
                    </div>
                </div>

                <div class="col-md-6">


                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product Image</th>
                                        <th>Name</th>

                                        <th>Qty</th>
                                        <th>Price</th>
                                    </thead>
                                    <tbody>
                                        @foreach (App\Helpers\Cart::products() as $product)
                                            <tr>
                                                <td><img src="{{ $product->image }}" height="40px" width="50px"></td>
                                                <td>{{ $product->name }}</td>

                                                <td>{{ $product->qty }}</td>
                                                <td>£{{ $product->price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-black font-weight-bold" colspan="3"><strong>Order
                                                    Total</strong></td>
                                            <td class="text-black font-weight-bold">
                                                <strong>£{{ App\Helpers\Cart::grandTotal() }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>





                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
@endsection
