@extends('layouts.app')

@section('pageTitle', 'Accueil | '.env('APP_NAME'))

@section('content')

<div class="owl-carousel slide-one-item">
    <div class="site-section-cover overlay img-bg-section">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-12 col-lg-8">
                    <h1 data-aos="fade-up" data-aos-delay="">Prenez le temps <br>de vous détendre</h1>
                    <p class="mt-3 mb-4" data-aos="fade-up" data-aos-delay="100">La location personnalisée de spas-jacuzzi<br>à Marne-la-Vallée et Paris.</p>
                    <p data-aos="fade-up" data-aos-delay="200"><a href="{{ url('/reservation') }}" class="btn btn-outline-white border-w-2 btn-md">Réserver un spa-jacuzzi</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="services-section mb-2" id="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 services-img services-img-1" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Votre spa à domicile</h2>
                    <p class="text-justify">
                        En couple, en famille ou entre amis, profitez d’un moment de détente
                        inoubliable sans bouger de chez vous. Dans le respect de mesures sanitaires très strictes,
                        notre équipe vous garantie une installation saine et sécurisée pour une tranquillité
                        d’esprit inégalée. Vous n’avez rien à penser, nous nous occupons de tout.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch mt-lg-5 mt-3">
                <div class="col-12 col-lg-6 services-img services-img-2 order-lg-2" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3 order-lg-1" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Une soirée sur-mesure</h2>
                    <p class="text-justify">
                        Grâce à nos packs à thèmes et nos accessoires, concevez vous-même votre soirée.
                        Imaginez, associez et offrez-vous le luxe d’un spa à domicile pour une occasion spéciale ou tout simplement un
                        instant à deux, nous vous apportons la touche de relaxation qui fait la différence.
                    </p>
                    <p class="text-center mt-4">
                        <a href="{{ url('/reservation') }}" class="btn btn-primary bg-action btn-md text-white">Réserver un spa-jacuzzi</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light" style="padding-bottom:3rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
                <div class="custom-media">
                    <div class="icon mb-3">
                        <span><img src="{{ url('medias/img/pictos/003-checked.svg') }}" alt="" height="45px"></span>
                    </div>
                    <h3 class="font-size-18 text-black mb-2">Réservation</h3>
                    <p>Vous rêvez de vous détendre en couple ou en famille chez vous ?
                    Réservez les dates qui vous conviennent ainsi que le spa-jacuzzi désiré sur notre site bullao.</p>

                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-media">
                    <div class="icon mb-3">
                        <span><img src="{{ url('medias/img/pictos/004-settings.svg') }}" alt="" height="45px"></span>
                    </div>
                    <h3 class="font-size-18 text-black mb-2">Pose et retrait</h3>
                    <p>Afin de vous garantir la meilleure expérience, on se charge
                    de la livraison et de la configuration chez vous en 1h. Nous avons adapté un protocole sanitaire.</p>

                </div>
            </div>
            <!-- <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-media">
                    <div class="icon mb-3">
                        <span><img src="{{ url('medias/img/pictos/002-covid.svg') }}" alt="" height="45px"></span>
                    </div>
                    <h3 class="font-size-18 text-black mb-2">Hygiène</h3>
                    Bullao vous assure une hygiène et une sécurité optimale.
                    Tout le matériel est soigneusement nettoyé et désinfecté avant
                    et après chaque utilisation. Nous travaillons dans le respect des règles sanitaires et
                    des gestes barrières.
                </div>
            </div> -->
            <!-- <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
                <div class="custom-media">
                    <div class="icon mb-3">
                        <span><img src="{{ url('medias/img/pictos/006-compass.svg') }}" alt="" height="45px"></span>
                    </div>
                    <h3 class="font-size-18 text-black mb-2">Localisation</h3>
                    Pour le moment, Bullao intervient sur l’ensemble du
                    secteur de Marne-la-Vallée et de Paris. Nous espérons desservir prochainement toute la
                    région Île-de-France.
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-media">
                    <div class="icon mb-3">
                        <span><img src="{{ url('medias/img/pictos/005-paint-brush.svg') }}" alt="" height="45px"></span>
                    </div>
                    <h3 class="font-size-18 text-black mb-2">Personnalisation</h3>
                    Une demande particulière ? Façonnez votre instant spa-jacuzzi à votre
                    image ! Bullao vous propose différents thèmes et accessoires pour une expérience
                    inoubliable et sur-mesure.
                </div>
            </div> -->
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-media">
                    <div class="icon mb-3">
                        <span><img src="{{ url('medias/img/pictos/001-photo-camera.svg') }}" alt="" height="45px"></span>
                    </div>
                    <h3 class="font-size-18 text-black mb-2">Partage</h3>
                    <p>Une fois réservé, il ne vous reste plus qu’à attendre encore un peu avant de profiter
                    de votre spa-jacuzzi.
                    Venez partager votre expérience sur Facebook et Instagram !</p>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <img src="{{ url('medias/img/home/explication.png') }}" alt="" style="width: inherit;max-width: 500px;">
            </div>
            <div class="col-12 col-md-6">
                <h3 class="text-black mb-3">Comment ça se passe ?</h3>
                <p>Vous devez surement vous demander quelles sont les étapes à vérifier pour être sûr de votre coup !
                Pour une soirée réussie, voici les derniers détails obligatoires avant de vous lancer </p>
                <ul class="list-unstyled ul-check success">
                    <li>La pose du spa dure environ 1h à 1h30 suivant votre réservation et le retrait du spa dure environ 1h</li>
                    <li>Un espace de 2,5m sur 2,5m soit un peu plus de 6m2 pour un spa 4 places et un espace de 3m sur 3m soit 9m2 pour un spa 6 places</li>
                    <li>Une prise électrique murale à 20m maximum du spa</li>
                    <li>Une arrivée d’eau extérieure ou une prise d’eau de salle de bain à 20m maximum du spa</li>
                </ul>
            </div>
        </div>
    </div>
