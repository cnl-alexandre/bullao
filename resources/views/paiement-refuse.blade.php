@extends('layouts.tunnel')

@section('pageTitle', 'Bullao : Paiement refusé | '.env('APP_NAME'))

@section('content')

<section class="site-section bg-light" id="refuse-section" style="height: 100vh;">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-md-7">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Paiement refusé</h2>
                </div>
            </div>
        </div>
        <div class="row mb-5 d-flex align-items-center">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="text-center">
                    <img src="{{ url('/medias/img/refuse.svg') }}" alt="Paiement accepté" class="img-fluid rounded-circle" width="180px;" >
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-5" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing">
                    <h4 class="text-center text-black mb-4">Il y a un soucis</h4>
                    <p class="text-center text-black mb-4">Quelque chose s'est mal passé lors du paiement et nous ne pouvons donner suite à votre réservation pour le moment.</p>
                    <p class="text-center text-black mb-5">On vous invitons à vérifier votre moyen de paiement et recommencer la réservation. Vous y étiez presque, courage !</p>
                    <p class="text-center">
                        <a href="{{ url('/reservation') }}" class="btn btn-primary btn-md text-white">Recommencer</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
