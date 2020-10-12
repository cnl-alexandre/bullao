@extends('layouts.tunnel')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mt-5 mb-5 justify-content-center text-center">
            <div class="col-md-8">
                <div class="block-heading-1" data-aos="" data-aos-delay="">
                    <h2 class="h2-reservation">1. Votre formule</h2>
                    <p>Choisissez la formule de votre choix qui vous semble la plus adaptée.</p>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="pricing">
                    <h3 class="text-center text-black">1 soirée</h3>
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
                        <a href="{{ url('/reservation/4places') }}" class="btn btn-primary btn-md text-white" id="btn-reserver-4">Réserver</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing">
                    <h3 class="text-center text-black">1 soirée XL</h3>
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
                        <a href="{{ url('/reservation/6places') }}" class="btn btn-primary btn-md text-white" id="btn-reserver-6">Réserver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<form class="" action="{{ url('/reservation') }}" method="post">

    {{ csrf_field() }}

    <div class="site-section" id="datepicker-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="block-heading-1" data-aos="" data-aos-delay="">
                        <h2 class="h2-reservation">2. Vos disponibilités</h2>
                        <br>
                        <div class="text-center" id="containerdaterange" style="height:330px;">
                          <div class="form-group">
                              <label for="daterange">Dates de résevation</label>
                              <input type="text" id="daterange" class="form-control daterange text-center" name="daterange">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light" id="spas-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">3. Votre spa</h2>
                        <p>Quel spa vous fait le plus envie ? Faites-vous plaisir pour ce coup là !</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom array_spas" data-toggle="buttons">
                @if(count($spas) > 0)
                    @foreach($spas as $spa)
                        <label for="spa-{{ $spa->spa_id }}" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 spa-recap" data-aos="fade-up">
                            <input type="radio" name="spa" id="spa-{{ $spa->spa_id }}" autocomplete="off" value="{{ $spa->spa_id }}">
                            <div class="block-team-member-1 text-center rounded">
                                <figure>
                                    <img src="{{ url($spa->spa_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                                </figure>
                                <h3 class="font-size-20 text-black">{{ $spa->spa_libelle }}</h3>
                                <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-14 mb-3"><?php echo $spa->spa_desc; ?></span>
                            </div>
                        </label>
                    @endforeach
                @endif
            </div>
            <input type="hidden" name="prixSpa" id="prixSpa" value="0.00">
            <input type="hidden" name="nbPlaceSpa" id="nbPlaceSpa" value="{{ $nbPlace }}">
        </div>
    </div>

    <div class="site-section" id="packs-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">4. Votre thème</h2>
                        <p>Vous souhaitez thématiser simplement votre soirée ? Vous avons ce qu'il vous faut !</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom" data-toggle="buttons">
                @if(count($packs) > 0)
                    @foreach($packs as $pack)
                        <label for="pack-{{ $pack->pack_id }}" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 pack-recap" id="label-pack-{{ $pack->pack_id }}" data-aos="fade-up">
                            <input type="radio" name="pack" id="pack-{{ $pack->pack_id }}" autocomplete="off" value="{{ $pack->pack_id }}">
                            <div class="block-team-member-1 text-center rounded">
                                <figure>
                                    <img src="{{ url($pack->pack_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                                </figure>
                                <h3 class="font-size-20 text-black">{{ $pack->pack_libelle }} - {{ $pack->pack_prix }}€</h3>
                                <span class="d-block font-gray-5 font-size-14 mb-2"><?php echo $pack->pack_description; ?></span>
                                {{ $pack->stock() }}
                            </div>
                        </label>
                    @endforeach
                @endif
            </div>
            <div class="text-center">
                <button  class="btn btn-link" id="btn-pack-clear">Supprimer le pack</button>
            </div>
        </div>
    </div>

    <div class="site-section bg-light" id="accessoires-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">5. Vos accessoires</h2>
                        <p>Ajoutez le petit détail qui fera la différence à votre soirée spa !</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle checkbox-custom" data-toggle="buttons">
                @if(count($accessoires) > 0)
                    @foreach($accessoires as $accessoire)
                        <label for="accessoire-{{ $accessoire->accessoire_id }}" class="btn btn-checkbox-custom col-lg-3 col-md-4 mb-3 accessoire-recap" data-aos="fade-up">
                            <input type="checkbox" name="accessoires[]" id="accessoire-{{ $accessoire->accessoire_id }}" autocomplete="off" value="{{ $accessoire->accessoire_id }}">
                            <div class="block-team-member-1 text-center rounded">
                                <figure>
                                    <img src="{{ url($accessoire->accessoire_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                                </figure>
                                <h3 class="font-size-18 text-black">{{ $accessoire->accessoire_libelle }}</h3>
                                <span class="d-block font-gray-5 font-size-14 mb-2">{{ $accessoire->accessoire_prix }}€</span>
                                {{ $accessoire->stock() }}
                            </div>
                        </label>
                    @endforeach
                @endif
            </div>
            <div class="row justify-content-center mt-4">
                <input type="submit" name="" value="Continuer" class="btn btn-primary btn-md text-white">
            </div>
        </div>
    </div>

