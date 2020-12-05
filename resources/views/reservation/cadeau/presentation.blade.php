@extends('layouts.app')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<!-- <div class="site-section-cover overlay inner-page bg-light article-img-noel-1" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center" style="height: 255px">
            <div class="col-lg-10">
                <div class="box-shadow-content">
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="owl-carousel slide-one-item">
    <div class="site-section-cover overlay img-bg-section article-img-noel-1" style="min-height: auto; height: 260px;">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center" style="height: 140px;min-height: 280px;">
                <div class="col-md-12 col-lg-8">
                    <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">La carte cadeau</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="site-section-cover overlay inner-page bg-light article-img-noel-1" data-aos="fade">

      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-lg-10">

            <div class="box-shadow-content">
              <div class="block-heading-1">
                <span class="d-block mb-3 text-white"  data-aos="fade-up">April 9th, 2019 <span class="mx-2 text-primary">&bullet;</span> by James Miller</span>
                <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">How To Find Gold In Mining</h1>
              </div>


            </div>
          </div>
        </div>
      </div>

    </div> -->



<div class="site-section picker-section" id="datepicker-section">
    <div class="container">
        <div class="row d-flex no-gutters align-items-stretch mt-2">
            <div class="col-12 col-lg-5 services-img radius order-lg-2" data-aos="fade" data-aos-delay="">
                <img src="{{ url('medias/img/cadeaux/paquet.png') }}" width="500px" alt="">
            </div>
            <div class="col-lg-6 mx-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade" data-aos-delay="">
                <h2 class="mb-3 font-size-28 text-black">La carte cadeau qui fera plasisir !</h2>
                <p class="text-justify">
                    Ne vous trompez pas cette année, cela nous est tous arrivé !
                    Vous allez faire sensation avec cette carte cadeau pour une réservation Bullao
                </p>
                <div class="row mt-4">
                    <div class="col-6 d-flex flex-column">
                        <img src="{{ url('/medias/img/pictos/gift.svg') }}" class="mb-2" width="30px" alt="">
                        Recevez la carte cadeau<br> au format physique
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <img src="{{ url('/medias/img/pictos/time.svg') }}" class="mb-2" width="30px" alt="">
                        La carte cadeau <br> est valable 24 mois
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<form class="site-step-1" action="{{ url('/cartecadeau/offrir') }}" method="post">

    {{ csrf_field() }}

    <div class="site-section bg-light" id="packs-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation font-size-28 text-action" style="color:red!important">Choisissez votre carte cadeau</h2>
                        <p>Une fois votre carte cadeau sélectionnée, cliquez sur le bouton en dessous.</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom array_packs" data-toggle="buttons">

                <label for="carte-cadeau-90" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 carte-recap card-select" data-aos="fade-up" rel="Carte Détente" rel2="90">
                    <input type="radio" name="carte" id="carte-cadeau-90" autocomplete="off" value="Carte Détente">
                    <div class="block-team-member-1 text-left rounded d-flex input-col-step1-responsive radius">
                        <div>
                            <h3 class="font-size-20 text-primaire">Carte Détente</h3>
                            <img src="{{ url('medias/img/spas/spa-sahara-4.png') }}" alt="" style="width: 25%;">
                            <span class="d-block font-size-15 mb-1">Offrez une soirée relaxante avec un spa pour 2 à 4 personnes </span>
                            <p class="font-gray-6 font-size-15 mb-0">Carte cadeau de 90€</p>
                        </div>

                    </div>
                </label>
                <label for="carte-cadeau-120" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 carte-recap card-select" data-aos="fade-up" rel="Carte Grand Bain" rel2="120">
                    <input type="radio" name="carte" id="carte-cadeau-120" autocomplete="off" value="Carte Grand Bain">
                    <div class="block-team-member-1 text-left rounded d-flex input-col-step1-responsive radius">
                        <div>
                            <h3 class="font-size-20 text-primaire">Carte Grand Bain</h3>
                            <img src="{{ url('medias/img/spas/spa-baltik-6.png') }}" alt="" style="width: 25%;">
                            <span class="d-block font-size-15 mb-1">Offrez une soirée grand bain avec un spa jusqu'à 6 personnes</span>
                            <p class="font-gray-6 font-size-15 mb-0">Carte cadeau de 120€</p>
                        </div>

                    </div>
                </label>
                <label for="carte-cadeau-140" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 carte-recap card-select" data-aos="fade-up" rel="Carte Sensation" rel2="140">
                    <input type="radio" name="carte" id="carte-cadeau-140" autocomplete="off" value="Carte Sensation">
                    <div class="block-team-member-1 text-left rounded d-flex input-col-step1-responsive radius">
                        <div>
                            <h3 class="font-size-20 text-primaire">Carte Sensation</h3>
                            <img src="{{ url('medias/img/spas/spa-carbone-6.png') }}" alt="" style="width: 25%;">
                            <span class="d-block font-size-15 mb-2">Offrez une soirée grand bain massant avec un spa 6 personnes</span>
                            <p class="font-gray-6 font-size-15 mb-0">Carte cadeau de 140€</p>
                        </div>
                    </div>
                </label>
                <input type="hidden" name="libelle" id="libelle" value="">
                <input type="hidden" name="prix" id="prix" value="">
            </div>
            <p class="text-center mt-1">
                <input type="submit" id="btn-confirm" value="Offrir une carte cadeau" class="btn btn-primary bg-action btn-md text-white">
            </p>
        </div>
    </div>

</form>

<footer style="background-color:#ffffff;">
    @include('partials.footer-tunnel')
</footer>

<script>
    $(".carte-recap").click(function() {
        var libelle = $(this).attr('rel');
        var prix = $(this).attr('rel2');
        $("#libelle").val(libelle);
        $("#prix").val(prix);
        // console.log(libelle); console.log(prix);
    })

    $("#btn-confirm").attr("disabled", true);
    $(".card-select").click(function() {
        $("#btn-confirm").attr("disabled", false);
    });
</script>

@endsection
