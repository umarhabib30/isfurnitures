<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="thesofahub.com">
    <meta name="title" content="THE SOFA HUB | BEST QUALITY SOFAS IN UK	">
    <meta name="description" content="Looking for modern designed sofas in the UK? Sofa hub is here with the best sofas to fit in your room space perfectly!" >
    <meta name="keywords" content="cheap sofas, corner sofa 3 seat, cheap 3 piece sofa set, furniture couch sofa, corner sofa three seater, modern sofa UK, sofas direct, sofa direct UK, couches UK, 2 seat sofas UK, sofa store Manchester, sofas available now, sofas Manchester, cheap modular sofas UK, couches 3 piece set, cheap couches Manchester, comfort sofa, direct furniture limited, armchair and 2 seater sofa">


    <link rel="shortcut icon" href="{{ asset('assets/images/logo2.svg') }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <!-- Bootstrap CSS -->
    @include('frontend.partials.css')
    @yield('css')
    <title>{{ $title }}</title>

</head>

<body>
    @include('sweetalert::alert')
    <!-- Start Header/Navigation -->
    @include('frontend.partials.nav')

    <!-- End Header/Navigation -->
    @yield('content')
    <!-- Start Hero Section -->

    <!-- Start Footer Section -->
    @include('frontend.partials.footer')
    <!-- End Footer Section -->


    @include('frontend.partials.js')
    @yield('js')
</body>

</html>
