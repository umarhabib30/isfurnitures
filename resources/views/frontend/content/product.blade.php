@extends('frontend.layout.app')

@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="row product-list">
                    @foreach ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3 mb-5"> <!-- Changed col-12 to col-6 for mobile view -->
                            <a class="product-item" href="{{route('product.detail',$product->id)}}">
                                <img src="{{ asset($product->image) }}" class="img-fluid product-thumbnail"
                                    alt="{{ $product->name }}">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <strong class="product-price">£{{ $product->price }}</strong>

                                <span class="icon-cross">
                                    <img src="{{ asset('assets/images/cross.svg') }}" class="img-fluid cart-add"  product-id={{ $product->id }} alt="Icon">
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                
            </div>
            <!-- End Product Grid -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
