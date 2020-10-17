<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('pageTitle')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/jpg" href="{{ url('/medias/img/logo-compact.png') }}"/>

        <!-- DESACTIVATION INDEXATION -->
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <!-- FIN -->

        <link rel="stylesheet" href="{{ url('/css/customer/aos.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/style.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/custom.css?version='.env('APP_VERSION')) }}">
        <link rel="stylesheet" href="{{ url('/css/customer/paiement-stripe.css?version='.env('APP_VERSION')) }}">

        <script src="{{ url('/js/customer/jquery-3.3.1.min.js') }}"></script>
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body class="body-stripe">


        @yield('content')


        <script src="{{ url('/js/customer/functions.js') }}"></script>
    </body>


</html>
