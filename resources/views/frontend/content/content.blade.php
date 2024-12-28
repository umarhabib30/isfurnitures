@extends('frontend.layout.app')

@section('content')
    <!-- Category Section -->
    <div class="category-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Explore Our Categories</h2>
            <div class="product-section">
                <div class="container">
                    <div class="row">
                        @foreach ($latestSubcategories as $latestsubcategory)
                            <div class="col-6 col-md-4 col-lg-3 mb-3 mb-md-4">
                                <!-- Reduced margin for mobile and medium screens -->
                                <a class="product-item" href="{{ route('subcategory.products', $latestsubcategory->id) }}">
                                    <img src="{{ $latestsubcategory->image }}" class="img-fluid product-thumbnail"
                                        alt="{{ $latestsubcategory->name }}">
                                    <h3 class="product-title">{{ $latestsubcategory->name }}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Products Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">
                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3  mb-lg-0">
                    <h2 class="mb-4 section-title">Explore Our Latest Products</h2>
                    <p class="mb-4">Discover our newest collection, designed to bring comfort, style, and durability to
                        your living space. Each product is carefully selected to ensure long-lasting satisfaction.</p>


                    <p><a href="{{ route('shop.view') }}" class="btn">Shop Now</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                @foreach ($latestProducts as $latestProduct)
            
                    <div class="col-6 col-md-4 col-lg-3  mb-md-4"> <!-- Reduced margin for mobile and medium screens -->
                        <a class="product-item" href="{{ route('product.detail', $latestProduct->id) }}">
                            <img src="{{ $latestProduct->image }}" class="img-fluid product-thumbnail"
                                alt="{{ $latestProduct->name }}">
                            <h3 class="product-title">{{ $latestProduct->name }}</h3>
                            <strong class="product-price">£{{ $latestProduct->price }}</strong>
                            {{-- <h6>Sold Quantity :{{$latestProduct->total_sold_qty}}</h6> --}}

                            <button type="submit" product-id="{{ $latestProduct->id }}"
                                class="btn btn-primary btn-sm w-100 cart-add">Add to Cart</button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Popular Products Section -->
    <div class="category-section py-5">
        <div class="container">
            <h2 class="text-center pb-5">Explore Our Products</h2>
            <div class="product-section">
                <div class="container">
                    <div class="row">
                        @foreach ($allProducts as $latestProduct)
                            <div class="col-6 col-md-4 col-lg-3 mb-md-4">
                                <!-- Reduced margin for mobile and medium screens -->
                                <a class="product-item" href="{{ route('product.detail', $latestProduct->id) }}">
                                    <img src="{{ $latestProduct->image }}" class="img-fluid product-thumbnail"
                                        alt="{{ $latestProduct->name }}">
                                    <h3 class="product-title">{{ $latestProduct->name }}</h3>
                                    <strong class="product-price">£{{ $latestProduct->price }}</strong>
                                    {{-- <h6>Sold Quantity :{{$latestProduct->total_sold_qty}}</h6> --}}


                                    <button type="submit" product-id="{{ $latestProduct->id }}"
                                        class="btn btn-primary btn-sm w-100 cart-add">Add to Cart</button>

                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Shop Now Button Row -->
            <div class="row justify-content-center pt-4">
                <div class="col-auto">
                    <a href="{{ route('shop.view') }}" class="btn btn-lg">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- End Popular Product -->

    <!-- Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">Why Choose Us</h2>
                    <p>We are dedicated to providing high-quality sofas that combine comfort, style, and durability. Our
                        commitment to excellence ensures a seamless shopping experience tailored to your needs.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6 mb-4"> <!-- Reduced margin -->
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/truck.svg') }}" alt="Fast & Free Shipping"
                                        class="img-fluid">
                                </div>
                                <h3>Fast &amp; Free Shipping</h3>
                                <p>Enjoy fast and free delivery for all your sofa purchases, ensuring your comfort arrives
                                    without delay.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 mb-4"> <!-- Reduced margin -->
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/bag.svg') }}" alt="Easy to Shop" class="img-fluid">
                                </div>
                                <h3>Easy Shopping Experience</h3>
                                <p>Browse our wide selection of sofas with ease, and find the perfect fit for your living
                                    space effortlessly.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 mb-4"> <!-- Reduced margin -->
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/support.svg') }}" alt="24/7 Support"
                                        class="img-fluid">
                                </div>
                                <h3>24/7 Customer Support</h3>
                                <p>Our team is available around the clock to assist you with any questions or concerns about
                                    your sofa purchase.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 mb-4"> <!-- Reduced margin -->
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/return.svg') }}" alt="Hassle-Free Returns"
                                        class="img-fluid">
                                </div>
                                <h3>Hassle-Free Returns</h3>
                                <p>We offer easy and convenient returns, ensuring your satisfaction with every sofa you
                                    purchase.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset('assets/images/choseus.jpg') }}" alt="Why Choose Us - Sofa Shop"
                            class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- End Why Choose Us Section -->
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
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
