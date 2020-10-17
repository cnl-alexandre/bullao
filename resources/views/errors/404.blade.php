@extends('layouts.article')

@section('pageTitle', 'Erreur 404 | '.env('APP_NAME'))

@section('content')

<section class="site-section bg-light" id="accepted-section" style="padding-top: 8rem;">
    <div class="container">

        <div class="row mb-5 d-flex align-items-center">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="text-center">
                    <img src="{{ url('/medias/img/systems/undraw_design_team_af2y.svg') }}" alt="Oups, mauvaise direction !" class="img-fluid" width="240px;" >
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-5" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing" style="padding: 2.5rem 3.15rem;">
                    <h4 class="text-center text-black mb-5">Oups, mauvaise direction !</h4>
                    <p class="text-center text-black mb-4">Nous sommes désolé de ne pas pouvoir afficher le contenu de cette page.</p>
                    <p class="text-center text-black mb-5">Aucun contenu n'est prevu ici, retentez votre chance depuis l'accueil 😉</p>
                    <p class="text-center">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-md text-white">Retour à l’accueil</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
