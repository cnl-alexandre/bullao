@extends('layouts.app')

@section('pageTitle', 'Accueil | '.env('APP_NAME'))

@section('content')

<div class="owl-carousel slide-one-item">
    <div class="site-section-cover overlay img-bg-section" style="background-image: url({{ url('medias/img/hero_3.jpg') }}); " >
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-12 col-lg-8">
                    <h1 data-aos="fade-up" data-aos-delay="">Prenez le temps de vous détendre</h1>
                    <p class="mt-3 mb-4" data-aos="fade-up" data-aos-delay="100">Nouveau à Marne-la-Vallée et Paris<br>Bullao : Location de spa - jaccuzi</p>
                    <p data-aos="fade-up" data-aos-delay="200"><a href="{{ url('/reservation') }}" class="btn btn-outline-white border-w-2 btn-md">Réserver</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="block__73694 mb-2" id="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 block__73422" style="background-image: url({{ url('medias/img/img_1.jpg') }});" data-aos="fade" data-aos-delay="">
                </div>
                <!-- <img class="col-12 col-lg-6 block__73422" src="{{ url('medias/img/img_1.jpg') }}" alt="" data-aos="fade-up" data-aos-delay=""> -->
                <div class="col-lg-5 ml-auto p-lg-5 mt-4 mt-lg-0" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 text-black">Louez votre spa chez vous</h2>
                    <p>Profitez de vous retrouver en couple, en famille ou même en famille lors d'une soirée inoubliable à domicile ! Nous intervenons chez vous et en respectant des mesures sanitaires très strictes pour vous garantir un moment sain en tout sécurité.</p>
                    <p>Vous êtes maître de votre soirée avec nos packs thématisés et nos accessoires qui savent faire la différence :</p>
                    <ul class="ul-check primary list-unstyled mt-5">
                        <li>Lorem ipsum dolor.</li>
                        <li>Quod, amet. Provident.</li>
                        <li>Quo, adipisci, quis.</li>
                        <li>Cumque perspiciatis, blanditiis?</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="block__73694">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 block__73422 order-lg-2" style="background-image: url({{ url('medias/img/img_2.jpg') }});" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mr-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 text-black">Créez votre soirée</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus id dignissimos nemo minus perspiciatis ullam itaque voluptas iure vero, nesciunt unde odit aspernatur distinctio, maiores facere officiis. Cum, esse, iusto?</p>
                    <p>(Ciblage) Notre service se propose tout aussi bien pour les particuliers comme les professionnels à Marne-la-Vallée pour l'instant.</p>
                    <ul class="ul-check primary list-unstyled mt-5">
                        <li>Lorem ipsum dolor.</li>
                        <li>Quod, amet. Provident.</li>
                        <li>Quo, adipisci, quis.</li>
                        <li>Cumque perspiciatis, blanditiis?</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-mining"></span>
                    </div>
                    <h3 class="mb-3">Réservation</h3>
                    Pour le moment nous acceptons les réservations par téléphone, par mail et par la messagerie instantannée. Vous obtiendrez une réponse sous peu de temps.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-gold-ingots"></span>
                    </div>
                    <h3 class="mb-3">Installation</h3>
                    On s'occupe de tout ! La procédure prend environ 1h pour que le spa soit mis en place à votre domicile. Nous recommandons une installation en début d'après-midi.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-wagon"></span>
                    </div>
                    <h3 class="mb-3">Hygiène</h3>
                    Les jacuzzis ainsi que les accessoires sont nettoyés et désinfectés après chaque utilisation pour vous assurer une qualité de prestation propre et saine.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-refinery"></span>
                    </div>
                    <h3 class="mb-3">Localisation</h3>
                    Nous agissons pour le moment sur le secteur Marne-la-Vallée en priorité du fait de notre situation géographique, nous comptons desservir d'autres secteurs rapidement.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-blacksmith"></span>
                    </div>
                    <h3 class="mb-3">Personnalisation</h3>
                    Ajustez le thème de votre soirée spa ! Pour cela nous vous proposons plusieurs thèmes et nous sommes prêt à fournir une expérience sur-mesure à votre demande.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-crucible"></span>
                    </div>
                    <h3 class="mb-3">bonheur</h3>
                    Une fois votre soirée réservée, détendez-vous et on s'occupe du reste !
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-md-7">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Nos prix</h2>
                    <p>La prestation se base sur un délai d'utilisation de 24h (1 soirée), pour cela nous privilégions l'installation du jacuzzi en fin de matinée ou début d'après-midi.</p>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="pricing mb-2">
                    <h3 class="text-center text-black">1 soirée (24h)</h3>
                    <div class="price text-center mb-4 ">
                        <span><span>90€</span></span>
                    </div>
                    <ul class="list-unstyled ul-check success mb-4">
                        <li>Spa intex jusqu'à 4 places</li>
                        <li>120-140 diffuseurs de bulles</li>
                        <li>2 appui-têtes Classique</li>
                        <li>1 porte-verre double</li>
                        <li>1 Spot led d'ambiance</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                    </ul>
                    <!-- <ul class="list-unstyled mb-4 text-center">
                        <li>-10% du lundi au jeudi !</li>
                    </ul> -->
                    <p class="text-center">
                        <a href="{{ url('/reservation/4places') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
                </div>
                <div class="d-flex pricing text-center">
                    <div class="row">
                      <div class="col-6 mb-4">
                          2 jours :<br> <b>130€</b>
                      </div>
                      <div class="col-6 mb-4">
                          3 jours :<br> <b>170€</b>
                      </div>
                      <div class="col-6">
                          4 jours :<br> <b>200€</b>
                      </div>
                      <div class="col-6">
                          5 jours :<br> <b>220€</b>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing mb-2">
                    <h3 class="text-center text-black">1 soirée XL (24h)</h3>
                    <div class="price text-center mb-4 ">
                        <span><span>120€</span></span>
                    </div>
                    <ul class="list-unstyled ul-check success mb-4">
                        <li>Spa intex jusqu'à 6 places</li>
                        <li>170 diffuseurs de bulles</li>
                        <li>2 appui-têtes Deluxe</li>
                        <li>2 porte-verre double</li>
                        <li>1 Spot led d'ambiance</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                    </ul>
                    <!-- <ul class="list-unstyled mb-4 text-center">
                        <li>-10% du lundi au jeudi !</li>
                    </ul> -->
                    <p class="text-center">
                        <a href="{{ url('/reservation/6places') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
                </div>
                <div class="d-flex pricing text-center">
                    <div class="row">
                      <div class="col-6 mb-4">
                          2 jours :<br> <b>160€</b>
                      </div>
                      <div class="col-6 mb-4">
                          3 jours :<br> <b>200€</b>
                      </div>
                      <div class="col-6">
                          4 jours :<br> <b>230€</b>
                      </div>
                      <div class="col-6">
                          5 jours :<br> <b>250€</b>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row site-section" id="faq-section">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title text-primary">Encore un doute ?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h6 mb-2">Les conditions pour installer un jacuzzi :</h3>
                  <p>Vous devez disposer de 2m sur 2m sur une surface béton sous le sol, d'un point d'eau avec robinet extérieur ou de cuisine et une prise électrique à porté (20m maximum).</p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h6 mb-2">Le temps d'installer et de désinstaller :</h3>
                  <p>En règle général, nous prenons une heure pour installer et vérifier le bon fonctionnement du matériel. Le spa et les accessoires sont désinfectés après la réservation.</p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h6 mb-2">Le moment de l'installation :</h3>
                  <p>Nous recommandons une installation en début de journée afin que l'eau soit chauffée rapidement et de profiter du spa le reste de la journée et de la nuit.</p>
              </div>
              <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                  <h3 class="text-black h6 mb-2">La quantité d'eau des spas :</h3>
                  <p>Les spas 4 places contiennent jusqu'à 700 litres et les spas 6 places jusqu'à 1100 litres. Cela représente entre 3,5€ et 5€ sur votre facture d'eau.</p>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">Les conditions de paiement :</h3>
                    <p>Pour des raisons pratiques, nous vous proposons le paiement de votre réservation par Paypal ou par virement bancaire. Le paiement carte bleue arrive bientôt !</p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">Les avantages avec Bullao :</h3>
                    <p>Fini les locations douteuses sur les réseaux sociaux, vous avez la garantie d'avoir un service impéccable, une hygiène irréprochable et la bonne humeur !</p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">Can I accept both Paypal and Stripe?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">What available is refund period?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam assumenda eum blanditiis perferendis.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="site-section" id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="block-heading-1">
                    <span>Ne perdez pas de temps</span>
                    <h2>Contactez-nous</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ url('/medias/img/paiement-stripe.jpg') }}" alt="Image" class="img-fluid rounded-circle">
            </div>
            <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-black">Laissez-nous un message</h2>
                <p>Afin de faciliter la communication avec vous, utilisez le module de messagerie en bas à droite de votre écran. Généralement nous sommes connectés et on vous répond dans l'heure, sinon laissez un message et nous reviendrons vers vous au plus vite.</p>
            </div>
        </div>
    </div>
</div>

@endsection
