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

                        <!-- Filter by Price Range -->
                        <div class="mb-4">
                            <h5>Price Range</h5>
                            <label for="price-range" class="form-label">
                                <span id="min-price">0</span> - <span id="max-price">{{ $maxPrice ?? 1000 }}</span>
                            </label>
                            <input type="range" class="form-range"  max="{{ $maxPrice ?? 1000 }}" step="1" id="price-range" value="{{ request('max_price', 0) }}">
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
                    
                                    <span class="icon-cross">
                                        <img src="{{ asset('assets/images/cross.svg') }}" class="img-fluid cart-add" product-id="{{ $product->id }}" alt="Icon">
                                    </span>
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

    <script>
        $(document).on('input change', '#price-range', function() {
            let maxPrice = $(this).val();
            $('#max-price').text(maxPrice);
        });
        $(document).on('change', '#color-filter, #subcategory-filter, #price-range', function() {
            let color = $('#color-filter').val();
           console.log(color);
            
            let subcategory = $('#subcategory-filter').val();
            let maxPrice = $('#price-range').val();

            $.ajax({
                url: "{{ route('filter.products') }}",
                method: "GET",
                data: {
                    color: color,
                    subcategory: subcategory,
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
    </script>
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
                location.reload();
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
</script>
@endsection
