<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    @include('frontend.partials.css')
    @yield('css')
    <title>{{ $title }}</title>
   
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('frontend.partials.nav')

    <!-- End Header/Navigation -->
    @yield('content')
    <!-- Start Hero Section -->

    <!-- Start Footer Section -->
    @include('frontend.partials.footer')
    <!-- End Footer Section -->


    @include('frontend.partials.css')
    @yield('js')
</body>

</html>
