@extends('frontend.layout.app')

@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Shop</h1>
                    </div>
                </div>
                <div class="col-lg-7"></div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

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
                    </div>
                </div>
                <!-- End Sidebar -->

                <!-- Start Product Grid -->
                <div class="col-lg-9">
                    <div class="row product-list">
                        @foreach ($products as $product)
                            <div class="col-12 col-md-4 col-lg-3 mb-5">
                                <a class="product-item" href="#">
                                    <img src="{{ asset($product->image) }}" class="img-fluid product-thumbnail"
                                        alt="{{ $product->name }}">
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <strong class="product-price">£{{ $product->sale_price }}</strong>

                                    <span class="icon-cross">
                                        <img src="{{ asset('assets/images/cross.svg') }}" class="img-fluid" alt="Icon">
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
    <!-- Include jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on('change', '#color-filter, #subcategory-filter', function() {
            let color = $('#color-filter').val();
            let subcategory = $('#subcategory-filter').val();

            $.ajax({
                url: "{{ route('filter.products') }}",
                method: "GET",
                data: {
                    color: color,
                    subcategory: subcategory
                },
                success: function(response) {
                    // Update the product list
                    if (response.products) {
                        $('.product-list').html(response.products);
                    } else if (response.message) {
                        $('.product-list').html('<div class="col-12 text-center"><p>' + response.message + '</p></div>');
                    }

                    // Update pagination
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
@endsection