</section> -->

<div class="site-section">
    <div class="services-section" id="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 services-img services-img services-img-4" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-0" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Votre spa à domicile</h2>
                    <p class="text-justify">
                        Pour le moment, tous les spas-jacuzzi Bullao sont disponibles à la
                        location privée ou professionnelle à Marne-la-Vallée et à Paris.
                    </p>
                    <ul class="ul-check primary list-unstyled mt-4">
                        <li>Location de 1 à 5 jours</li>
                        <li>5 spas différents, packs et accessoires</li>
                        <li>Respect des mesures sanitaires</li>
                        <li>Désinstallation rapide</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mb-4 justify-content-center text-center">
            <div class="col-md-7">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2 class="font-size-28 text-black">Nos tarifs</h2>
                    <p>Les spas-jacuzzi (4 places ou 6 places) sont disponibles à la location de
                      24h (1 soirée) à 10 jours :</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-delay="">
                <div class="block-produits d-flex flex-column">

                    <ul class="nav nav-pills mb-3 mx-auto" id="pills-tab" role="tablist">
                        <li class="nav-item mx-auto">
                            <a class="nav-link active" id="pills-sahara4-tab" data-toggle="pill" href="#pills-sahara4" role="tab" aria-controls="pills-sahara4" aria-selected="true">Sahara 4p</a>
                        </li>
                        <li class="nav-item mx-auto">
                            <a class="nav-link" id="pills-navy4-tab" data-toggle="pill" href="#pills-navy4" role="tab" aria-controls="pills-navy4" aria-selected="false">Navy 6p</a>
                        </li>
                        <li class="nav-item mx-auto">
                            <a class="nav-link" id="pills-baltik4-tab" data-toggle="pill" href="#pills-baltik4" role="tab" aria-controls="pills-baltik4" aria-selected="false">Baltik 4p</a>
                        </li>
                        <li class="nav-item mx-auto">
                            <a class="nav-link" id="pills-baltik6-tab" data-toggle="pill" href="#pills-baltik6" role="tab" aria-controls="pills-baltik6" aria-selected="false">Baltik 6p</a>
                        </li>
                        <li class="nav-item mx-auto">
                            <a class="nav-link" id="pills-carbone6-tab" data-toggle="pill" href="#pills-carbone6" role="tab" aria-controls="pills-carbone6" aria-selected="false">Carbone 6p</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active " id="pills-sahara4" role="tabpanel" aria-labelledby="pills-sahara4-tab">
                            <div class="row align-items-center">
                                <div class="col-10 col-md-6 col-lg-7 mx-auto">
                                    <img src="{{url('medias/img/home/spa-sahara-4-min.png')}}" class="img-produit" alt="">
                                </div>
                                <div class="col-10 col-md-5 col-lg-5 mx-auto">
                                    <h4>Spa Sahara 4 personnes </h4>
                                    <ul class="ul-check primary list-unstyled mt-4">
                                        <li>120 diffuseurs de bulles</li>
                                        <li>Traitement au Braume inclus</li>
                                        <li>196cm de diamètre et 71cm de hauteur</li>
                                        <li>Jusqu'à 795L d'eau (~3,5€)</li>
                                        <li><b>90€</b> la première soirée et <br><b>30€</b> par soir en plus</li>
                                    </ul>
                                    <p class="text-center mt-1">
                                          <a href="{{ url('/reservation') }}" class="btn btn-primary bg-action btn-md text-white">Réserver un spa-jacuzzi</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row tab-pane fade" id="pills-navy4" role="tabpanel" aria-labelledby="pills-navy4-tab">
                            <div class="row align-items-center">
                                <div class="col-10 col-md-6 col-lg-7 mx-auto">
                                    <img src="{{url('medias/img/home/spa-navy-4-min.png')}}" class="img-produit" alt="">
                                </div>
                                <div class="col-10 col-md-5 col-lg-5 mx-auto">
                                    <h4>Spa Navy 4 personnes </h4>
                                    <ul class="ul-check primary list-unstyled mt-4">
                                        <li>140 diffuseurs de bulles</li>
                                        <li>Traitement au Braume inclus</li>
                                        <li>196cm de diamètre et 71cm de hauteur</li>
                                        <li>Jusqu'à 795L d'eau (~3,5€)</li>
                                        <li><b>90€</b> la première soirée et <br><b>30€</b> par soir en plus</li>
                                    </ul>
                                    <p class="text-center mt-1">
                                        <a href="{{ url('/reservation') }}" class="btn btn-primary bg-action btn-md text-white">Réserver un spa-jacuzzi</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                      <div class="tab-pane fade" id="pills-baltik4" role="tabpanel" aria-labelledby="pills-baltik4-tab">
                          <div class="row align-items-center">
                              <div class="col-10 col-md-6 col-lg-7 mx-auto">
                                  <img src="{{url('medias/img/home/spa-baltik-4-min.png')}}" class="img-produit" alt="">
                              </div>
                              <div class="col-10 col-md-5 col-lg-5 mx-auto">
                                  <h4>Spa Baltik 4 personnes </h4>
                                  <ul class="ul-check primary list-unstyled mt-4">
                                      <li>140 diffuseurs de bulles</li>
                                      <li>Traitement au Braume inclus</li>
                                      <li>196cm de diamètre et 71cm de hauteur</li>
                                      <li>Jusqu'à 795L d'eau (~3,5€)</li>
                                      <li><b>90€</b> la première soirée et <br><b>30€</b> par soir en plus</li>
                                  </ul>
                                  <p class="text-center mt-1">
                                      <a href="{{ url('/reservation') }}" class="btn btn-primary bg-action btn-md text-white">Réserver un spa-jacuzzi</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="pills-baltik6" role="tabpanel" aria-labelledby="pills-baltik6-tab">
                          <div class="row align-items-center">
                              <div class="col-10 col-md-6 col-lg-7 mx-auto">
                                  <img src="{{url('medias/img/home/spa-baltik-6-min.png')}}" class="img-produit" alt="">
                              </div>
                              <div class="col-10 col-md-5 col-lg-5 mx-auto">
                                  <h4>Spa Baltik 6 personnes </h4>
                                  <ul class="ul-check primary list-unstyled mt-4">
                                      <li>170 diffuseurs de bulles</li>
                                      <li>Traitement au Braume inclus</li>
                                      <li>218cm de diamètre et 71cm de hauteur</li>
                                      <li>Jusqu'à 1098L d'eau (~4,5€)</li>
                                      <li><b>120€</b> la première soirée et <br><b>40€</b> par soir en plus</li>
                                  </ul>
                                  <p class="text-center mt-1">
                                      <a href="{{ url('/reservation') }}" class="btn btn-primary bg-action btn-md text-white">Réserver un spa-jacuzzi</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="pills-carbone6" role="tabpanel" aria-labelledby="pills-carbone6-tab">
                          <div class="row align-items-center">
                              <div class="col-10 col-md-6 col-lg-7 mx-auto">
                                  <img src="{{url('medias/img/home/spa-carbone-6-min.png')}}" class="img-produit" alt="">
                              </div>
                              <div class="col-10 col-md-5 col-lg-5 mx-auto">
                                  <h4>Spa Carbone 6 personnes </h4>
                                  <ul class="ul-check primary list-unstyled mt-4">
                                      <li>140 diffuseurs de bulles</li>
                                      <li>BONUS : Jets massants </li>
                                      <li>Traitement au Braume inclus</li>
                                      <li>218cm de diamètre et 71cm de hauteur</li>
                                      <li>Jusqu'à 1098L d'eau (~4,5€)</li>
                                      <li><b>160€</b> la première soirée et <br><b>40€</b> par soir en plus</li>
                                  </ul>
                                  <p class="text-center mt-1">
                                      <a href="{{ url('/reservation') }}" class="btn btn-primary bg-action btn-md text-white">Réserver un spa-jacuzzi</a>
                                  </p>
                              </div>
                          </div>
                      </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</section>

