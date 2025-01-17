@extends('frontend.layout.app')
@section('content')
    <div class="container mt-5">
        <div class="row mb-5 align-items-stretch">
            <!-- Image Section -->
            <div class="col-md-8 d-flex flex-column justify-content-center h-100">
                <div class="row h-100">
                    <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                        <img id="mainImage" src="{{ asset($product->image) }}" data-lightbox="review-image" alt=""
                            class="mb-3 col-md-12 main-image"
                            style="width: 100%; height: 450px; object-fit: cover; border: none;" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

                        <div class="image-slider d-flex flex-wrap justify-content-center col-md-12" style="gap: 10px;">
                            @if ($product->images)
                                @foreach ($product->images as $image)
                                    <img src="{{ asset($image->image) }}" alt="Not Found"
                                        class="rounded shadow-sm slider-image"
                                        style="padding: 5px; cursor: pointer; border: none; height: 70px; width: 70px;"
                                        onclick="changeMainImage(this.src)">
                                @endforeach
                            @else
                                <p>No images found.</p>
                            @endif
                            <img src="{{ asset($product->image) }}" alt="" class="rounded shadow-sm slider-image"
                                style="padding: 5px; cursor: pointer; border: none; height: 70px; width: 70px;"
                                onclick="changeMainImage(this.src)">
                        </div>
                    </div>

                    <!-- Modal for zoomed-in image -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <img id="zoomedImage" src="{{ asset($product->image) }}" alt="Zoomed Image"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="col-md-4 d-flex flex-column justify-content-between px-4 mt-3 mt-md-0 h-100">
                <div>
                    <div class="row">
                        <div class="col-11 col-md-12 text-dark">
                            <h2 class="fw-bold"><u>{{ $product->name }}</u></h2>
                        </div>
                        <div class="col-11 col-md-12 mt-3 text-dark">
                            <p class="fs-5 fw-bold text-primary">£{{ $product->price }}</p>
                        </div>

                        <div class="col-11 col-md-12 text-dark">
                            <p><b>Sofa Type: </b><span class="ms-3">{{ $product->subcategory->name }}</span></p>
                        </div>
                        <div class="col-11 col-md-12 text-dark">
                            <p><b>Color:</b> <span class="ms-3">{{ $product->color->name ?? 'not available' }}</span></p>
                        </div>
                        <div class="col-11 col-md-12 text-dark">
                            <p><b>Stuff:</b> <span class="ms-3">{{ $product->stuff->name ?? 'not available' }}</span></p>
                        </div>
                        <div class="col-11 col-md-12 text-dark">
                            <p><b>Seat:</b> <span class="ms-3">{{ $product->seat->seat_number ?? 'not available' }}</span>
                            </p>
                        </div>
                        <div class="col-11 col-md-12 text-dark">
                            <p><b>Size:</b> <span class="ms-3">{{ $product->size->name ?? 'not available' }}</span></p>
                        </div>
                        <div class="col-11 col-md-12 text-dark">
                            <p><b>Sold:</b> <span class="ms-3">{{ $product->sold_qty ?? 'not available' }}</span></p>
                        </div>
                        <div class="col-11 col-md-12 text-dark">
                            <p><b>Rating:</b>
                                <span class="ms-3">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i
                                            class="fas fa-star {{ $i <= $averageRating ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    <a href="#"
                        class="btn btn-dark shadow-sm cart-add d-flex justify-content-center align-items-center text-white"
                        style="width: 200px; height: 50px; border-radius: 0; white-space: nowrap; font-size: 16px;"
                        product-id="{{ $product->id }}">
                        Add to Cart
                    </a>
                </div>
            </div>
        </div>



        <ul class="nav nav-tabs nav-justified " id="ex1" role="tablist">
            <li class="nav-item pb-4" role="presentation">
                <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab"
                    aria-controls="ex3-tabs-1" aria-selected="true" style="text-decoration: none;">
                    Detail
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                    aria-controls="ex3-tabs-2" aria-selected="false" style="text-decoration: none;">
                    Reviews
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="reviewButton" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab"
                    aria-controls="ex3-tabs-3" aria-selected="false" style="text-decoration: none;">
                    Add Review
                </a>
            </li>

        </ul>

        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content pb-4" id="ex1-content">
            <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                <div class="col-11 col-md-10">
                    <p class="ps-md-5" style="word-wrap: break-word; overflow-wrap: break-word;">
                        {{ $product->description }}
                    </p>
                </div>

            </div>
            <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                <div class="user-reviews border p-3" style=" overflow-y: scroll;">
                    @foreach ($reviews as $review)
                        <div class="review mb-3 p-2 border-bottom">
                            <p class="fw-bold mb-1">User Name: {{ $review->user->name }}</p>
                            <p>
                                @php
                                    $reviewRating = $review->rating ?? 0;
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $reviewRating ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                            </p>
                            @if ($review->image)
                                <a href="{{ asset($review->image) }}" data-lightbox="review-image"
                                    data-title="User Image">
                                    <img src="{{ asset($review->image) }}" alt="User Image"
                                        class="img-fluid rounded mb-2" style="width: 50px; height: 50px;">
                                </a>
                            @endif
                            <p>Review: {{ $review->notes }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">

                <div class="accordion-body">
                    <form id="reviewForm" method="POST" action="{{ route('review.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}">

                        <!-- Rating Input -->
                        <div class="rating mb-3">
                            <p class="mb-1">Rate the Product:</p>
                            <div id="starRating" class="d-flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="far fa-star text-muted rating-star" data-value="{{ $i }}"></i>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="ratingInput" value="0">
                        </div>

                        <!-- Review Text -->
                        <div class="col-md-12">
                            <textarea name="notes" class="form-control" placeholder="Enter Reviews"
                                style="border: 1px solid black; margin-top: 30px;">{{ old('description') }}</textarea>
                        </div>

                        <!-- Upload Image -->
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control input-default"
                                placeholder="Upload Image"
                                style="border: 1px solid black; margin-top: 30px; height: 40px;">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tabs content -->

        <h3 class="mt-5 mb-4 text-center">Related Products</h3>
        {{-- <div id="relatedProductsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @php
                    $chunks = $relatedProducts->chunk(2); // Divide related products into groups of 2
                @endphp
                @foreach ($chunks as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row justify-content-center">
                            @foreach ($chunk as $relatedProduct)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <!-- Image Container -->
                                    <div class="image-container"
                                        style="position: relative; width: 100%; height: 200px; overflow: hidden;">
                                        <img src="{{ asset($relatedProduct->image) }}" class="card-img-top"
                                            alt="{{ $relatedProduct->name }}"
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <a href="{{ route('product.detail', $relatedProduct->id) }}"
                                            class="btn btn-dark shadow-sm d-flex justify-content-center align-items-center text-white"
                                            style="width: 200px; height: 50px; border-radius: 0; white-space: nowrap; font-size: 16px;">
                                            View Product
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#relatedProductsCarousel"
                data-bs-slide="prev"
                style="background-color: #3B5D50; border: none; width: 50px; height: 50px; border-radius: 50%; position: absolute; top: 50%; transform: translateY(-50%);">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#relatedProductsCarousel"
                data-bs-slide="next"
                style="background-color: #3B5D50; border: none; width: 50px; height: 50px; border-radius: 50%; position: absolute; top: 50%; transform: translateY(-50%); right: 0;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}

        <div class="slider responsive">
            @foreach ($relatedProducts as $relatedProduct)
                <div class="card">
                    <img src="{{ asset($relatedProduct->image) }}" alt="Product Image">

                    <form action="{{ route('product.detail', $relatedProduct->id) }}" method="GET">
                        <button type="submit">Detail</button>
                    </form>
                </div>
            @endforeach
        </div>




    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Slick Initialization -->
    <script>
        $(document).ready(function() {
            $('.responsive').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('[data-mdb-toggle="tab"]');
            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = this.getAttribute('href');
                    const tabContent = document.querySelector(target);
                    const activeTabContent = document.querySelector('.tab-pane.active');

                    if (activeTabContent) {
                        activeTabContent.classList.remove('show', 'active');
                    }

                    if (tabContent) {
                        tabContent.classList.add('show', 'active');
                    }
                });
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

                    // Show success popup using SweetAlert2
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
    <script>
        $(document).ready(function() {
            $('#reviewButton').on('click', function(e) {
                e.preventDefault(); // Prevent default link behavior (tab switching)
                $.ajax({
                    url: '/check-auth', // Route to check authentication status
                    method: 'GET',
                    success: function(response) {
                        // If authenticated, allow tab switch and open the review form
                        $('#ex1 a[href="#ex3-tabs-3"]').tab('show'); // Manually show the tab
                        $('#reviewCollapse').collapse('show'); // Open the review form
                    },
                    error: function(response) {
                        // If not authenticated, show login prompt
                        console.log(response);

                        Swal.fire({
                            icon: 'warning',
                            title: 'Please Login',
                            text: 'You need to be logged in to submit a review.',
                            confirmButtonText: 'Login'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href =
                                    '/login/view'; // Redirect to login page
                            }
                        });
                    }
                });
            });
        });
    </script>



    <script>
        function changeMainImage(newSrc) {
            document.getElementById('mainImage').src = newSrc;
        }

        document.getElementById("mainImage").onclick = function() {
            const zoomedImage = document.getElementById("zoomedImage");
            zoomedImage.src = this.src;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.rating-star');
            const ratingInput = document.getElementById('ratingInput');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-value');
                    ratingInput.value = rating;

                    // Update star visuals
                    updateStarRating(rating);
                });
            });

            function updateStarRating(rating) {
                stars.forEach(star => {
                    const starValue = star.getAttribute('data-value');
                    if (starValue <= rating) {
                        star.classList.remove('far', 'text-muted');
                        star.classList.add('fas', 'text-warning');
                    } else {
                        star.classList.remove('fas', 'text-warning');
                        star.classList.add('far', 'text-muted');
                    }
                });
            }
        });
    </script>
@endsection
@section('css')
    <style>
        .nav-tabs .nav-link.active {
            background-color: #a8a8a8 !important;
            color: #fff !important;
            border: none;
        }

        .nav-tabs .nav-link {
            color: #3B5D50;

            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            background-color: #d3d3d3;
        }

        .slider {
            width: 80%;
            margin: 0 auto;
        }

        .card {
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            margin: 0 10px;
            height: 350px;
            /* Fixed height for the card */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
          
        }

        .card img {
            width: 100%;
            /* Ensure the image takes up the full width of the card */
           
            /* Fixed height for the image */
            object-fit: cover;
            /* Ensure the image fills the space without distortion */
            display: block;
        }

        .card h3 {
            margin: 15px 0;
            font-size: 1.2rem;
            color: #333;
        }

        .card p {
            font-size: 0.9rem;
            color: #666;
            margin: 10px 0;
        }

        .card button {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 8px 15px;
            background: #3B5D50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .card button:hover {
            background: #2E473F;
        }
    </style>
@endsection
