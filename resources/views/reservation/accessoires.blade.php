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
                        <h2 class="h2-reservation">Ajouter des accessoires en plus ?</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }} - {{ $reservation->reservation_spa_libelle }}</a></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom array_spas" data-toggle="buttons">
                @if(count($accessoires) > 0)
                    @foreach($accessoires as $accessoire)
                        @if(!in_array($accessoire->accessoire_id, $reserv) && $accessoire->accessoire_stock > 0)
                        <label for="accessoire-{{$accessoire->accessoire_id}}" class="btn btn-checkbox-custom col-lg-3 col-md-4 col-12 accessoire-recap">
                            <input type="checkbox" name="accessoires[]" id="accessoire-{{$accessoire->accessoire_id}}" autocomplete="off" value="{{$accessoire->accessoire_id}}">
                            <div class="block-team-member-1 block-accessoires rounded radius" style="height: 100%;">
                                <figure class="m-0">
                                    <img src="{{url($accessoire->accessoire_chemin_img)}}" alt="Image" class="img-fluid rounded-circle">
                                </figure>
                                <div class="">
                                    <h3 class="font-size-18 text-primaire mt-1">{{$accessoire->accessoire_libelle}}</h3>
                                    <span class="d-block font-gray-5 font-size-14 mb-0">{{$accessoire->accessoire_prix}}€</span>
                                </div>

                            </div>
                        </label>
                        @else

                        @endif
                    @endforeach
                @endif
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

<script>
    // $("#btn-confirm").attr("value", "Continuer sans accessoire");
    // $(".accessoire-recap").click(function() {
    //     $("#btn-confirm").attr("value", "Continuer avec x accessoire(s)");
    // })
    // $(".no-pack").click(function() {
    //     $("#btn-confirm").attr("value", "Continuer sans accessoire");
    // })
</script>

@endsection
