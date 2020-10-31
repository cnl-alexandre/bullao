@extends('layouts.app')

@section('pageTitle', 'Accueil | '.env('APP_NAME'))

@section('content')

<div class="owl-carousel slide-one-item">
    <div class="site-section-cover overlay img-bg-section" style="background-image: url({{ url('medias/img/home/hero_3.webp') }}); " >
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
    <div class="block__73694 mb-2" id="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 block__73422" style="background-image: url({{ url('medias/img/home/preview_baltik_6p_ext_1.webp') }});" data-aos="fade" data-aos-delay="">
                </div>
                <!-- <img class="col-12 col-lg-6 block__73422" src="{{ url('medias/img/img_1.jpg') }}" alt="" data-aos="fade-up" data-aos-delay=""> -->
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-0" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Votre spa à domicile</h2>
                    <p class="text-justify">
                        En couple, en famille ou entre amis, profitez d’un moment de détente
                        inoubliable sans bouger de chez vous. Dans le respect de mesures sanitaires très strictes,
                        notre équipe vous garantie une installation saine et sécurisée pour une tranquillité
                        d’esprit inégalée. Vous n’avez rien à penser, nous nous occupons de tout.
                    </p>
                    <p class="text-justify">
                        Pour le moment, tous les spas-jacuzzi Bullao sont disponibles à la
                        location privée ou professionnelle à Marne-la-Vallée et à Paris.
                    </p>
                    <ul class="ul-check primary list-unstyled mt-4">
                        <li>Installation à domicile en 1h</li>
                        <li>Spas Intex© jusqu'à 6 places</li>
                        <li>Respect des mesures sanitaires</li>
                        <li>Désinstallation rapide</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="block__73694">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 block__73422 order-lg-2" style="background-image: url({{ url('medias/img/home/preview_navy_4p_int_1.webp') }});" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Votre soirée sur-mesure</h2>
                    <p class="text-justify">
                        Bullao accompagne tous vos événements, aussi bien entre particuliers
                        que professionnels. Un anniversaire, une occasion spéciale ou tout simplement un
                        instant à deux, nous vous apportons la touche de relaxation qui fait toute la différence.
                        Pour une expérience encore plus unique, notre équipe vous conseille à chaque étape de
                        votre location.
                    </p>
                    <p class="text-justify">
                        Grâce à nos packs à thèmes et nos accessoires dédiés, concevez vous-même votre soirée.
                        Imaginez, associez et offrez-vous le luxe d’un spa à domicile :
                    </p>
                    <ul class="ul-check primary list-unstyled mt-4">
                        <li>4 couleurs de spa</li>
                        <li>2 thématiques</li>
                        <li>Large choix d’accessoires</li>
                        <li>Location de 1 à 5 jours</li>
                    </ul>
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
                    Vous rêvez de vous détendre avec vos proches chez vous ?
                    Choisissez la date qui vous convient ainsi que le spa-jacuzzi désiré pour réserver depuis notre site.
                    À votre écoute, nous répondons rapidement à toutes vos questions.
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-media">
                    <div class="icon mb-3">
                        <span><img src="{{ url('medias/img/pictos/004-settings.svg') }}" alt="" height="45px"></span>
                    </div>
                    <h3 class="font-size-18 text-black mb-2">Pose et retrait</h3>
                    Afin de vous garantir la meilleure expérience, on se charge
                    de la livraison, de la pose et du retrait chez vous. Pour que votre spa-jacuzzi soit
                    opérationnel dans les temps, nous recommandons la pose en début de journée.
                </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
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
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="">
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
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="custom-media">
                    <div class="icon mb-3">
                        <span><img src="{{ url('medias/img/pictos/001-photo-camera.svg') }}" alt="" height="45px"></span>
                    </div>
                    <h3 class="font-size-18 text-black mb-2">Partage</h3>
                    Une fois réservé, il ne vous reste plus qu’à attendre encore un peu avant de profiter
                    de votre spa-jacuzzi.
                    Venez nous partager votre expérience sur Facebook et Instagram !
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section">
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
                    <li>Un espace optimal de 2,5m sur 2,5m soit un peu plus de 6m2</li>
                    <li>Une prise électrique murale à 20m maximum du spa</li>
                    <li>Une arrivée d’eau extérieure ou une prise d’eau de salle de bain à 20m maximum du spa</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mb-4 justify-content-center text-center">
            <div class="col-md-7">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Nos tarifs</h2>
                    <p>Les spas-jacuzzi (4 places ou 6 places) de Bullao sont disponibles à la location de
                      24h (1 soirée) à 5 jours. Nos prix sont dégressifs en fonction de la durée de votre location :</p>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="pricing custom-media mb-2">
                    <h3 class="text-center text-black">1 soirée (24h)</h3>
                    <div class="price text-center mb-4  d-flex flex-column">
                        <p style="margin-bottom: 0;line-height: 0;margin-top: 30px;">Prix unique</p>
                        <span><span>90€</span></span>
                    </div>
                    <ul class="list-unstyled ul-check success" style="margin-bottom: 0px;">
                        <li>Spa intex jusqu'à 4 places</li>
                        <li>120-140 diffuseurs de bulles</li>
                        <li>2 appui-têtes Classique</li>
                        <li>1 porte-verre</li>
                        <li>1 Spot led d'ambiance</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li class="mb-0">Livraison et installation à domicile</li>
                    </ul>
                    <ul class="list-unstyled mb-0 text-center">
                        <li><br><b>30€ par jours supplémentaires !</b></li>
                    </ul>
                    <p class="text-center">
                        <a href="{{ url('/reservation/4places') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing custom-media mb-2">
                    <h3 class="text-center text-black">1 soirée XL (24h)</h3>
                    <div class="price text-center mb-4 d-flex flex-column">
                        <p style="margin-bottom: 0;line-height: 0;margin-top: 30px;">À partir de</p>
                        <span><span>120€</span></span>
                    </div>
                    <ul class="list-unstyled ul-check success" style="margin-bottom: 0px;">
                        <li>Spa intex jusqu'à 6 places</li>
                        <li>140-170 diffuseurs de bulles</li>
                        <li>2 appui-têtes Deluxe</li>
                        <li>2 porte-verre</li>
                        <li>1 Spot led d'ambiance</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                        <li class="mb-0">En option : 6 jets massants</li>
                    </ul>
                    <ul class="list-unstyled mb-0 text-center">
                        <li><br><b>30€ par jours supplémentaires !</b></li>
                    </ul>
                    <p class="text-center mt-2">
                        <a href="{{ url('/reservation/6places') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
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
                      Nous savons que vous êtes d’impatient de tester votre jacuzzi. En
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
<!-- <div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="heading-1">
                  <h5 class="mb-0">
                    <button class="btn btn-link text-black h6" data-toggle="collapse" data-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                      Où installer mon spa-jacuzzi ?
                    </button>
                  </h5>
                </div>

                <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion">
                  <div class="card-body">
                      Pour une installation optimale, vous devez disposer d’un espace libre de 2
                      mètres sur 2 mètres avec une surface en béton sous le sol, d'un point d'eau avec un
                      robinet extérieur ou de cuisine et une prise électrique à 20 mètres de distance
                      maximum.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading-2">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed text-black h6" data-toggle="collapse" data-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                      Quand est-ce que mon spa-jacuzzi sera prêt ?
                    </button>
                  </h5>
                </div>
                <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion">
                  <div class="card-body">
                      Nous savons que vous mourrez d’impatience de tester votre jacuzzi. En
                      règle général, nous prenons une heure pour installer et vérifier le bon fonctionnement
                      du matériel. Le spa et les accessoires Bullao sont désinfectés avant et après la
                      réservation.
                  </div>
                </div>
              </div>
                <div class="card">
                    <div class="card-header" id="heading-3">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-black h6" data-toggle="collapse" data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                            À quel moment se fait l’installation ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion">
                        <div class="card-body">
                            Pour profiter au maximum de votre spa-jacuzzi, Bullao recommande une
                            installation en début de journée afin que l'eau chauffe rapidement et qu’elle atteigne la
                            température idéale. Vous pourrez ainsi vous détendre tout le reste de la journée et de la
                            nuit.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-4">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-black h6" data-toggle="collapse" data-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                            Quelles sont vos mesures face au Covid-19 ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion">
                        <div class="card-body">
                            L’équipe Bullao est très attentive au respect des gestes barrières et
                            désinfecte l'ensemble du matériel utilisé et des accessoires avant et après chaque
                            utilisation. Pour limiter la propagation du virus, nous vous conseillons de limiter le
                            nombre de personnes dans les spas et de porter un masque tout au long de leur
                            utilisation.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-5">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-black h6" data-toggle="collapse" data-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                          Quelles sont vos conditions de paiement ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion">
                        <div class="card-body">
                            Pour des raisons pratiques et de sécurité, nous vous proposons le
                            paiement de votre réservation par Paypal ou par virement bancaire. Le paiement par
                            carte bleue arrive bientôt ! Soyez rassurés, Bullao travaille dans le respect de vos données
                            personnelles.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-6">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-black h6" data-toggle="collapse" data-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                            Pourquoi Bullao et pas un autre ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion">
                        <div class="card-body">
                            Fini les locations douteuses sur les réseaux sociaux, avec Bullao, vous avez
                            la garantie d'avoir un service de confiance sur-mesure, une hygiène irréprochable et une
                            sécurité technique et sanitaire reconnue !
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-7">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-black h6" data-toggle="collapse" data-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                            Comment faire si je dois annuler ma réservation ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion">
                        <div class="card-body">
                            Les imprévus ça arrivent à tout le monde ! En cas d’annulation, contactez
                            notre service client soit via notre messagerie instantanée, par téléphone au ... ou par mail
                            à support@bullao.com. Vous aurez la possibilité d’annuler ou de déplacer votre location
                            à une date ultérieure (sous réserve de disponibilités).
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-8">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-black h6" data-toggle="collapse" data-target="#collapse-8" aria-expanded="false" aria-controls="collapse-8">
                            Quelles sont vos conditions de remboursements ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-8" class="collapse" aria-labelledby="heading-8" data-parent="#accordion">
                        <div class="card-body">
                            En cas d’annulation, nous remboursons l’intégralité du montant de la
                            réservation jusqu’à 72h (3 jours) avant la date prévue. Si vous souhaitez annuler après ce
                            délai, nous ne remboursons qu’à hauteur de 50% du montant de la réservation. Le
                            remboursement sera effectué dans un délai de 10 jours par virement bancaire.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="site-section" id="contact-section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="block-heading-1">
                    <span>Vous n’êtes plus qu’à une bulle du bonheur...</span>
                    <h2>Nous contacter</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3  d-flex justify-content-around">
            <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ url('/medias/img/home/messagerie.webp') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-black">Des réponses à vos questions</h2>
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
                <h4 class="mb-3">Vos précédentes réservations</h4>
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
@if(Session::has('success'))
    <script>alert("{!! Session::get('success') !!}");</script>
    {{ Session::forget('success') }}
@endif
@if(Session::has('error'))
    <script>alert("{!! Session::get('error') !!}");</script>
    {{ Session::forget('error') }}
@endif

@endsection
