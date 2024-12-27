@extends('frontend.layout.app')
@section('content')
    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Why Choose Us</h2>
                    <p>We provide exceptional services tailored to your needs, ensuring quality and satisfaction.</p>
    
                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('assets/images/truck.svg')}}" alt="Fast & Free Shipping" class="img-fluid">
                                </div>
                                <h3>Fast &amp; Free Shipping</h3>
                                <p>Receive your orders quickly without any extra shipping costs.</p>
                            </div>
                        </div>
    
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('assets/images/bag.svg')}}" alt="Easy to Shop" class="img-fluid">
                                </div>
                                <h3>Easy to Shop</h3>
                                <p>Enjoy a seamless shopping experience with an intuitive interface.</p>
                            </div>
                        </div>
    
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('assets/images/support.svg')}}" alt="24/7 Support" class="img-fluid">
                                </div>
                                <h3>24/7 Support</h3>
                                <p>Our team is available around the clock to assist you with any queries.</p>
                            </div>
                        </div>
    
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('assets/images/return.svg')}}" alt="Hassle Free Returns" class="img-fluid">
                                </div>
                                <h3>Hassle Free Returns</h3>
                                <p>Easily return your purchases with our simple return process.</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{asset('assets/images/choseus.jpg')}}" alt="Why Choose Us" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>       
@endsection
