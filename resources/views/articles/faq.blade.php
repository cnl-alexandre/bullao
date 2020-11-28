@extends('layouts.article')

@section('pageTitle', 'CGV Bullao | '.env('APP_NAME'))

@section('content')

<div class="site-section-cover overlay inner-page bg-light article-img-1" data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center mt-3">
            <div class="col-lg-10">
                <div class="box-shadow-content">
                    <div class="block-heading-1">
                        <span class="d-block mb-3 text-white"  data-aos="fade-up">1er Octobre 2020</span>
                        <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100" style="font-size: 28px;">Foire aux question</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto blog-content">
                <p class="lead">Vous avez encore un doûte ? Vous trouverez forcement la réponse à votre question !</p>

                <br>
                <p><b>Où installer mon spa-jacuzzi ?</b></p>
                <p>Pour une installation optimale, vous devez disposer d’un espace libre de 2 mètres sur 2 mètres avec une surface en béton sous le sol, d'un point d'eau avec un robinet extérieur ou de cuisine et une prise électrique à 20 mètres de distance maximum.</p>

                <br>
                <p><b>Quand est-ce que mon spa-jacuzzi sera prêt ?</b></p>
                <p>Nous savons que vous êtes impatient de tester votre jacuzzi. En règle générale, nous prenons une heure pour installer et vérifier le bon fonctionnement du matériel. Le spa et les accessoires Bullao sont désinfectés avant et après la réservation.</p>

                <br>
                <p><b>À quel moment se fait l’installation ?</b></p>
                <p>Pour profiter au maximum de votre spa-jacuzzi, Bullao recommande une installation en début de journée afin que l'eau chauffe rapidement et qu’elle atteigne la température idéale. Vous pourrez ainsi vous détendre tout le reste de la journée et de la nuit.</p>

                <br>
                <p><b>Quelles sont vos mesures face au Covid-19 ?</b></p>
                <p>L’équipe Bullao est très attentive au respect des gestes barrières et désinfecte l'ensemble du matériel utilisé et des accessoires avant et après chaque utilisation. Pour limiter la propagation du virus, nous vous conseillons de limiter le nombre de personnes dans les spas et de profiter de la soirée en petit comité.</p>

                <br>
                <p><b>Quelles sont vos conditions de paiement ?</b></p>
                <p>Pour des raisons pratiques et de sécurité, nous vous proposons le paiement de votre réservation par carte bancaire ! Soyez rassurés, Bullao travaille dans le respect de vos données personnelles.</p>

                <br>
                <p><b>Pourquoi Bullao et pas un autre ?</b></p>
                <p>Fini les locations douteuses sur les réseaux sociaux, avec Bullao, vous avez la garantie d'avoir un service de confiance sur-mesure, une hygiène irréprochable et une sécurité technique et sanitaire reconnue !</p>

                <br>
                <p><b>Comment faire si je dois annuler ma réservation ?</b></p>
                <p>Les imprévus, ça arrive à tout le monde ! En cas d’annulation, contactez notre service client soit via notre messagerie instantanée, par téléphone ou par mail à support@bullao.com. Vous aurez la possibilité d’annuler ou de déplacer votre location à une date ultérieure (sous réserve de disponibilités).</p>

                <br>
                <p><b>Quelles sont vos conditions de remboursements ??</b></p>
                <p>En cas d’annulation, nous remboursons l’intégralité du montant de la réservation jusqu’à 72h (3 jours) avant la date prévue. Si vous souhaitez annuler après ce délai, nous ne remboursons qu’à hauteur de 50% du montant de la réservation. Le remboursement sera effectué dans un délai de 10 jours par virement bancaire.</p>

                <br>
                <p><b>Quelles sont vos mesures face au Covid-19 ?</b></p>
                <p>L’équipe Bullao est très attentive au respect des gestes barrières et désinfecte l'ensemble du matériel utilisé et des accessoires avant et après chaque utilisation. Pour limiter la propagation du virus, nous vous conseillons de limiter le nombre de personnes dans les spas et de profiter de la soirée en petit comité.</p>


            </div>
            @include('partials.col-article')
        </div>
    </div>
</section>

@endsection
