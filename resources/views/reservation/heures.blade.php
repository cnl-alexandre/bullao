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
                        <h2 class="h2-reservation">À propos des dates</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }} - {{ $reservation->spa_libelle }}</a></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-column justify-content-around" data-toggle="buttons">

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
