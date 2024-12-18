<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li><a class="nav-link" href="{{ route('shop.view') }}">Shop</a></li>
                <li><a class="nav-link" href="{{ route('about.view') }}">About us</a></li>
                <li><a class="nav-link" href="{{route('services.view')}}">Services</a></li>
                <li><a class="nav-link" href="{{route('blog.view')}}">Blog</a></li>
                <li><a class="nav-link" href="{{route('contact.view')}}">Contact us</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="#"><img src="{{ asset('assets/images/user.svg') }}"></a></li>
                <li><a class="nav-link" href="{{route('cart.view')}}"><img src="{{ asset('assets/images/cart.svg') }}"></a></li>
            </ul>
        </div>
    </div>

</nav>
