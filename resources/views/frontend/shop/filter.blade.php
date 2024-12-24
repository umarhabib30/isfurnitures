<!-- resources/views/frontend/product-list.blade.php -->
@foreach ($products as $product)
    <div class="col-12 col-md-4 col-lg-3 mb-5">
        <a class="product-item" href="#">
            <img src="{{ asset($product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
            <h3 class="product-title">{{ $product->name }}</h3>
            <strong class="product-price">£{{ $product->sale_price }}</strong>

            <span class="icon-cross">
                <img src="{{ asset('assets/images/cross.svg') }}" class="img-fluid" alt="Icon">
            </span>
        </a>
    </div>
@endforeach
