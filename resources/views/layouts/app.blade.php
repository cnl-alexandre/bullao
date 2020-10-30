<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('pageTitle')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/jpg" href="{{ url('/medias/img/favicon.webp') }}"/>

        @if(env('APP_DEPLOYED') == "0")
            <!-- DESACTIVATION INDEXATION -->
            <meta name="robots" content="noindex">
            <meta name="googlebot" content="noindex">
            <!-- FIN -->
        @endif

        <link rel="stylesheet" href="{{ url('/fonts/icomoon/style.css') }}">

        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/bootstrap-daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/bootstrap-reboot.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/jquery.fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/mediaelementplayer.css') }}">
        <link rel="stylesheet" href="{{ url('/fonts/flaticon/font/flaticon.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/aos.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/style.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/custom.css?version='.env('APP_VERSION')) }}">

        @if(env('APP_DEPLOYED') == "1")
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180769448-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-180769448-1');
            </script>
            <!-- Fin Google Analytics -->
        @endif
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap">
            @include('partials.header')

            @yield('content')

            @include('partials.footer')
        </div>

        <script src="{{ url('/js/jquery-3.3.1.min.js') }}"></script>
        <!-- <script src="{{ url('/js/customer/jquery-migrate-3.0.1.min.js') }}"></script> -->
        <script src="{{ url('/js/customer/jquery-ui.js') }}"></script>
        <script src="{{ url('/js/customer/popper.min.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
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
    </body>

    <script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/dbc2b88096ae40eb9710cd74e16ebf84715c7466079d48dab279d2a834f4aa12.js"></script>

    @if(env('APP_ENV') == "1")
        <!-- Hotjar Tracking Code for www.bullao.fr -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:2040877,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
        <!-- Fin Hotjar -->
    @endif
</html>
