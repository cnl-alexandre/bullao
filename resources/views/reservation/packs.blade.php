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
                <div class="col-md-8">
                    <div class="block-heading" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">Ajouter de la décoration en plus ?</h2>
                        <p><a href="{{ url('/reservation/dates') }}" style="">Du {{ $reservation->dateDebut->format('d/m') }} au {{ $reservation->dateFin->format('d/m') }}</a></p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom array_spas" data-toggle="buttons">
                @if(count($packs) > 0)
                    @foreach($packs as $pack)
                        @if(!in_array($pack->pack_id, $reserv) && $pack->pack_stock > 0)
                        <label for="pack-{{ $pack->pack_id }}" class="btn btn-radio-custom col-lg-6 col-md-12 mb-3 pack-recap" id="label-pack-{{ $pack->pack_id }}" data-aos="fade-up">
                            <input type="radio" name="pack" id="pack-{{ $pack->pack_id }}" autocomplete="off" value="{{ $pack->pack_id }}">
                            <div class="block-team-member-1 text-left rounded d-flex input-col-step1-responsive radius">
                                <figure class="col-4">
                                    <img src="{{ url($pack->pack_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                                </figure>
                                <div>
                                    <h3 class="font-size-20 text-black">{{ $pack->pack_libelle }} - {{ $pack->pack_prix }}€</h3>
                                    <span class="d-block font-gray-6 font-size-14 mb-1"><?php echo $pack->pack_description; ?></span>
                                    <!-- {{ $pack->stock() }} -->
                                </div>
                            </div>
                        </label>
                        @endif
                    @endforeach
                @endif
                <label for="0" class="btn btn-radio-custom col-md-3 pack-recap" id="0" data-aos="fade-up">
                    <input type="radio" name="pack" id="0" autocomplete="off" value="">
                    <div class="block-team-member-1 text-center rounded d-flex" style="padding:30px;">
                        <span class="d-block font-gray-9 font-size-14 mx-auto">Je ne prends pas de pack</span>
                    </div>
                </label>
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
