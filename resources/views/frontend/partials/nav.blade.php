<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
        <a href="{{route('home')}}">
            <img class="navbar-brand" src="{{ asset('assets/images/logo2.svg') }}">
        </a>

        <!-- Mobile View -->
        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 d-md-none" id="mobileview">
            <li>
                <a class="nav-link" href="{{route('register.view')}}">
                    <img src="{{ asset('assets/images/user.svg') }}">
                </a>
            </li>
            <li @if (Request::is('contacts')) class="active" @endif>
                <a class="nav-link" href="{{route('cart.view')}}">
                    <img src="{{ asset('assets/images/cart.svg') }}">
                    <span class="cart-qty">{{ App\Helpers\Cart::qty() }}</span>
                </a>
            </li>
        </ul>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li @if (Request::is('/')) class="active" @endif>
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li @if (Request::is('shop')) class="active" @endif>
                    <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
                </li>
                <li @if (Request::is('aboutus')) class="active" @endif>
                    <a class="nav-link" href="{{ url('/aboutus') }}">About us</a>
                </li>
                <li @if (Request::is('contacts')) class="active" @endif>
                    <a class="nav-link" href="{{ url('/contacts') }}">Contact us</a>
                </li>
            </ul>

            <!-- Web View -->
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 d-none d-md-flex" id="webview">
                <li>
                    <a class="nav-link" href="{{route('register.view')}}">
                        <img src="{{ asset('assets/images/user.svg') }}">
                    </a>
                </li>
                <li @if (Request::is('contacts')) class="active" @endif>
                    <a class="nav-link" href="{{route('cart.view')}}">
                        <img src="{{ asset('assets/images/cart.svg') }}">
                        <span class="cart-qty">{{ App\Helpers\Cart::qty() }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Start Hero Section -->
<style>
    .cart-qty {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: rgb(252, 252, 252); 
        color: #3B5D50;
        border-radius: 50%; /* Makes it a perfect circle */
        padding: 2px 6px;
        height: 20px;
        width: 20px;
        font-size: 12px;
        font-weight: bold;
        display: flex; /* Enables flexbox */
        align-items: center; /* Centers the text vertically */
        justify-content: center; /* Centers the text horizontally */
    }

    .nav-link {
        position: relative; 
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
