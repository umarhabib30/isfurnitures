@extends('frontend.layout.app')
@section('content')
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Helpers\Cart::products() as $product)
                                    <tr class="remove-row">
                                        <td class="product-thumbnail">
                                            <img src="{{ $product->image }}" alt="Image" class="img-fluid" height="50px" width="50px">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $product->name }}</h2>
                                        </td>
                                        <td class="prod-price prod-price-{{ $product->id }}">{{ $product->price }}</td>
                                        <!-- Product-specific price -->
                                        <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button product-id="{{ $product->id }}"
                                                        class="btn btn-outline-black decrease decrement"
                                                        type="button">&minus;</button>
                                                </div>
                                                <input type="text" readonly
                                                    class="form-control text-center quantity-amount product-quantity input input-{{ $product->id }}"
                                                    value="{{ $product->qty }}" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button product-id="{{ $product->id }}"
                                                        class="btn btn-outline-black increase increment"
                                                        type="button">&plus;</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-total cost cost-{{ $product->id }}"></td>
                                        <!-- Subtotal will be updated here -->
                                        <td><a href="#" product-id="{{ $product->id }}"
                                                class="btn btn-black btn-sm remove">X</a></td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        
                        <div class="col-md-6">
                            <a class="btn btn-outline-black btn-sm btn-block" href="{{route('shop.view')}}" >Continue Shopping</a>
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"
                                        id="grand-total">{{ App\Helpers\Cart::grandTotal() }}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-black btn-lg py-3 btn-block"
                                        onclick="window.location='{{route('checkout.view')}}'">Proceed To Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.prod-price').each(function() {
                var id = $(this).attr('class').split('prod-price-')[1]; // Extract product id
                var price = parseFloat($(this).text()); // Get the price of the product
                var quantity = parseInt($('.input-' + id).val()); // Get the quantity of the product
                var subtotal = price * quantity; // Calculate subtotal for this product

                // Update the product's total
                $('.cost-' + id).text(subtotal.toFixed(2)); // Update the total for this product

                // Also update the grand total
                updateGrandTotal();
            });

            // Remove product from cart
            $('body').on('click', '.remove', function(e) {
                e.preventDefault();
                let id = $(this).attr('product-id');
                remove(id);
            });

            // Increment product quantity
            $('body').on('click', '.increment', function(e) {
                e.preventDefault();
                let id = $(this).attr('product-id');
                increment(id);
            });

            // Decrement product quantity
            $('body').on('click', '.decrement', function(e) {
                e.preventDefault();
                let id = $(this).attr('product-id');
                decrement(id);
            });
        });

        // Remove product from cart
        function remove(id) {
            let data = {
                id: id,
                expectsJson: true,
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: "{{ route('cart.product.remove') }}",
                type: 'POST',
                data: data,
                success: function(response) {
                    // Remove the row of the product from the table
                    $('.remove-row').each(function() {
                        if ($(this).find('.remove').attr('product-id') === id) {
                            $(this).remove();
                        }
                    });

                    // Update grand total after product removal
                    var totalprice = response.grandTotal;
                    $('#grand-total').text(totalprice);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Increment product quantity
        function increment(id) {
            let data = {
                id: id,
                _token: '{{ csrf_token() }}',
                expectsJson: true,
            };

            $.ajax({
                url: "{{ route('cart.product.increase') }}",
                type: 'POST',
                data: data,
                success: function(response) {
                    // Update quantity input field for the specific product
                    var quantityInput = $('.input-' + id);
                    var quantity = parseInt(quantityInput.val()) + 1;
                    quantityInput.val(quantity); // Set new quantity in input

                    // Get product price and calculate the total
                    var price = parseFloat($('.prod-price-' + id).text());
                    var total = quantity * price;

                    // Update the subtotal for this product
                    $('.cost-' + id).text(total.toFixed(2));

                    // Update grand total if provided in response
                    var grandTotal = response.grandTotal;
                    $('#grand-total').text(grandTotal.toFixed(2)); // Update grand total on the page
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Decrement product quantity
        function decrement(id) {
            let data = {
                id: id,
                _token: '{{ csrf_token() }}',
                expectsJson: true,
            };

            $.ajax({
                url: "{{ route('cart.product.decrease') }}",
                type: 'POST',
                data: data,
                success: function(response) {
                    var quantityInput = $('.input-' + id);
                    var quantity = parseInt(quantityInput.val());

                    // Decrease the quantity if greater than 0
                    if (quantity > 1) {
                        quantity -= 1;
                        quantityInput.val(quantity); // Update the quantity input field

                        var price = parseFloat($('.prod-price-' + id).text()); // Get the product price
                        var total = quantity * price; // Calculate new total for the product
                        $('.cost-' + id).text(total.toFixed(2)); // Update the subtotal for this product
                    } else {
                        remove(id); // Remove the product if quantity is 0 or less
                    }

                    updateGrandTotal(); // Recalculate the grand total after updating the quantity and subtotal
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Function to update the grand total
        function updateGrandTotal() {
            let grandTotal = 0;
            $('.cost').each(function() {
                grandTotal += parseFloat($(this).text()); // Add each product's subtotal to the grand total
            });
            $('#grand-total').text(grandTotal.toFixed(2)); // Update the grand total display
        }
    </script>
@endsection
