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
                    <div class="block-heading text-left" data-aos="" data-aos-delay="">
                        <h2 class="h2-reservation">À propos de chez vous</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }}</a> - <a href="{{ url('/reservation/spas') }}"> {{ $reservation->reservation_spa_libelle }}</a></p>
                        <div class="form-group mb-4">
                            <label for="adresse">Numéro et rue :</label>
                            <input type="text" id="adresse" class="form-control adresse" name="adresse" maxlength="100" placeholder="39 chemin de la porte verte" required>
                        </div>
                        <div class="row">
                            <div class="col-7 form-group mb-4">
                                <label for="ville">La ville :</label>
                                <input type="text" id="ville" class="form-control ville" name="ville" maxlength="100" placeholder="Montévrain" required>
                            </div>
                            <div class="col-5 form-group mb-4">
                                <label for="cp">Code postal :</label>
                                <input type="text" id="cp" class="form-control cp" name="cp" maxlength="5" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group mb-4">
                                <label for="departement">Le département :</label>
                                <select class="form-control" name="departement" id="departement" required>
                                    <option value="" disabled selected hidden>Choisir</option>
                                    <option value="75">75 - Paris</option>
                                    <option value="77">77 - Seine et Marne</option>
                                    <option value="93">93 - Seine-Saint-Denis</option>
                                </select>
                            </div>
                        </div>
                        @if($reservation->reservation_type_logement == "Appartement")
                            <div class="row">
                                <div class="col-7 form-group mb-4">
                                    <label for="etage">Étage :</label>
                                    <select class="form-control" name="etage" id="etage" required>
                                        <option value="" disabled selected hidden>Choisir</option>
                                        <option value="Rez-de-chaussé">Rez-de-chaussé</option>
                                        <option value="1er étage">1er étage</option>
                                        <option value="2e étage">2e étage</option>
                                        <option value="3e étage">3e étage</option>
                                    </select>
                                </div>
                                <div class="col-5 form-group mb-4">
                                    <label for="ascenseur">Ascenseur :</label>
                                    <select class="form-control" name="ascenseur" id="ascenseur" required>
                                        <option value="" disabled selected hidden>Choisir</option>
                                        <option value="Oui">Oui</option>
                                        <option value="Non">Non</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="form-group mb-4">
                            <label for="complement">Complément d'adresse <small>(facultatif)</small> :</label>
                            <input type="text" id="complement" class="form-control" name="complement" placeholder="code 3321, interphone 201" maxlength="100">
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
