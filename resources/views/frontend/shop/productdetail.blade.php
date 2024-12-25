@extends('frontend.layout.app')
@section('content')
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-md-6 ">
                <div class="row">

                    <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                        <img id="mainImage" src="{{ asset($product->image) }}" alt="" class="w-50 mb-3 rounded shadow"
                            style="border: 2px solid #ddd; padding: 10px;">
                        <div class="image-slider d-flex flex-wrap justify-content-center" style="gap: 10px;">
                            @if ($product->images)
                                @foreach ($product->images as $image)
                                    <img src="{{ asset($image->image) }}" alt="Not Found" height="70px" width="70px"
                                        class="rounded shadow-sm"
                                        style="background-color: white; padding: 5px; cursor: pointer; border: 2px solid #ddd;"
                                        onclick="changeMainImage(this.src)">
                                @endforeach
                            @else
                                <p>No images found.</p>
                            @endif
                            <img id="mainImage" src="{{ asset($product->image) }}" alt="" height="70px"
                                width="70px" class="rounded shadow-sm"
                                style="background-color: white; padding: 5px; cursor: pointer; border: 2px solid #ddd;"
                                onclick="changeMainImage(this.src)">
                        </div>
                    </div>
                    <div class="accordion col-12 mt-5 pt-3" id="reviewAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingReview">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#reviewCollapse" aria-expanded="false" aria-controls="reviewCollapse"
                                    style="background-color: #3B5D50; color:white;">
                                    Add a Review
                                </button>
                            </h2>
                            <div id="reviewCollapse" class="accordion-collapse collapse" aria-labelledby="headingReview"
                                data-bs-parent="#reviewAccordion">
                                <div class="accordion-body">
                                    @if(auth()->check())
                                        <form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-12">
                                                <input type="email" name="email" class="form-control input-default"
                                                    placeholder="Enter Your Email"
                                                    style="border: 1px solid black; margin-top: 30px; height: 40px;" 
                                                    value="{{ auth()->user()->email }}" readonly>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="description" class="form-control" placeholder="Enter Reviews"
                                                    style="border: 1px solid black; margin-top: 30px;">{{ old('description') }}</textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" name="image" class="form-control input-default"
                                                    placeholder="Upload Image"
                                                    style="border: 1px solid black; margin-top: 30px; height: 40px;">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                                        </form>
                                    @else
                                        <button class="btn btn-primary mt-3" onclick="showLoginPopup()">Submit Review</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        function showLoginPopup() {
                            alert("Please log in to add a review.");
                          
                            // window.location.href = "{{ route('login') }}";
                        }
                    </script>
                    
                </div>
            </div>
            <div class="col-md-6 px-4 mt-3 mt-md-0">
                <div class="row d-flex justify-content-center">
                    <div class="col-11 col-md-8 text-dark">
                        <h2 class="fw-bold"><u>{{ $product->name }}</u></h2>
                    </div>
                    <div class="col-11 col-md-8 mt-3 text-dark">
                        <p class="fs-5 fw-bold text-primary">£{{ $product->price }}</p>
                    </div>
                    <div class="col-11 col-md-8 text-dark">
                        <p><b>Category: </b><span class="ms-3">{{ $product->category->name }}</span></p>
                    </div>
                    <div class="col-11 col-md-8 text-dark">
                        <p><b>Sub Category: </b><span class="ms-3">{{ $product->subcategory->name }}</span></p>
                    </div>
                    <div class="col-11 col-md-8  text-dark">
                        <p><b>Color:</b> <span class="ms-3">{{ $product->color->name }}</span></p>
                    </div>

                    <div class="col-11 col-md-10 text-muted">
                        <p class="ps-md-5">{{ $product->description }}</p>
                    </div>
                    <div class="col-8 d-flex justify-content-around mt-2">
                        <a href="" class="btn btn-dark px-4 py-2 shadow-sm w-100 cart-add"
                            product-id={{ $product->id }}>Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 p-4">
                <div class="user-reviews border p-3" style="max-height: 300px; overflow-y: scroll;">
                    <div class="review mb-3 p-2 border-bottom">
                        <p class="fw-bold mb-1">Email: hamir@example.com</p>
                        <img src="{{ asset($product->image) }}" alt="User 1 Image" class="img-fluid rounded mb-2"
                            style="width: 50px; height: 50px;">
                        <p>Review: This product is amazing! Highly recommended.</p>
                    </div>
                    <div class="review mb-3 p-2 border-bottom">
                        <p class="fw-bold mb-1">Email: saif@example.com</p>
                        <img src="{{ asset($product->image) }}" alt="User 2 Image" class="img-fluid rounded mb-2"
                            style="width: 50px; height: 50px;">
                        <p>Review: Decent quality for the price.</p>
                    </div>
                    <div class="review mb-3 p-2 border-bottom">
                        <p class="fw-bold mb-1">Email: umer@example.com</p>
                        <img src="{{ asset($product->image) }}" alt="User 3 Image" class="img-fluid rounded mb-2"
                            style="width: 50px; height: 50px;">
                        <p>Review: Not satisfied with the product. Delivery was late.</p>
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
    <script>
        function changeMainImage(newSrc) {
            document.getElementById('mainImage').src = newSrc;
        }

        function closeReviewSection() {
            var myAccordion = new bootstrap.Collapse(document.getElementById('reviewCollapse'), {
                toggle: false
            });
            myAccordion.hide();
        }

        document.addEventListener("DOMContentLoaded", function() {
            var myAccordion = new bootstrap.Collapse(document.getElementById('reviewCollapse'), {
                toggle: false
            });
        });
    </script>
@endsection
