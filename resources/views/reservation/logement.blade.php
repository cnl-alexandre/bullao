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

    <div class="site-section tunnel-achat bg-light" id="datepicker-section">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-6 mt-2">
                    <div class="block-heading" data-aos="" data-aos-delay="">
                        <h2 class="h2-reservation">À propos de chez vous</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }} - {{ $reservation->spa_libelle }}</a></p>
                        <br>
                        Quel est votre logement ?
                        <div class="row d-flex justify-content-start btn-group btn-group-toggle radio-custom" data-toggle="buttons" required>
                            <label for="type_logement" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 typeLogement">
                                <input type="radio" name="type_logement" class="typeLogement" value="Maison">
                                <div class="block-team-member-1 text-center rounded" style="padding: 18px 5px 11px 5px;">
                                    <p class="font-size-15" style="color: #525252;">Une maison</p>
                                </div>
                            </label>
                            <label for="type_logement" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 typeLogement">
                                <input type="radio" name="type_logement" class="typeLogement" value="Appartement">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 18px 5px 11px 5px;">
                                    <p class="font-size-15" style="color: #525252;">Un appartement</p>
                                </div>
                            </label>
                        </div>

                        Où posera-t-on le spa ?
                        <div class="row d-flex justify-content-start btn-group btn-group-toggle radio-custom" data-toggle="buttons">
                            <label for="emplacement" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 emplacement">
                                <input type="radio" name="emplacement" class="emplacement" value="Intérieur">
                                <div class="block-team-member-1 text-center rounded" style="padding: 18px 5px 11px 5px;">
                                    <p class="font-size-15" style="color: #525252;">À l'intérieur</p>
                                </div>
                            </label>
                            <label for="emplacement" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 emplacement">
                                <input type="radio" name="emplacement"  class="emplacement" value="Extérieur">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 18px 5px 11px 5px;">
                                    <p class="font-size-15" style="color: #525252;">À l'extérieur</p>
                                </div>
                            </label>
                        </div>


                        À proximité du spa, avez-vous l’un des choix ?
                        <div class="row d-flex justify-content-start btn-group btn-group-toggle radio-custom" data-toggle="buttons">
                            <label for="remplissage" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 creneau">
                                <input type="radio" name="remplissage" class="remplissage" value="Salle d’eau">
                                <div class="block-team-member-1 text-center rounded" style="padding: 18px 5px 11px 5px;">
                                    <p class="font-size-15" style="color: #525252;">Salle d’eau</p>
                                </div>
                            </label>
                            <label for="remplissage" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 creneau">
                                <input type="radio" name="remplissage" class="remplissage" value="Salle de bain">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 18px 5px 11px 5px;">
                                    <p class="font-size-15" style="color: #525252;">Salle de bain</p>
                                </div>
                            </label>
                            <label for="remplissage" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 creneau">
                                <input type="radio" name="remplissage" class="remplissage" value="Jet d’eau extérieur">
                                <div class="block-team-member-1 text-center rounded"  style="padding: 18px 5px 11px 5px;">
                                    <p class="font-size-15" style="color: #525252;">Jet d’eau extérieur</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 px-0 text-center sticky">
                    <input type="submit" name="" value="Continuer" id="btn-confirm" class="btn btn-primary btn-md text-white">
                </div>
            </div>
        </div>
    </div>

</form>

<footer style="background-color:#ffffff;">
    @include('partials.footer-tunnel')
</footer>

@endsection
