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
                <div class="col-12 col-lg-6 services-img contact-img-1 radius">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-2 font-size-28 text-black">Vous voulez nous contacter ?</h2>
                    <p class="">
                        Il reste encore une ou deux interrogations avant de sauter le pas ? Bullao se tient à votre disposition pour vous aider à réaliser toutes vos envies.
                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="{{url('/medias/img/pictos/contact_sms.svg')}}" class="mx-3" alt="Contact par téléphone"> <a href="tel:0628826954">06.28.82.69.54</a>
                        </div>
                    </p>
                    <p class="mt-4">
                        N'attendez plus, nous restons disponible 7 jours sur 7 pour répondre à vos questions.
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
                <div class="col-12 col-lg-6 services-img contact-img-2 radius order-lg-2" data-aos="fade" data-aos-delay="">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3 order-lg-1" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Et les réseaux sociaux...</h2>
                    <p class="">
                        Vous pouvez nous retrouver sur Instagram pour avoir un aperçu de précédentes prestations et suivre l'actualité Bullao. <br>(Psss: des jeux concours sont organisés de régulièrement)
                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="{{url('/medias/img/pictos/contact_insta.svg')}}" class="mx-3" alt="Réseau social Instagram"> <a target="_blank" href="https://www.instagram.com/bullaospa/?hl=fr">instagram.com/@bullaospa</a>
                        </div>
                    </p>
                    <p class="mt-4">
                        Nous sommes disponible également sur le réseau Facebook où nous répondrons aussi à toutes vos questions.
                        <br>
                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="{{url('/medias/img/pictos/contact_fb.svg')}}" class="mx-3" alt="Réseau social Facebook"> <a target="_blank" href="https://www.facebook.com/bullaospa/">facebook.com/bullaospa</a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