</form>


<script>

    $(".daterange").change(function() {
        var d = $('#daterange').val();
        var dates = d.split(" - ");
        var nbJours = calculNbJoursReservation(dates[0], dates[1]);

        var date_debut = dates[0].split('/').reverse().join('-');
        var date_fin = dates[1].split('/').reverse().join('-');
        var nb_place = $('#nbPlaceSpa').val();
        $.ajax({
            url : "{{ url('/webservices/spa/stock/verify') }}",
            type : 'POST',
            data : '_token={{ csrf_token() }}&date_debut='+date_debut+'&date_fin='+date_fin+'&nb_place='+nb_place,
            success : function(response, statut){
                if(response != "")
                {
                    //console.log(response);
                    $('.array_spas').html(response['spas']);
                }
                else
                {
                    $('.array_spas').html("Pas de spas disponibles...");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('ERREUR : '+jqXHR.responseText);
    
            }
        });
    });

    @if(count($packs) > 0)
        $("#btn-pack-clear").click(function() {
            @foreach($packs as $pack)
                $("#label-pack-{{ $pack->pack_id }}").removeClass("active");
            @endforeach

            return false;
        });
    @endif

    $(document).ready(function() {

        // Gestion du scroll automatique
        var url = $(location).attr('href');
        var nbPlaceComplete = url.substring(url.length - 7, url.length);
        var nbPlace = nbPlaceComplete.substring(0, 1);

        if(nbPlace == 4 || nbPlace == 6)
        {
            $('html, body').animate({
                scrollTop: $("#datepicker-section").offset().top
            }, 1000);
        }

        if(nbPlace == 4)
        {
            $("#btn-reserver-4").html('Offre sélectionnée');
            $("#btn-reserver-4").css('background-color', '#FF8B00');
            $("#btn-reserver-4").css('border-color', '#FF8B00');
        }
        else if(nbPlace == 6)
        {
            $("#btn-reserver-6").html('Offre sélectionnée');
            $("#btn-reserver-6").css('background-color', '#FF8B00');
            $("#btn-reserver-6").css('border-color', '#FF8B00');
        }

        setTimeout(function(){
            $('#daterange').trigger('click');
        }, 1);

        var some_date_range = [
            @if(count($indispos) > 0)
                @foreach($indispos as $indispo)
                    '{{ $indispo->indisponibilite_date }}',
                @endforeach
            @endif
        ];

        $('#daterange').daterangepicker({
            minDate: "{{ date('d/m/Y') }}",
            maxDate: "31/12/{{ (date('Y')+1) }}",
            showDropdowns: true,
            opens: "center",
            locale: {
                format: 'DD/MM/YYYY',
                daysOfWeek: [
                    "Dim",
                    "Lun",
                    "Mar",
                    "Mer",
                    "Jeu",
                    "Ven",
                    "Sam"
                ],
                monthNames: [
                    "Janvier",
                    "Février",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Août",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Décembre"
                ],
                firstDay: 1
            },
            autoApply: true,
            alwaysShowCalendars: true,
            maxSpan: {
                days: 5
            },
            drops: "auto",
            isInvalidDate: function(date) {
                for(var ii = 0; ii < some_date_range.length; ii++){
                    if (date.format('YYYY-MM-DD') == some_date_range[ii]){
                        return true;
                    }
                }
            }
        });

        daterangepicker.prototype.outsideClick = function(e) {};
    });
</script>


@endsection