<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Nalika - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/owl.transitions.css') }}">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/animate.css') }}">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/normalize.css') }}">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}">
    <!-- morrisjs CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/calendar/fullcalendar.print.min.css') }}">
    <!-- forms CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/form/all-type-forms.css') }}">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/style.css') }}">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/responsive.css') }}">
    <!-- modernizr JS
  ============================================ -->
    <script src="{{ asset('assets/admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>PLEASE LOGIN TO APP</h3>
                    <p>This is the best app ever!</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="{{ route('admin.login') }}" id="loginForm" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username"
                                    required="Enter Email" value="" name="email" id="username" class="form-control">

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******"
                                    required="" value="" name="password" id="password" class="form-control">

                            </div>
                            <div class="checkbox login-checkbox">
                                <label>

                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">

            </div>
        </div>
    </div>

    <!-- jquery
  ============================================ -->
    <script src="{{ asset('assets/admin/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
============================================ -->
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
============================================ -->
    <script src="{{ asset('assets/admin/js/wow.min.js') }}"></script>
    <!-- price-slider JS
============================================ -->
    <script src="{{ asset('assets/admin/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
============================================ -->
    <script src="{{ asset('assets/admin/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
============================================ -->
    <script src="{{ asset('assets/admin/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
============================================ -->
    <script src="{{ asset('assets/admin/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
============================================ -->
    <script src="{{ asset('assets/admin/js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
============================================ -->
    <script src="{{ asset('assets/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
============================================ -->
    <script src="{{ asset('assets/admin/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- sparkline JS
============================================ -->
    <script src="{{ asset('assets/admin/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <!-- calendar JS
============================================ -->
    <script src="{{ asset('assets/admin/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/calendar/fullcalendar-active.js') }}"></script>
    <!-- float JS
============================================ -->
    <script src="{{ asset('assets/admin/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/admin/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/admin/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('assets/admin/js/flot/flot-active.js') }}"></script>
    <!-- plugins JS
============================================ -->
    <script src="{{ asset('assets/admin/js/plugins.js') }}"></script>
    <!-- main JS
============================================ -->
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
</body>

</html>
