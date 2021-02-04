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
    <div class="contact-section mb-2" id="contact-section">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
                <div class="col-12 col-lg-6 services-img contact-img-1 radius">
                </div>
                <div class="col-lg-5 mx-auto p-lg-5 mt-4 mt-lg-3" data-aos="fade" data-aos-delay="">
                    <h2 class="mb-3 font-size-28 text-black">Vous voulez nous contacter ?</h2>
                    <p class="">
                        Pour vous aider à réaliser toutes vos envies, Bullao se tient à votre disposition via les moyens de contacts ci-dessous. Nous restons disponible pour répondre à toutes vos questions et à vos demandes soit par email ou par téléphone

                    </p>
                    <p>

                    </p>
                    <p class="">
                        Nous sommes disponible très souvent
                        <br>
                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="" alt=""> 0606060606
                        </div>

                        <br>
                        Debut de texte court
                        <br><br>

                        <div class="bg-light pl-2 py-3" style="width: 100%;">
                            <img src="" alt=""> contact@bullao.fr
                        </div>
                        <br><br><br><br><br><br><br><br><br>
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
                    <h2 class="mb-3 font-size-28 text-black">Vous n'êtes plus qu'à une bulle du bonheur...</h2>
                    <p class="">
                        Nous sommes présent également sur les réseaux sociaux
                    </p>
                    <p class="">
                        <b>Instagram :</b> @Bullaospa
                        <br><br>
                        <b>Facebook & Messenger :</b> @Bullaospa
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
