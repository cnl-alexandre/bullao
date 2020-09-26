<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('pageTitle')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ url('/css/customer/aos.css') }}">

        <link rel="stylesheet" href="{{ url('/css/customer/style.css') }}">
        <link rel="stylesheet" href="{{ url('/css/customer/custom.css') }}">

        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>


        @yield('content')


        <script src="{{ url('/js/customer/functions.js') }}"></script>
    </body>


</html>
