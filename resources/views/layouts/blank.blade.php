<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('pageTitle')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/jpg" href="{{ url('/medias/img/favicon.webp') }}"/>

        <!-- DESACTIVATION INDEXATION -->
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <!-- FIN -->

        <link rel="stylesheet" href="{{ url('/fonts/icomoon/style.css') }}">

        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/style.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/custom.css?version='.env('APP_VERSION')) }}">
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap">

            @yield('content')

        </div>


    </body>

    <script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/dbc2b88096ae40eb9710cd74e16ebf84715c7466079d48dab279d2a834f4aa12.js"></script>
</html>
