@extends('layouts.tunnel')

@section('pageTitle', 'Bullao : Paiement accepté | '.env('APP_NAME'))

@section('content')

<section class="site-section bg-light" id="accepted-section" style="height: 100vh;">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-md-7">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Paiement accepté</h2>
                </div>
            </div>
        </div>
        <div class="row mb-5 d-flex align-items-center">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="text-center">
                    <img src="{{ url('/medias/img/checked.svg') }}" alt="Paiement accepté" class="img-fluid rounded-circle" width="200px;" >
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing">
                    <h4 class="text-center text-black mb-5">Réservation validée !</h4>
                    <p class="text-center text-black mb-4">Un mail de confirmation vous a été envoyé suite à votre réservation sur notre site Bullao.</p>
                    <p class="text-center text-black mb-5">Nous vous remerçions pour votre confiance !</p>
                    <p class="text-center">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-md text-white">Terminer</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