<!-- <section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-9" style="background-color:#F2F2F2;margin: auto;">
ca
            </div>
        </div>

    </div>
</section> -->

<section class="site-section bg-light" id="fac-section">
    <div class="container">
        <div class="row site-section" id="faq-section">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title font-size-22 text-black">Encore un doute ?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h6 mb-2">Où installer mon spa-jacuzzi ?</h3>
                  <p>
                      Pour une installation optimale, vous devez disposer d’un espace libre de 2
                      mètres sur 2 mètres avec une surface en béton sous le sol, d'un point d'eau avec un
                      robinet extérieur ou de cuisine et une prise électrique à 20 mètres de distance
                      maximum.
                  </p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h6 mb-2">Quand est-ce que mon spa-jacuzzi sera prêt ?</h3>
                  <p>
                      Nous savons que vous êtes impatient de tester votre jacuzzi. En
                      règle générale, nous prenons une heure pour installer et vérifier le bon fonctionnement
                      du matériel. Le spa et les accessoires Bullao sont désinfectés avant et après la
                      réservation.
                  </p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h6 mb-2">À quel moment se fait l’installation ?</h3>
                  <p>
                      Pour profiter au maximum de votre spa-jacuzzi, Bullao recommande une
                      installation en début de journée afin que l'eau chauffe rapidement et qu’elle atteigne la
                      température idéale. Vous pourrez ainsi vous détendre tout le reste de la journée et de la
                      nuit.
                  </p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h6 mb-2">Quelles sont vos mesures face au Covid-19 ?</h3>
                  <p>
                      L’équipe Bullao est très attentive au respect des gestes barrières et
                      désinfecte l'ensemble du matériel utilisé et des accessoires avant et après chaque
                      utilisation. Pour limiter la propagation du virus, nous vous conseillons de limiter le
                      nombre de personnes dans les spas et de profiter de la soirée en petit comité.
                  </p>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">Quelles sont vos conditions de paiement ?</h3>
                    <p>
                        Pour des raisons pratiques et de sécurité, nous vous proposons le
                        paiement de votre réservation par carte bancaire ! Soyez rassurés, Bullao travaille dans le respect de vos données
                        personnelles.
                    </p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">Pourquoi Bullao et pas un autre ?</h3>
                    <p>
                        Fini les locations douteuses sur les réseaux sociaux, avec Bullao, vous avez
                        la garantie d'avoir un service de confiance sur-mesure, une hygiène irréprochable et une
                        sécurité technique et sanitaire reconnue !
                    </p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">Comment faire si je dois annuler ma réservation ?</h3>
                    <p>
                        Les imprévus, ça arrive à tout le monde ! En cas d’annulation, contactez
                        notre service client soit via notre messagerie instantanée, par téléphone ou par mail
                        à support@bullao.com. Vous aurez la possibilité d’annuler ou de déplacer votre location
                        à une date ultérieure (sous réserve de disponibilités).
                    </p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">Quelles sont vos conditions de remboursements ?</h3>
                    <p>
                        En cas d’annulation, nous remboursons l’intégralité du montant de la
                        réservation jusqu’à 72h (3 jours) avant la date prévue. Si vous souhaitez annuler après ce
                        délai, nous ne remboursons qu’à hauteur de 50% du montant de la réservation. Le
                        remboursement sera effectué dans un délai de 10 jours par virement bancaire.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="site-section" id="contact-section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="block-heading-1">
                    <span>Vous n’êtes plus qu’à une bulle du bonheur...</span>
                    <h2 class="font-size-22 text-black">Nous contacter</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3  d-flex justify-content-around">
            <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ url('/medias/img/home/messagerie.webp') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                <h2 class="font-size-18 text-black">Des réponses à vos questions</h2>
                <p>Pour vous aider à réaliser toutes vos envies, l’équipe Bullao se tient à votre
entière disposition. Notre module de messagerie instantanée (en bas à droite de l’écran)
vous permet de nous contacter à tout moment pour concevoir ensemble l’expérience
de vos rêves.</p>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <div class="row mt-2">
            <div class="col-12 col-md-6 mx-auto">
                <h4 class="mb-3 font-size-22 text-black">Vos précédentes réservations</h4>
                  Vous souhaitez recevoir un résumé ? Renseignez votre email et vous recevrez le détail des précédentes réservations.
            </div>
            <div class="col-12 col-md-5 mx-auto">
                <form class="" action="{{ url('/account/send-reservations') }}" method="post">
                    <div class="input-group mt-4 mb-3">
                        {{ csrf_field() }}
                        <input type="email" name="email" class="form-control" placeholder="Adresse mail">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(function(){
    $("#carouselExampleCaptions").carousel('pause');
});
</script>

@if(Session::has('success'))
    <script>alert("{!! Session::get('success') !!}");</script>
    {{ Session::forget('success') }}
@endif
@if(Session::has('error'))
    <script>alert("{!! Session::get('error') !!}");</script>
    {{ Session::forget('error') }}
@endif

@endsection
