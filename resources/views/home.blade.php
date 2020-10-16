@extends('layouts.app')

@section('pageTitle', 'Accueil | '.env('APP_NAME'))

@section('content')

<div class="owl-carousel slide-one-item">
    <div class="site-section-cover overlay img-bg-section" style="background-image: url({{ url('medias/img/hero_3.jpg') }}); " >
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-12 col-lg-8">
                    <h1 data-aos="fade-up" data-aos-delay="">Prenez le temps de vous détendre</h1>
                    <p class="mt-3 mb-4" data-aos="fade-up" data-aos-delay="100">La location personnalisée de spas-jacuzzi<br>à Marne-la-Vallée.</p>
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
                    <h2 class="mb-3 text-black">Votre spa à domicile</h2>
                    <p>En couple, en famille ou entre amis, profitez d’un moment de détente
                          inoubliable sans bouger de chez vous. Dans le respect de mesures sanitaires très strictes,
                          notre équipe vous garantie une installation saine et sécurisée pour une tranquillité
                          d’esprit inégalée. Vous n’avez rien à penser, nous nous occupons de tout.
                    </p>
                    <p>
                        Pour le moment, tous les spas-jacuzzi Bullao sont disponibles à la
                        location privée ou professionnelle à Marne-la-Vallée et à Paris.
                    </p>
                    <ul class="ul-check primary list-unstyled mt-5">
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
                <div class="col-12 col-lg-6 block__73422 order-lg-2" style="background-image: url({{ url('medias/img/img_2.jpg') }});" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mr-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 text-black">Votre soirée sur-mesure</h2>
                    <p>
                      Bullao accompagne tous vos événements, aussi bien entre particuliers
                      que professionnels. Un anniversaire, une occasion spéciale ou tout simplement un
                      instant à deux, nous vous apportons la touche de relaxation qui fait toute la différence.
                      Pour une expérience encore plus unique, notre équipe vous conseille à chaque étape de
                      votre location.
                    </p>
                    <p>Grâce à nos packs à thèmes et nos accessoires dédiés, concevez vous-même votre soirée. Imaginez, associez et offrez-vous le luxe d’un spa à domicile :</p>
                    <ul class="ul-check primary list-unstyled mt-5">
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

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-mining"></span>
                    </div>
                    <h3 class="mb-3">Réservation</h3>
                    Vous avez trouvé le spa-jacuzzi de vos rêves ? Les réservations s’effectuent
                    par téléphone, par mail ou via la messagerie instantanée de Bullao. À votre écoute, notre
                    équipe répond rapidement à toutes vos questions.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-gold-ingots"></span>
                    </div>
                    <h3 class="mb-3">Pose et retrait</h3>
                    Afin de vous garantir la meilleure des expériences, notre équipe se charge
                    de la livraison, de l’installation et du retrait à domicile. Pour que votre spa-jacuzzi soit
                    opérationnel dans les temps, nous recommandons une installation en fin de matinée ou
                    en début d’après-midi.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-wagon"></span>
                    </div>
                    <h3 class="mb-3">Hygiène</h3>
                    Bullao vous assure une qualité, une hygiène et une sécurité optimale.
                    Tous les spas-jacuzzi, ainsi que les accessoires sont vérifiés, nettoyés et désinfectés avant
                    et après chaque utilisation. Notre équipe travaille dans le respect des règles sanitaires et
                    des gestes barrières.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-refinery"></span>
                    </div>
                    <h3 class="mb-3">Localisation</h3>
                    Pour le moment, les équipes Bullao interviennent sur l’ensemble du
                    secteur de Marne-la-Vallée. Nous espérons desservir prochainement Paris et l’Est de la
                    région Île-de-France.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-blacksmith"></span>
                    </div>
                    <h3 class="mb-3">Personnalisation</h3>
                    Une demande particulière ? Façonnez votre instant spa-jacuzzi à votre
                    image ! Bullao vous propose différents thèmes et accessoires pour une expérience
                    inoubliable et sur-mesure.
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="block__35630">
                    <div class="icon mb-3">
                        <span class="flaticon-crucible"></span>
                    </div>
                    <h3 class="mb-3">Partage</h3>
                    Impatients de plonger dans l’expérience Bullao ? Une fois votre
                    réservation effectuée, il ne vous reste plus qu’à attendre encore un peu avant de profiter
                    pleinement de votre spa-jacuzzi. Le jour J, n’hésitez pas à nous partager votre expérience
                    sur Facebook et Instagram !
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
                    <h2>Nos tarifs</h2>
                    <p>Les spas-jacuzzi (4 places ou 6 places) de Bullao sont disponibles à la location de
                      24h (1 soirée) à 5 jours. Nos prix sont dégressifs en fonction de la durée de votre location :</p>
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
                        <li>1 porte-verre</li>
                        <li>1 Spot led d'ambiance</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                    </ul>
                    <ul class="list-unstyled mb-5 text-center">
                        <li><br><b>30€ par jours supplémentaires !</b></li>
                    </ul>
                    <p class="text-center">
                        <a href="{{ url('/reservation/4places') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
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
                        <li>2 porte-verre</li>
                        <li>1 Spot led d'ambiance</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                    </ul>
                    <ul class="list-unstyled mb-5 text-center">
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
                      Nous savons que vous mourrez d’impatience de tester votre jacuzzi. En
                      règle général, nous prenons une heure pour installer et vérifier le bon fonctionnement
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
                      nombre de personnes dans les spas et de porter un masque tout au long de leur
                      utilisation.
                  </p>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h6 mb-2">Quelles sont vos conditions de paiement ?</h3>
                    <p>
                        Pour des raisons pratiques et de sécurité, nous vous proposons le
                        paiement de votre réservation par Paypal ou par virement bancaire. Le paiement par
                        carte bleue arrive bientôt ! Soyez rassurés, Bullao travaille dans le respect de vos données
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
                        Les imprévus ça arrivent à tout le monde ! En cas d’annulation, contactez
                        notre service client soit via notre messagerie instantanée, par téléphone au ... ou par mail
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
                    <h2>Nous contacter</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3  d-flex justify-content-around">
            <div class="col-lg-5 mb-5" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ url('/medias/img/messagerie.jpg') }}" alt="Image" class="img-fluid">
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

@endsection
