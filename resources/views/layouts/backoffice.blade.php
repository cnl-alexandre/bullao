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

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/font-awesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/system/sb-admin-2.min.css') }}">

        <link rel="stylesheet" href="{{ url('/css/system/dataTables.bootstrap4.min.css') }}">

        <link rel="stylesheet" href="{{ url('/css/system/bootstrap4-toggle.min.css') }}">

        <link rel="stylesheet" href="{{ url('/css/system/Chart.min.css') }}">

        <link rel="stylesheet" href="{{ url('/css/system/style.css?version='.env('APP_VERSION')) }}">

        <!-- Scripts -->
        <script src="{{ url('/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('/js/system/sb-admin-2.min.js') }}"></script>

        <script src="{{ url('/js/system/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('/js/system/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('/js/system/fileinput.min.js') }}"></script>

        <script src="{{ url('/js/system/bootstrap4-toggle.min.js') }}"></script>

        <script src="{{ url('/js/system/Chart.min.js') }}"></script>
        <script src="{{ url('/js/system/fonctions.js') }}"></script>

    </head>
    <body id="page-top">
        <div id="wrapper">

            @include('partials.system.sidebar')

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                    @include('partials.system.header')

                    <div class="container-fluid">
                        @include('partials.system.alert')

                        @yield('content')
                    </div>

                </div>

                @include('partials.system.footer')

            </div>
        </div>
    </body>
</html>
