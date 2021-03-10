@extends('layouts.tunnel')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<!-- <section class="site-section bg-light pb-4" id="pricing-section">
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="align-self-center">
                <img src="{{ url('medias/img/pictos/reservation-on.png') }}" alt="">
                <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                <img src="{{ url('medias/img/pictos/livraison-off.png') }}" alt="">
                <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                <img src="{{ url('medias/img/pictos/paiement-off.png') }}" alt="">
            </div>
        </div>
    </div>
</section> -->

<form class="" action="{{ $action }}" method="post">

    {{ csrf_field() }}

    <div class="site-section tunnel-achat bg-light" id="spas-section">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-8 mt-2">
                    <div class="block-heading" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">Étape récapitulative</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }} - {{ $reservation->spa_libelle }}</a></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-column justify-content-around" data-toggle="buttons">
                <div class="col-11 col-md-4 tunnel-box radius text-right mx-auto mb-3">
                    <label for="" class="text-black mb-0">Sous-total de la réservation :</label>
                    <p class="mb-0">{{ $reservation->montant_total }} €</p>
                </div>
                <div class="col-11 col-md-4 tunnel-box radius text-right mx-auto mb-3">

                    <div class="col-8 col-md-12 ml-1 ml-md-0">
                        <h3 class="font-size-20 text-primaire">{{ $reservation->spa_libelle }}</h3>
                        <span class="d-block font-gray-6 font-size-14 mb-1"></span>
                        <span class="d-block font-size-14 mb-1"></span>
                    </div>
                </div>
                <div class="col-11 col-md-4 tunnel-box radius text-right mx-auto mb-3">

                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 px-0 text-center sticky">
                    <input type="submit" name="" value="Réserver ce spa" id="btn-confirm" class="btn btn-primary btn-md text-white">
                </div>
            </div>
        </div>
    </div>

</form>

<footer style="background-color:#ffffff;">
    @include('partials.footer-tunnel')
</footer>

@endsection
