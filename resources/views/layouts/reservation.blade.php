<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('pageTitle')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="{{ url('/fonts/icomoon/style.css') }}">

        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/bootstrap-reboot.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/aos.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/style.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/custom.css') }}">
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap">
            @include('partials.customer.header-tunnel')

            @yield('content')

            @include('partials.customer.footer-tunnel')
        </div>

        <script src="{{ url('/js/customer/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery-ui.js') }}"></script>
        <script src="{{ url('/js/customer/popper.min.js') }}"></script>
        <script src="{{ url('/js/customer/bootstrap.min.js') }}"></script>
        <script src="{{ url('/js/customer/owl.carousel.min.js') }}"></script>
        <script src="{{ url('/js/customer/mediaelement-and-player.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.stellar.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.animateNumber.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.countdown.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.easing.1.3.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.fancybox.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.sticky.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.waypoints.min.js') }}"></script>
        <script src="{{ url('/js/customer/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ url('/js/customer/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ url('/js/customer/aos.js') }}"></script>
        <script src="{{ url('/js/customer/slick.min.js') }}"></script>
        <script src="{{ url('/js/customer/typed.js') }}"></script>

        <script src="{{ url('/js/customer/main.js') }}"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <script>


            $(function() {

              $('input[name="daterange"]').daterangepicker({
                opens: 'center'
              }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
              });
            });
        </script>
    </body>
</html>
