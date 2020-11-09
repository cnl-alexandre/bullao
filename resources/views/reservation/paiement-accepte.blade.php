@extends('layouts.tunnel')

@section('pageTitle', 'Bullao : Paiement accepté | '.env('APP_NAME'))

@section('content')

<section class="site-section ariane-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mt-5 mt-md-0 d-flex justify-content-center">
            <div class="align-self-center">
                <img src="{{ url('medias/img/pictos/reservation-on.png') }}" alt="">
                <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                <img src="{{ url('medias/img/pictos/livraison-off.png') }}" alt="">
                <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                <img src="{{ url('medias/img/pictos/paiement-off.png') }}" alt="">
            </div>
        </div>

    </div>
</section>

<section class="site-section bg-light" id="accepted-section" style="height: 100vh;">
    <div class="container">
        <div class="row mb-4 d-flex align-items-center">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="text-center">
                    <img src="{{ url('/medias/img/paiement/checked.svg') }}" alt="Paiement accepté" class="img-fluid rounded-circle" width="180px;" >
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-5" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing">
                    <h4 class="text-center text-black mb-5">Réservation confirmée !</h4>
                    <p class="text-center text-black mb-4">Vous n’êtes plus qu’à quelques jours du bonheur !</p>
                    <p class="text-center text-black mb-4">Suite à la réservation de votre spa-jacuzzi sur le site Bullao, un mail de confirmation vous a été envoyé à l’adresse mail fournie.</p>
                    <p class="text-center text-black mb-5">Nous vous remercions de votre confiance.</p>
                    <p class="text-center">
                        <a href="{{ url('/') }}" class="btn btn-primary bg-action btn-md text-white">Retour à l’accueil</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<footer style="background-color:#ffffff;">
    @include('partials.footer-tunnel')
</footer>

@endsection
