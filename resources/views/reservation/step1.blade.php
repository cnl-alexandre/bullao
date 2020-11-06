@extends('layouts.tunnel')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mt-5 mt-md-0 mb-3 mb-md-5 justify-content-center text-center">
            <div class="col-md-8">
                <div class="block-heading-1" data-aos="" data-aos-delay="">
                    <h2 class="h2-reservation">1. Votre formule</h2>
                    <p>Choisissez la formule de votre choix qui vous semble la plus adaptée.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="" style="margin-left: auto;margin-right: 0;">
                <div class="pricing mb-2">
                    <h3 class="text-center text-black">1 soirée (24h)</h3>
                    <div class="price text-center mb-0  d-flex flex-column">
                        <p style="margin-bottom: 0;line-height: 0;margin-top: 25px;">À partir de</p>
                        <span><span>90€</span></span>
                    </div>
                    <ul class="list-unstyled text-primary text-center mb-4">
                        <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Afficher le détail
                        </a>
                    </ul>
                    <ul class="list-unstyled ul-check success collapse mb-3" id="collapse-1">
                        <li>Spa Intex© jusqu'à 4 places</li>
                        <li>120-140 diffuseurs de bulles</li>
                        <li>2 appui-têtes Classique</li>
                        <li>1 porte-verre</li>
                        <li>1 spot led d'ambiance</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li class="mb-0">Livraison et installation à domicile</li>
                    </ul>
                    <p class="text-center">
                        <a href="{{ url('/reservation/4places') }}" class="btn btn-primary btn-md text-white" id="btn-reserver-4">Choisir cette offre</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing mb-2">
                    <h3 class="text-center text-black">1 soirée XL (24h)</h3>
                    <div class="price text-center mb-0 d-flex flex-column">
                        <p style="margin-bottom: 0;line-height: 0;margin-top: 25px;">À partir de</p>
                        <span><span>120€</span></span>
                    </div>
                    <ul class="list-unstyled text-primary text-center mb-4">
                        <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Afficher le détail
                        </a>
                    </ul>
                    <ul class="list-unstyled ul-check success collapse mb-3" id="collapse-2">
                        <li>Spa Intex© jusqu'à 6 places</li>
                        <li>140-170 diffuseurs de bulles</li>
                        <li>2 appui-têtes Deluxe</li>
                        <li>2 porte-verre</li>
                        <li>1 spot led d'ambiance</li>
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                        <li class="mb-0">En option : 6 jets massants</li>
                    </ul>
                    <p class="text-center">
                        <a href="{{ url('/reservation/6places') }}" class="btn btn-primary btn-md text-white" id="btn-reserver-6">Choisir cette offre</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<form class="" action="{{ url('/reservation') }}" method="post">

    {{ csrf_field() }}

    <div class="site-section picker-section" id="datepicker-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="block-heading-1" data-aos="" data-aos-delay="">
                        <h2 class="h2-reservation">2. Vos disponibilités</h2>
                        <br>
                        <div class="text-center" id="containerdaterange" style="height:330px;">
                          <div class="form-group">
                              <label for="daterange">Sélectionnez vos dates de réservations (jour de pose et jour de retrait)</label>
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
                Chargement des spas
            </div>
            <input type="hidden" name="nbPlaceSpa" id="nbPlaceSpa" value="{{ $nbPlace }}">
        </div>
    </div>

    <div class="site-section" id="packs-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">4. Votre thème</h2>
                        <p>Vous souhaitez thématiser simplement votre soirée ? Nous avons ce qu'il vous faut !</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom array_packs" data-toggle="buttons">
                @if(count($packs) > 0)
                    @foreach($packs as $pack)
                        <label for="pack-{{ $pack->pack_id }}" class="btn btn-radio-custom col-lg-6 col-md-12 mb-3 pack-recap" id="label-pack-{{ $pack->pack_id }}" data-aos="fade-up">
                            <input type="radio" name="pack" id="pack-{{ $pack->pack_id }}" autocomplete="off" value="{{ $pack->pack_id }}">
                            <div class="block-team-member-1 text-left rounded d-flex input-col-step1-responsive">
                                <figure class="col-4">
                                    <img src="{{ url($pack->pack_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                                </figure>
                                <div>
                                    <h3 class="font-size-20 text-black">{{ $pack->pack_libelle }} - {{ $pack->pack_prix }}€</h3>
                                    <span class="d-block font-gray-6 font-size-15 mb-1"><?php echo $pack->pack_description; ?></span>
                                    <!-- {{ $pack->stock() }} -->
                                </div>

                            </div>
                        </label>
                    @endforeach
                @endif
                <label for="0" class="btn btn-radio-custom col-md-3 pack-recap" id="0" data-aos="fade-up">
                    <input type="radio" name="pack" id="0" autocomplete="off" value="">
                    <div class="block-team-member-1 text-center rounded d-flex" style="padding:30px;">
                        <span class="d-block font-gray-9 font-size-14 mx-auto">Je ne prends pas de pack</span>
                    </div>
                </label>
            </div>


        </div>
    </div>

    <div class="site-section bg-light" id="accessoires-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">5. Vos accessoires</h2>
                        <p>Ajoutez les petits détails qui feront la différence à votre soirée spa !</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-around btn-group btn-group-toggle checkbox-custom array_accessoires" data-toggle="buttons">
                Chargement des accessoires
            </div>
            <div class="row justify-content-center mt-4">
                <input type="hidden" name="step" value="1">
                <div class="col-6 text-left">
                    <a href="{{ url('/') }}" class="btn btn-secondary btn-md text-white">Retour</a>
                </div>
                <div class="col-6 text-right">
                    <input type="submit" name="" value="Continuer" id="btn-confirm" class="btn btn-primary btn-md text-white">
                </div>
            </div>
        </div>
    </div>

