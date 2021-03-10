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
                        <div class="form-group mb-4">
                            <label for="adresse1">L'adresse :</label>
                            <input type="text" id="adresse1" class="form-control" name="adresse1" maxlength="100" placeholder="39 chemin de la porte verte" required>
                        </div>
                        <div class="row">
                        <div class="col-7 form-group">
                            <label for="ville">La ville :</label>
                            <input type="text" id="ville" class="form-control" name="ville" maxlength="100" placeholder="Montévrain" required>
                        </div>
                        <div class="col-5 form-group">
                            <label for="departement">Le département :</label>
                            <select class="form-control" name="departement" id="departement" required>
                                <option value="" disabled selected hidden>Choisir</option>
                                <option value="75">75</option>
                                <option value="77">77</option>
                                <option value="93">93</option>
                            </select>
                            <!-- <input type="tel" id="cp" class="form-control" name="cp"> -->
                        </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="adresse2">Complément d'adresse <small>(facultatif)</small> :</label>
                            <input type="text" id="adresse2" class="form-control" name="adresse2" placeholder="3eme étage, code 3321" maxlength="100">
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
