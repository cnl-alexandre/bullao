@extends('layouts.reservation')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')



<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-md-7">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Nos prix</h2>
                    <p>La prestation se base sur un délai d'utilisation de 24h (1 soirée), pour cela nous privilégions l'installation du jacuzzi en début d'après-midi.</p>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="pricing">
                    <h3 class="text-center text-black">1 soirée</h3>
                    <div class="price text-center mb-4 ">
                        <span><span>90€</span></span>
                    </div>
                    <ul class="list-unstyled ul-check success mb-4">
                        <li>Spa intex jusqu'à 4 places</li>
                        <li>120 à 140 diffuseurs de bulles</li>
                        <li>2 appui-têtes Classique</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                    </ul>
                    <ul class="list-unstyled mb-4 text-center">
                        <li>-10% du lundi au jeudi !</li>
                    </ul>
                    <p class="text-center">
                        <a href="{{ url('/reservation') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing">
                    <h3 class="text-center text-black">1 soirée XL</h3>
                    <div class="price text-center mb-4 ">
                        <span><span>130€</span></span>
                    </div>
                    <ul class="list-unstyled ul-check success mb-4">
                        <li>Spa intex jusqu'à 6 places</li>
                        <li>170 diffuseurs de bulles</li>
                        <li>2 appui-têtes Deluxe</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                    </ul>
                    <ul class="list-unstyled mb-4 text-center">
                        <li>-10% du lundi au jeudi !</li>
                    </ul>
                    <p class="text-center">
                        <a href="{{ url('/reservation') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="site-section" id="team-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-7 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Quand cela vous fait envie ?</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
        </div>
    </div>
</div>


<div class="site-section bg-light" id="team-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-7 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Quel spa souhaitez-vous</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                  <figure>
                      <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                  </figure>
                  <h3 class="font-size-20 text-black">Spa Sahara</h3>
                  <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Couleur sable<br> idéal pour les petits intérieurs</span>
              </div>
          </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Spa Navy</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Couleur bleu nuit<br> idéal pour une soirée</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Spa Baltik</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Couleur gris broisé<br> idéal pour l'extérieur</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section" id="team-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-7 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Personnalisez votre soirée !</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                  <figure>
                      <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                  </figure>
                  <h3 class="font-size-20 text-black">Pack 1</h3>
                  <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
              </div>
          </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Pack 2</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Pack 3</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light" id="team-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-7 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Complétez la décoration !</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                  <figure>
                      <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                  </figure>
                  <h3 class="font-size-20 text-black">Accessoire 1</h3>
                  <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
              </div>
          </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Accessoire 2</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Accessoire 3</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                  <figure>
                      <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                  </figure>
                  <h3 class="font-size-20 text-black">Accessoire 4</h3>
                  <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
              </div>
          </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Accessoire 5</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Accessoire 6</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