</form>

<footer style="background-color:#ffffff;">
    @include('partials.footer-tunnel')
</footer>

<script>

    $(".daterange").change(function() {
        var d = $('#daterange').val();
        var dates = d.split(" - ");
        var nbJours = calculNbJoursReservation(dates[0], dates[1]);

        var date_debut = dates[0].split('/').reverse().join('-');
        var date_fin = dates[1].split('/').reverse().join('-');
        var nb_place = $('#nbPlaceSpa').val();

        $('#btn-confirm').attr("disabled", true);
        $('#btn-confirm').attr("title", "Vous devez choisir un spa.");

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

        // $.ajax({
        //     url : "{{ url('/webservices/pack/stock/verify') }}",
        //     type : 'POST',
        //     data : '_token={{ csrf_token() }}&date_debut='+date_debut+'&date_fin='+date_fin,
        //     success : function(response, statut){
        //         if(response != "")
        //         {
        //             //console.log(response);
        //             $('.array_packs').html(response['packs']);
        //         }
        //         else
        //         {
        //             $('.array_packs').html("Pas de packs disponibles...");
        //         }
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         console.log('ERREUR : '+jqXHR.responseText);

        //     }
        // });

        $.ajax({
            url : "{{ url('/webservices/accessoire/stock/verify') }}",
            type : 'POST',
            data : '_token={{ csrf_token() }}&date_debut='+date_debut+'&date_fin='+date_fin,
            success : function(response, statut){
                if(response != "")
                {
                    //console.log(response);
                    $('.array_accessoires').html(response['accessoires']);
                }
                else
                {
                    $('.array_accessoires').html("Pas d'accessoires disponibles...");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('ERREUR : '+jqXHR.responseText);

            }
        });
    });

    $(".pack-recap").click(function() {
        $("html, body").animate({
            scrollTop: $("#accessoires-section").offset().top
        }, 1000);

        $("#btn-confirm").attr("disabled", false);
        $("#btn-confirm").attr("title", null);
    })

    @if(count($packs) > 0)
        $("#btn-pack-clear").click(function() {
            @foreach($packs as $pack)
                $("#label-pack-{{ $pack->pack_id }}").removeClass("active");
                $("#pack-{{ $pack->pack_id }}").prop('checked', false);
            @endforeach

            return false;
        });
    @endif

    $(document).ready(function() {

        $('#btn-confirm').attr("disabled", true);
        $('#btn-confirm').attr("title", "Vous devez choisir un spa et faire un choix au niveau des packs.");

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

        if(nbPlace == 6)
        {
            $("#btn-reserver-6").html('Offre sélectionnée');
            $("#btn-reserver-6").css('background-color', '#FF8B00');
            $("#btn-reserver-6").css('border-color', '#FF8B00');
        }
        else if(nbPlace == 4)
        {
            $("#btn-reserver-4").html('Offre sélectionnée');
            $("#btn-reserver-4").css('background-color', '#FF8B00');
            $("#btn-reserver-4").css('border-color', '#FF8B00');
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
            startDate: "{{ date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days')) }}",
            endDate: "{{ date('d/m/Y', strtotime(date('Y-m-d'). ' + 3 days')) }}",
            minDate: "{{ date('d/m/Y', strtotime(date('Y-m-d'). ' + 2 days')) }}",
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

        $('#daterange').on('hide.daterangepicker', function(ev, picker) {
            $('html, body').animate({
                scrollTop: $("#spas-section").offset().top
            }, 1000);

            setTimeout(function(){
                $('#daterange').trigger('click');
            }, 1);
        });

        daterangepicker.prototype.outsideClick = function(e) {};
    });
</script>

@endsection
