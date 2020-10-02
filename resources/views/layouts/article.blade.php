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

    <script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/dbc2b88096ae40eb9710cd74e16ebf84715c7466079d48dab279d2a834f4aa12.js"></script> 
</html>
