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
                        <p>
                            @if(isset($reservation))
                                <a href="{{ url('/reservation/dates') }}">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }}</a> - <a href="{{ url('/reservation/spas') }}">{{ $reservation->reservation_spa_libelle }}</a>
                            @elseif(isset($cadeau))
                                {{ $cadeau->cadeau_offre }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-column justify-content-around" data-toggle="buttons">

                @if(isset($reservation))
                    <div class="col-11 col-md-6 col-xl-4 tunnel-box radius mx-auto mb-3">
                        <img src="{{ url($reservation->spa->spa_chemin_img) }}" alt="Spa Intex choix réservation" width="150px">
                        <div class="row" style="color: #525252">
                            <div class="col-12 text-left">
                                <b>Du {{ $reservation->dateDebut->format('d/m/Y') }} au {{ $reservation->dateFin->format('d/m/Y') }}</b>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-left text-black">
                                {{ $reservation->reservation_spa_libelle }}
                            </div>
                            <div class="col-6 text-right">
                                {{ number_format($reservation->reservation_prix, 2, '.', ' ') }}€
                            </div>
                        </div>
                        @if($joursSupp != "0")
                            <div class="row">
                                <div class="col-6 text-left text-black">
                                    + {{ $joursSupp }} jour(s) en plus
                                </div>
                                <div class="col-6 text-right">
                                    {{ number_format($reservation->spa->calculPrixJoursSupp($joursSupp, $reservation->spa), 2, '.', ' ') }}€
                                </div>
                            </div>
                        @endif
                        @if($reservation->reservation_pack_id != NULL)
                            <hr>
                            <div class="row">
                                <div class="col-6 text-left text-black">
                                    + {{ $reservation->pack->pack_libelle }}
                                </div>
                                <div class="col-6 text-right">
                                    {{ number_format($reservation->pack->pack_prix, 2, '.', ' ') }}€
                                </div>
                            </div>
                        @endif
                        @if(count($accessoires) > 0)
                            <hr>
                            @foreach($accessoires as $accessoire)
                                <div class="row">
                                    <div class="col-6 text-left text-black">
                                        + {{ $accessoire->accessoire_libelle }}
                                    </div>
                                    <div class="col-6 text-right">
                                        {{ number_format($accessoire->accessoire_prix, 2, '.', ' ') }}€
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-11 col-md-6 col-xl-4 tunnel-box radius mx-auto mb-3">
                        {{ $client->client_name }}
                        <br>{{ $reservation->reservation_rue }}
                        <br>{{ $reservation->reservation_ville }} - {{ $reservation->reservation_cp }} ({{ $reservation->reservation_departement }})

                    </div>

                    <div class="col-11 col-md-6 col-xl-4 tunnel-box radius text-right mx-auto mb-3">
                        <label for="" class="text-black mb-0">Sous-total de la réservation :</label>
                        <p class="mb-0">{{ $reservation->reservation_montant_total }} €</p>
                    </div>
                @elseif(isset($cadeau))
                    <div class="col-11 col-md-6 col-xl-4 tunnel-box radius mx-auto mb-3">
                        {{ $client->client_name }}
                        <br>{{ $cadeau->cadeau_rue }}
                        <br>{{ $cadeau->cadeau_ville }} - {{ $cadeau->cadeau_cp }} ({{ $cadeau->cadeau_departement }})

                    </div>

                    <div class="col-11 col-md-6 col-xl-4 tunnel-box radius text-right mx-auto mb-3">
                        <label for="" class="text-black mb-0">Sous-total de l'achat :</label>
                        <p class="mb-0">{{ $cadeau->cadeau_montant }} €</p>
                    </div>
                @endif
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 px-0 text-center sticky">
                    <input type="submit" name="" value="Procéder au paiement" id="btn-confirm" class="btn btn-primary btn-md text-white">
                </div>
            </div>
        </div>
    </div>

</form>

<footer style="background-color:#ffffff;">
    @include('partials.footer-tunnel')
</footer>

@endsection
