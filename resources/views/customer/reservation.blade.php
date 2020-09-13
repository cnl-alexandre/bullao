@extends('layouts.reservation')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-md-7">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2>Nos tarifs</h2>
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
                    <ul class="list-unstyled ul-check success mb-5">
                        <li>Spa intex 4 places</li>
                        <li>Spot lumineux led</li>
                        <li class="remove">Filtration neuve</li>
                        <li class="remove">Livraison et installation à domicile</li>
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
                    <ul class="list-unstyled ul-check success mb-5">
                        <li>Spa intex 6 places</li>
                        <li>Spot lumineux led</li>
                        <li class="remove">Filtration neuve</li>
                        <li class="remove">Livraison et installation à domicile</li>
                    </ul>
                    <p class="text-center">
                        <a href="{{ url('/reservation') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
