@extends('layouts.app')

@section('pageTitle', 'Accueil | '.env('APP_NAME'))

@section('content')

<div class="container">
    <div class="d-flex align-items-center flex-column home-header mt-xl-4 mt-md-3 mt-2 mb-xl-5 mb-md-5 mb-4">
        <div class="navbar navbar-expand-lg navbar-light mb-auto p-2 mt-xl-4 mt-md-4 mt-sm-4 mt-0 pt-3 pb-3 pl-3 pr-3 d-flex align-self-center header-width card-shadow">
            <a class="navbar-brand pr-2" href="{{ url('/') }}">
                <img src="{{ url('/medias/img/logo.svg') }}" class="header-logo" loading="eager" alt="Logo agence immobilière mf-immo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-flex align-self-center pl-5" style="flex-direction: row;">
                    <li class="nav-item  pl-2">
                        <a href="{{ url('/annonces/vente') }}" class="nav-link">Acheter</a>
                    </li>
                    <li class="nav-item  pl-2">
                        <a href="{{ url('/agence/estimation') }}" class="nav-link">Estimer</a>
                    </li>
                    <li class="nav-item  pl-2">
                        <a href="{{ url('/annonces/location') }}" class="nav-link">Louer</a>
                    </li>
                    <li class="nav-item  pl-2">
                        <a href="{{ url('/agence/contact') }}" class="nav-link">Contacter</a>
                    </li>
                    <li>
                        <div class="opinion-system-widget-company-rating" data-os-company-id="10538" style="margin-left: 20px ;width: max-content;"></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="home-titres">
            <p class="mb-1">Présenté par Mylène et Franck</p>
            <h1>Achat, vente et location de maisons et d'appartements autour de Vaires et Brou</h1>
        </div>
        <div class="home-option p-2 mb-xl-4 mb-sm-4 mb-2 d-flex">
            <form class="" action="{{ url('/annonces/vente') }}" method="post">
              {{ csrf_field() }}
              <div class="d-flex flex-row home-search card-shadow">
                  <div class="form-group mr-sm-2 mr-0">
                      <label for="type">Je recherche</label>
                      <select id="type" name="type" class="form-control">
                          <option value="all">Tous les biens</option>
                          @if(count($types) > 0)
                              @foreach($types as $type)
                                  <option value="{{ $type->type_id }}">{{ $type->type->type_libelle }}</option>
                              @endforeach
                          @endif
                      </select>
                  </div>
                  <div class="form-group mr-sm-2 mr-0">
                    <label for="secteur" class="responsiveMobile-hidden">Vers</label>
                    <select id="secteur" name="ville" class="form-control">
                        <option value="all">Tout Marne-la-Vallée</option>
                        @if(count($villes) > 0)
                            @foreach($villes as $ville)
                                <option value="{{ $ville->logement_ville }}">{{ $ville->logement_ville }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="form-group mr-sm-2 mr-0">
                      <input class="btn text-center" type="submit" value="GO">
                  </div>
              </div>
            </form>
            <div class="home-vendeur card-shadow pt-2 pb-2 pl-2 pr-2 ml-2">
                <div>
                    <p class="text-label responsiveMobile-hidden" style="margin-top: 5px;margin-bottom: 8px;">Vous pouvez aussi</p>
                    <a href="{{ url('/agence/estimation') }}" class="btn bg-green text-white cta-radius form-control">Vendre votre bien</a>
                </div>

            </div>
        </div>
    </div>
    @if(count($annoncesExclu) > 0)
        <div class="home-caroussel mb-4">
            <h2>Les exclusivités de l'agence</h2>
            @include('partials.customer.annonce.carousel', [
                'annonces'  => $annoncesExclu,
                'linkMore'  => '/annonces/vente'
            ])
        </div>
    @endif

    <div class="row home-agence d-flex justify-content-between mb-5">
        <div class="info-agence card-shadow card-localisation">
            <h6><strong>Ouvert du mardi au samedi</strong></h6>
            <p class="card-text localisation-texte">
                De 9h30 à 12h30 et 14h00 à 19h00
            </p>
            <h6 class="mt-1 mb-1"><strong>Brou sur Chantereine</strong></h6>
            <p class="card-text localisation-texte mb-4">
                22 avenue Jean Jaurès
                <br>
                (à la limite de Vaires sur Marne)
            </p>
            <div class="text-center">
                <a href="{{ url('/agence/contact') }}" class="bg-orange cta-radius text-white pt-2 pb-2 pr-4 pl-4">Contacter l'agence</a>

            </div>
        </div>
        <div class="rating-google">
            <a target="_blank" href="{{ url('https://www.google.com/search?client=opera&q=M%26F+Immobilier&sourceid=opera&ie=UTF-8&oe=UTF-8') }}">
                <img src="{{ url('/medias/img/btn-google.svg') }}" class="mt-3 mr-3" style="visibility:hidden;" alt="Lien Google M&F-Immobilier">
            </a>
        </div>
    </div>

    @if(count($annoncesVille1) > 0)
        <div class="home-caroussel mb-5">
            <h2>Les annonces à {{ Session::get('Parametres')['carousel_ville_1'] }}</h2>
            @include('partials.customer.annonce.carousel', [
                'annonces'  => $annoncesVille1,
                'linkMore'  => '/annonces/vente'
            ])
        </div>
    @endif

    <div class="row justify-content-center mb-5">
        <div class="col-lg-11 col-md-12 col-sm-12 col-11 agence-bordered">
            <div class="row d-flex justify-content-between align-items-center py-xl-5 px-xl-4 py-md-5 px-md-3 py-sm-4 py-4 px-3">
                <div class="col-lg-3 col-md-6 align-self-center">
                    <img src="{{ url('/medias/img/agence/esti-house.svg') }}" class="align-self-center" style="width: 240px;" alt="Découvrir notre agence M&F-Immobilier">
                </div>
                <div class="col-lg-5 col-md-6 media-body agence-content px-xl-4 px-3 pt-sm-4 pt-4">
                    <h5 class="mt-0 mb-1 mb-xl-2 mb-md-2">Découvrez notre agence</h5>
                    <p class="mb-0 text-justify">M&F-Immobilier est une agence indépendante présentée par Mylène Gicquel et Franck Caldirola sur le secteur de Brou-sur-Chantereine, Vaires-sur-Marne, Chelles et les communes environnantes.</p>
                </div>
                <div class="col-lg-3 col-md-12 pt-4 pt-sm-4">
                    <div class="d-flex justify-content-around">
                      <a href="{{ url('/agence/estimation') }}" class="bg-orange cta-radius text-white pt-2 pb-2 pr-4 pl-4">Estimer</a>
                      <a href="{{ url('/annonces/vente') }}" class="bg-green cta-radius text-white pt-2 pb-2 pr-4 pl-4">Acheter</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if(count($annoncesVille2) > 0)
        <div class="home-caroussel mb-5">
            <h2>Les annonces à {{ Session::get('Parametres')['carousel_ville_2'] }}</h2>
            @include('partials.customer.annonce.carousel', [
                'annonces'  => $annoncesVille2,
                'linkMore'  => '/annonces/vente'
            ])
        </div>
    @endif

    <div class="row justify-content-center mb-5">
        <div class="opinion-system-widget-company-rating-detail" data-os-company-id="10538"></div>
    </div>
</div>

@endsection
