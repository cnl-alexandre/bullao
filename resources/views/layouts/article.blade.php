<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('pageTitle')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ url('/fonts/icomoon/style.css') }}">

        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/jquery.fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ url('/fonts/flaticon/font/flaticon.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/aos.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/style.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/custom.css') }}">
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap">
            @include('partials.header-article')

            @yield('content')

            @include('partials.footer')
        </div>

        <script src="{{ url('/js/customer/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('/js/customer/popper.min.js') }}"></script>
        <script src="{{ url('/js/customer/bootstrap.min.js') }}"></script>
        <script src="{{ url('/js/customer/owl.carousel.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.animateNumber.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.easing.1.3.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.sticky.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.waypoints.min.js') }}"></script>
        <script src="{{ url('/js/customer/aos.js') }}"></script>

        <script src="{{ url('/js/customer/main.js') }}"></script>
    </body>

    <script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/97a46987366d4fc1a2fcbc378a7e6083639ed01f06c64dc19d0d10401fe30d47.js"></script> 
</html>
