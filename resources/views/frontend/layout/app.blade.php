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
    <style>
        /* Spinner CSS */
        #loading-spinner {
            display: none; /* Hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            z-index: 9999;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Stack spinner and text vertically */
        }

        .spinner {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3B5D50; /* Blue */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loading-text {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Loading Spinner -->
    <div id="loading-spinner">
        <div class="spinner"></div>
        <div class="loading-text">The Sofa Hub</div>
    </div>

    <!-- Start Header/Navigation -->
    @include('frontend.partials.nav')

    <!-- End Header/Navigation -->
    @yield('content')
    <!-- Start Hero Section -->

    <!-- Start Footer Section -->
    @include('frontend.partials.footer')
    <!-- End Footer Section -->

    <script>
        // Show the spinner when navigating
        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll("a");
            links.forEach(link => {
                link.addEventListener("click", function () {
                    document.getElementById("loading-spinner").style.display = "flex";
                });
            });

            // Optionally hide the spinner after page load (useful for AJAX or SPA apps)
            window.addEventListener("load", function () {
                document.getElementById("loading-spinner").style.display = "none";
            });
        });
    </script>

    @include('frontend.partials.css')
    @yield('js')
</body>

</html>
