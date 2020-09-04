<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>@yield('pageTitle')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="shortcut icon" type="image/jpg" href="{{ url('/favicon.png') }}"/>
        <meta name="keywords" content="M&#38;F-Immo, M&#38;F-Immobilier, M&#38;F Immo, M&#38;F immobilier, brou sur chantereine, brou-sur-chantereine, 77177, mf-immo, mf-immobilier, mylène gicquel, franck caldirola, maison, appartement, vendre, montévrain, lagny, chessy, vaires sur marne, thorigny">
        <meta name="description" content="Acheter à Brou-sur-Chantereine (77177) : Toutes les annonces MF Immo de vente de maisons et d'appartements. Tout pour acheter une maison ou un appartement à Marne-la-Vallée (77) avec notre agence immobilière présenté par Mylène et Franck.">
        <meta name="Author" content="M&#38;F Immobilier">
        <meta property="og:title" content="Agence immobilière Brou, M&#38;F Immobilier">
        <meta property="og:type" content="company">
        <meta property="og:url" content="https://www.mf-immo.com">
        <meta property="og:image" content="https://www.mf-immo.com/img/logo.svg">
        <meta property="og:description" content="M&#38;F Immobilier à Brou sur Chantereine 77177, 22 avenue Jean Jaurès. Au bord de Vaires-sur-Marne - Votre agence immobilière présentée par Mylène Gicquel et Franck Caldirola. L'agence M&#38;F Immobilier vous propose une large gamme de biens immobiliers situés dans le secteur Marne-La-Vallée.">
        <meta property="og:site_name" content="M&#38;F Immobilier">
        <meta name="robots" content="index,follow">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('/css/system/style.css?version='.env('APP_VERSION')) }}">

        <!-- Scripts -->
        <script src="{{ url('/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('/js/system/sb-admin-2.min.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>