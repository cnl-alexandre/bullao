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
                        <h2 class="h2-reservation">Choix du spa</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }}</a></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom array_spas" data-toggle="buttons">
                @if(count($spas) > 0)
                    @foreach($spas as $spa)
                        @if(!in_array($spa->spa_id, $reserv) && $spa->spa_stock > 0)
                            <label for="spa-{{$spa->spa_id}}" class="btn btn-radio-custom col-lg-4 col-md-6 spa-recap spa-no-disabled spa">
                                <input type="radio" name="spa" id="spa-{{$spa->spa_id}}" class="spa" autocomplete="off" value="{{$spa->spa_id}}">
                                <div class="block-team-member-1 text-center input-row-step1-responsive radius">
                                    <figure class="col-4 col-md-12 mt-0 mb-0 pl-0">
                                        <img src="{{url($spa->spa_chemin_img)}}" alt="Image" class="img-fluid rounded-circle">
                                    </figure>
                                    <div class="col-8 col-md-12 ml-1 ml-md-0">
                                        <h3 class="font-size-20 text-primaire">{{ $spa->spa_libelle }} - {{ $spa->spa_nb_place }} pers.</h3>
                                        <span class="d-block font-gray-6 font-size-14 mb-1"><?php echo $spa->spa_desc; ?></span>
                                        <span class="d-block font-size-14 mb-1">{{ number_format($spa->spa_prix, 0, ',', ' ') }}€ @if($reservation->joursSupp() > 0)puis {{ number_format($spa->spa_prix_jour_supp, 0, ',', ' ') }}€/jour soit {{$spa->spa_prix+($spa->spa_prix_jour_supp*$reservation->joursSupp())}}€@endif @if($reservation->joursSupp() == 0 && $spa->spa_nb_place == 6) (2 jours minimum !) @endif</span>

                                    </div>
                                </div>
                            </label>
                        @else
                            <label for="spa-{{ $spa->spa_id }}" class="btn btn-radio-custom col-lg-4 col-md-6 mb-1 spa-recap disabled spa">
                                <input type="radio" name="spa" id="spa-{{ $spa->spa_id }}" class="spa" disabled autocomplete="off" value="{{ $spa->spa_id }}">
                                <div class="block-team-member-1 text-center rounded nostock input-row-step1-responsive radius">
                                    <figure class="col-4 col-md-12 mt-0 mb-0 pl-0">
                                        <img src="{{ url($spa->spa_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                                    </figure>
                                    <div class="col-8 col-md-12 ml-1 mb-0 ml-md-0">
                                        <h3 class="font-size-20 text-primaire">{{ $spa->spa_libelle }} - {{ $spa->spa_nb_place }} pers.</h3>
                                        <!-- <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-14 mb-3">'.$spa->spa_desc.'</span> -->
                                        <span class="d-block font-size-14 mb-1" style="opacity:0.6;">Spa indisponible<br>sur les dates choisies.</span>
                                        <span class="d-block font-size-14 mb-1">{{ number_format($spa->spa_prix, 0, ',', ' ') }}€ @if($reservation->joursSupp() > 0)puis {{ number_format($spa->spa_prix_jour_supp, 0, ',', ' ') }}€/jour soit {{$spa->spa_prix+($spa->spa_prix_jour_supp*$reservation->joursSupp())}}€@endif</span>
                                    </div>
                                </div>
                            </label>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 px-0 text-center sticky" style="z-index: 10;">
                    <input type="submit" name="" value="Continuer" id="btn-confirm" class="btn btn-primary btn-md text-white">
                </div>
            </div>
        </div>
    </div>

</form>

<footer style="background-color:#ffffff;">
    @include('partials.footer-tunnel')
</footer>

<script>
    $("#btn-confirm").attr("disabled", true);
    $(".spa-no-disabled").click(function() {
        $("#btn-confirm").attr("disabled", false);
        $("#btn-confirm").attr("title", null);
    })
</script>

@endsection
