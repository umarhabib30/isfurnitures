@extends('frontend.layout.app')

@section('content')
    <!-- Start Product Section -->
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <!-- Start Sidebar -->
                <div class="col-lg-3 mb-5">
                    <div class="sidebar">
                        <h4 class="mb-4">Filter by</h4>

                        <!-- Filter by Colors -->
                        <div class="mb-4">
                            <h5>Colors</h5>
                            <select class="form-control" id="color-filter">
                                <option value="">Select Color</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}" style="color: {{ $color->code }};"
                                        {{ request('color') == $color->id ? 'selected' : '' }}>
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter by Subcategories -->
                        <div class="mb-4">
                            <h5>Categories</h5>
                            <select class="form-control" id="subcategory-filter">
                                <option value="">Select Category</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"
                                        {{ request('subcategory') == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter by Stuff -->
                        <div class="mb-4">
                            <h5>Stuff</h5>
                            <select class="form-control" id="stuff-filter">
                                <option value="">Select Stuff</option>
                                @foreach ($stuffs as $stuff)
                                    <option value="{{ $stuff->id }}"
                                        {{ request('stuff') == $stuff->id ? 'selected' : '' }}>
                                        {{ $stuff->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter by Seats -->
                        <div class="mb-4">
                            <h5>Seats</h5>
                            <select class="form-control" id="seat-filter">
                                <option value="">Select Seats</option>
                                @foreach ($seatNumbers as $seatNumber)
                                    <option value="{{ $seatNumber->id }}"
                                        {{ request('seatNumber') == $seatNumber->id ? 'selected' : '' }}>
                                        {{ $seatNumber->seat_number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter by Price Range -->
                        <div class="mb-4">
                            <h5>Price Range</h5>
                            <label for="price-range" class="form-label">
                                <span id="min-price">0</span> - <span id="max-price">{{ $maxPrice ?? 1000 }}</span>
                            </label>
                            <input type="range" class="form-range" max="{{ $maxPrice ?? 1000 }}" step="1" id="price-range" value="{{ request('max_price', 0) }}">
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->

                <!-- Start Product Grid -->
                <div class="col-lg-9">
                    <div class="row product-list">
                        @foreach ($products as $product)
                            <div class="col-6 col-md-4 col-lg-3 mb-5">
                                <a class="product-item" href="{{ route('product.detail', $product->id) }}">
                                    <img src="{{ asset($product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <strong class="product-price">£{{ $product->price }}</strong>
                    
                                    <button type="submit" product-id="{{ $product->id }}"
                                        class="btn btn-primary btn-sm w-100 cart-add">Add to Cart</button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    @if ($products->hasPages())
                        <div class="row">
                            <div class="col-12">
                                <div style="display: flex; justify-content: center; margin-top: 20px;">
                                    {!! $products->links('pagination::bootstrap-5') !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- End Product Grid -->
            </div>
        </div>
    </div>
    <!-- End Product Section -->

    
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('input change', '#price-range', function() {
            let maxPrice = $(this).val();
            $('#max-price').text(maxPrice);
        });

        $(document).on('change', '#color-filter, #subcategory-filter, #stuff-filter, #seat-filter, #price-range', function() {
            let color = $('#color-filter').val();
            let subcategory = $('#subcategory-filter').val();
            let stuff = $('#stuff-filter').val();
            let seat = $('#seat-filter').val();
            let maxPrice = $('#price-range').val();

            $.ajax({
                url: "{{ route('filter.products') }}",
                method: "GET",
                data: {
                    color: color,
                    subcategory: subcategory,
                    stuff: stuff,
                    seatNumber: seat,
                    max_price: maxPrice
                },
                success: function(response) {
                    if (response.products) {
                        $('.product-list').html(response.products);
                    } else if (response.message) {
                        $('.product-list').html('<div class="col-12 text-center"><p>' + response.message + '</p></div>');
                    }
                    if (response.pagination) {
                        $('.pagination').html(response.pagination);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', '.cart-add', function(e) {
                e.preventDefault();
                let id = $(this).attr('product-id');            
                addToCart(id, 1);
            });
        });

        function addToCart(productId, qty) {
            let data = {
                product_id: productId,
                qty: qty,
                expectsJson: true,
                _token: '{{ csrf_token() }}',
            };
            $.ajax({
                url: "{{ route('customer.cart') }}",
                type: 'POST',
                data: data,
                success: function(response) {
                    // Update the cart quantity display
                    $('.cart-qty').html(response.qty);
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to Cart',
                        text: 'The product has been added to your cart.',
                        showConfirmButton: false,
                        timer: 3000 // Auto-close after 3 seconds
                    });
                  
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
    
@endsection
