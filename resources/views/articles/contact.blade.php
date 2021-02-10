@extends('layouts.article')

@section('pageTitle', 'Contacter | '.env('APP_NAME'))

@section('content')

<div class="owl-carousel slide-one-item">
    <div class="site-section-cover overlay img-bg-section" style="min-height: auto; height: 260px;">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center" style="height: 140px;min-height: 280px;">
                <div class="col-md-12 col-lg-8">
                    <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">Contacter Bullao</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="services-section mb-2" id="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 services-img services-img-1 radius">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Votre spa à domicile</h2>
                    <p class="">
                        En couple, en famille ou entre amis, profitez d’un moment de détente
                        inoubliable sans bouger de chez vous. Dans le respect de mesures sanitaires très strictes,
                        notre équipe vous garantit une installation saine et sécurisée pour une tranquillité
                        d’esprit inégalée. Vous n’avez rien à penser, nous nous occupons de tout.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch mt-lg-5 mt-3">
                <div class="col-12 col-lg-6 services-img services-img-2 radius order-lg-2" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3 order-lg-1" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Une soirée sur-mesure</h2>
                    <p class="">
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

<div class="site-section">
    <div class="contact-section mb-5" id="contact-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 services-img contact-img-1 radius">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-2 font-size-28 text-black">Vous voulez nous contacter ?</h2>
                    <p class="">
                        Pour vous aider à réaliser toutes vos envies, Bullao se tient à votre disposition.
                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="{{url('/medias/img/pictos/contact_sms.svg')}}" class="mx-3" alt="Contact par téléphone"> <a href="tel:0606060606">06.06.06.06.06</a>
                        </div>
                    </p>
                    <p class="mt-4">
                        Nous restons disponible pour répondre à toutes vos questions et à vos demandes.
                        <br>
                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="{{url('/medias/img/pictos/contact_mail.svg')}}" class="mx-3" alt="Contact par mail"> <a href="mailto:contact@bullao.fr">contact@bullao.fr</a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="services-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch mt-lg-5 mt-3">
                <div class="col-12 col-lg-6 services-img services-img-2 radius order-lg-2" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3 order-lg-1" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Et les réseaux sociaux...</h2>
                    <p class="">
                        Vous pouvez nous retrouver sur Instagram pour avoir un aperçu de précédentes prestations et suivre l'actualité Bullao.
                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="{{url('/medias/img/pictos/contact_insta.svg')}}" class="mx-3" alt="Réseau social Instagram"> <a href="instagram.com/@bullaospa">instagram.com/@bullaospa</a>
                        </div>
                    </p>
                    <p class="mt-4">
                        Nous sommes également disponible sur le réseau Facebook
                        <br>
                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="{{url('/medias/img/pictos/contact_fb.svg')}}" class="mx-3" alt="Réseau social Facebook"> <a href="facebook.com/bullaospa">facebook.com/bullaospa</a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
