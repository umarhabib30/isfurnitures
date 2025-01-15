<!-- resources/views/frontend/product-list.blade.php -->
@foreach ($products as $product)
    <div class="col-6 col-md-6 col-lg-3 mb-5">
        <a class="product-item d-flex flex-column" href="{{ route('product.detail', $product->id) }}" style="height: 100%; display: flex; flex-direction: column;">
            <!-- Adjust image size to 4:3 aspect ratio -->
            <div class="product-image" style="width: 100%; padding-top: 75%; position: relative;">
                <img src="{{ asset($product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h3 class="product-title" style="flex-grow: 1;">{{ $product->name }}</h3>
            <strong class="product-price" style="flex-grow: 1;">£{{ $product->price }}</strong>

            <button type="submit" product-id="{{ $product->id }}" class="btn btn-primary btn-sm w-100 cart-add" style="flex-shrink: 0;">Add to Cart</button>
        </a>
    </div>
@endforeach

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
