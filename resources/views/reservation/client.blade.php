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
                        <h2 class="h2-reservation">À propos de vous</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }}</a> - <a href="{{ url('/reservation/spas') }}"> {{ $reservation->reservation_spa_libelle }}</a></p>
                        <div class="form-group mb-4">
                            <label for="name">Votre prénom et nom :</label>
                            <input type="text" id="name" class="form-control" name="name" maxlength="100" placeholder="John Doe" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="email">L'adresse mail :</label>
                            <input type="email" id="email" class="form-control" name="email" maxlength="100" placeholder="monadresse@email.com" required>
                            <small>Vous ne recevrez pas de spams, c'est promis !</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Numéro de téléphone :</label>
                            <input type="tel" id="phone" class="form-control" name="phone" maxlength="10" placeholder="0612345678" pattern="[0-9]{10}" required>
                            <small>Uniquement si besoin pour votre réservation.</small>
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

<!-- <script>
    $(".name").change(function() {
        inputCheck();
    });
    $(".email").change(function() {
        inputCheck();
    });
    $(".phone").change(function() {
        inputCheck();
    });

    function inputCheck() {
        if($(".name").is(':change') && $(".email").is(':change') && $(".phone").is(':change'))
        {
            $('#btn-confirm').attr("disabled", false);
            $('#btn-confirm').attr("title", null);
        }
        else
        {
            $('#btn-confirm').attr("disabled", true);
            $('#btn-confirm').attr("title", "Vous devez remplir toutes les informations.");
        }

    }

    $(document).ready(function() {
        $('#btn-confirm').attr("disabled", true);
        $('#btn-confirm').attr("title", "Vous devez remplir toutes les informations.");
    });
</script> -->

@endsection
