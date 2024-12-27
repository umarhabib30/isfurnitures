<!-- resources/views/frontend/product-list.blade.php -->
@foreach ($products as $product)
    <div class="col-12 col-md-4 col-lg-3 mb-5">
        <a class="product-item" href="{{route('product.detail',$product->id)}}">
            <img src="{{ asset($product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
            <h3 class="product-title">{{ $product->name }}</h3>
            <strong class="product-price">£{{ $product->price }}£</strong>

            <button type="submit" product-id="{{ $product->id }}"
                class="btn btn-primary btn-sm w-100 cart-add">Add to Cart</button>
        </a>
    </div>
@endforeach
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
