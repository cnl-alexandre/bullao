@extends('layouts.reservation')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<section class="site-section bg-light" id="pricing-section">
    <div class="container">
        <div class="row mt-5 mb-5 justify-content-center text-center">
            <div class="col-md-8">
                <div class="block-heading-1" data-aos="" data-aos-delay="">
                    <h2>Réserver un spa</h2>
                    <p></p>
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
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                    </ul>
                    <ul class="list-unstyled mb-4 text-center">
                        <li>-10% du lundi au jeudi !</li>
                    </ul>
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
                        <li>Filtration et traitement de l'eau</li>
                        <li>Livraison et installation à domicile</li>
                    </ul>
                    <ul class="list-unstyled mb-4 text-center">
                        <li>-10% du lundi au jeudi !</li>
                    </ul>
                    <p class="text-center">
                        <a href="{{ url('/reservation/6places') }}" class="btn btn-primary btn-md text-white" id="btn-reserver-6">Réserver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="site-section" id="datepicker-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-7 text-center">
                <div class="block-heading-1" data-aos="" data-aos-delay="">
                    <h2 class="h2-reservation">Quand cela vous fait envie ?</h2>
                    <br>

                    <div class="text-center" id="containerdaterange" style="height:330px;">
                      <div class="form-group">
                          <label for="daterange">Dates de résevation</label>
                          <input type="text" id="daterange" class="form-control daterange text-center" name="daterange">
                      </div>
                        <!-- <input type="text" id="daterangeend" class="daterange" name="daterangeend"> -->
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
                    <h2 class="h2-reservation">Quel spa souhaitez-vous ?</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom" data-toggle="buttons">

            @if(count($spas) > 0)
                @foreach($spas as $spa)
                    <label for="spa-{{ $spa->spa_id }}" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                        <input type="radio" name="spa" id="spa-{{ $spa->spa_id }}" autocomplete="off" value="{{ $spa->spa_id }}">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="{{ url($spa->spa_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">{{ $spa->spa_libelle }}</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3"><?php echo $spa->spa_desc; ?></span>
                        </div>
                    </label>
                @endforeach
            @endif

            <!--
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-navy.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Spa Navy</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Couleur bleu nuit<br> idéal pour une soirée</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Spa Baltik</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Couleur gris broisé<br> idéal pour l'extérieur</span>
                </div>
            </div> -->
        </div>
    </div>
</div>

<div class="site-section" id="packs-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2 class="h2-reservation">Personnalisez votre soirée !</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom" data-toggle="buttons">
            @if(count($packs) > 0)
                @foreach($packs as $pack)
                    <label for="pack-{{ $pack->pack_id }}" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 disabled" data-aos="fade-up">
                        <input type="radio" name="pack" id="pack-{{ $pack->pack_id }}" autocomplete="off" value="{{ $pack->pack_id }}">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="{{ url($pack->pack_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">{{ $pack->pack_libelle }} - {{ $pack->pack_prix }}€</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3"><?php echo $pack->pack_description; ?></span>
                            {{ $pack->stock() }}
                        </div>
                    </label>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="site-section bg-light" id="accessoires-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                    <h2 class="h2-reservation">Complétez la décoration !</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around btn-group btn-group-toggle checkbox-custom" data-toggle="buttons">
            @if(count($accessoires) > 0)
                @foreach($accessoires as $accessoire)
                    <label for="accessoire-{{ $accessoire->accessoire_id }}" class="btn btn-checkbox-custom col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                        <input type="checkbox" name="accessoires[]" id="accessoire-{{ $accessoire->accessoire_id }}" autocomplete="off" value="{{ $accessoire->accessoire_id }}">
                        <div class="block-team-member-1 text-center rounded">
                            <figure>
                                <img src="{{ url($accessoire->accessoire_chemin_img) }}" alt="Image" class="img-fluid rounded-circle">
                            </figure>
                            <h3 class="font-size-20 text-black">{{ $accessoire->accessoire_libelle }} - {{ $accessoire->accessoire_prix }}€</h3>
                            <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3"><?php echo $accessoire->accessoire_description; ?></span>
                            {{ $accessoire->stock() }}
                        </div>
                    </label>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="site-section" id="formdata-section">
    <div class="container">
      <div class="row mb-4 justify-content-center">
          <div class="col-md-7 text-center">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                  <h2 class="h2-reservation">Finalisez votre réservation !</h2>
                  <br>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-5" style="margin: 0 auto;">
              <h5 class="mb-4">Gestion du spa :</h5>
              <div class="form-group mb-4">
                  <label for="emplacement">L'emplacement</label>
                  <select class="form-control" name="emplacement">
                      <option value="" disabled selected hidden>Choisir l'emplacement du spa</option>
                      <option value="interieur">Intérieur</option>
                      <option value="exterieur">Exterieur</option>
                  </select>
              </div>
              <div class="form-group mb-5">
                  <label for="emplacement">Créneau d'installation</label>
                  <select class="form-control" name="emplacement" placeholder="">
                      <option value="" disabled selected hidden>Choisir un moment de la journée</option>
                      <option value="interieur">Matin (8h à 12h)</option>
                      <option value="exterieur">Après-Midi (12h à 17h)</option>
                      <option value="exterieur">Soirée (17h à 21h)</option>
                  </select>
              </div>
              <hr>
              <h5 class="mt-5 mb-4">Informations personnelles :</h5>
              <div class="form-group mb-4">
                  <label for="name">Votre nom et prénom :</label>
                  <input type="text" id="name" class="form-control" name="name" required>
              </div>
              <div class="form-group mb-4">
                  <label for="email">L'adresse mail :</label>
                  <input type="email" id="email" class="form-control" name="email" required>
              </div>
              <div class="form-group mb-5">
                  <label for="phone">Numéro de téléphone :</label>
                  <input type="tel" id="phone" class="form-control" name="phone" required>
              </div>
              <hr>
              <h5 class="mt-5 mb-4">Informations de livraison :</h5>
              <div class="form-group mb-4">
                  <label for="adresse1">L'adresse :</label>
                  <input type="text" id="adresse1" class="form-control" name="adresse1" required>
              </div>
              <div class="row">
                <div class="col-7 form-group mb-4">
                    <label for="ville">La ville :</label>
                    <input type="text" id="ville" class="form-control" name="ville" required>
                </div>
                <div class="col-5 form-group mb-4">
                    <label for="cp">Le code postal :</label>
                    <input type="tel" id="cp" class="form-control" name="cp" required>
                </div>
              </div>
          </div>
          <!-- <div class="col-md-6">
              <h4>Récapitulatif</h4>
          </div> -->
      </div>
      <div class="row justify-content-center mt-4">
        <input type="submit" name="" value="Confirmer ma réservation" class="btn btn-primary btn-md text-white">
      </div>
    </div>
</div>


<script>

    $("#btnMessageSent").click(function() {
        var type = $("input[name='type']:checked").val();

        var name = $('#name').val();
        var phone = $('#tel').val();
        var email = $('#mail').val();
        var note = $('#note').val();
        var rgpd = $('#rgpd').val();

        if(type != "" && name != "" && (phone != "" || email != "") && note != "" && rgpd != "")
        {
            $('#btnMessageSent').val("Envoi en cours...");
            $('#btnMessageSent').attr("disabled", "disabled");

            $.ajax({
                url : "{{ url('/send-message') }}",
                type : 'POST',
                data : '_token={{ csrf_token() }}&type=' + type + '&name=' + name + '&phone=' + phone + '&email=' + email + '&note=' + note,
                success : function(response, statut){
                    $('#modalMessageSent').modal();

                    $('#name').val(null);
                    $('#tel').val(null);
                    $('#mail').val(null);
                    $('#note').val(null);
                    $('#rgpd').prop("checked", false);

                    $('#divError').html(null);

                    $('#btnMessageSent').val("Envoyer");
                    $('#btnMessageSent').attr("disabled", false);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#divError').html(jqXHR.responseText);

                    $('#btnMessageSent').val("Envoyer");
                    $('#btnMessageSent').attr("disabled", false);
                }
            });
        }
        else
        {
            $('#divError').html('Un des champs n\'est pas rempli...');
        }
    });

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

        /*$('#daterange').dateRangePicker({
            autoClose: false,
            format: 'DD/MM/YYYY',
            separator: ' à ',
            language: 'fr',
            startOfWeek: 'monday',
            getValue: function()
                {
                    return $(this).val();
                },
                setValue: function(s)
                {
                    if(!$(this).attr('readonly') && !$(this).is(':disabled') && s != $(this).val())
                    {
                        $(this).val(s);
                    }
                },
            // getValue: function()
            // {
            //     if ($('#daterangestart').val() && $('#daterangeend').val() )
            //         return $('#daterangestart').val() + ' à ' + $('#daterangeend').val();
            //     else
            //         return '';
            // },
            // setValue: function(s,s1,s2)
            // {
            //     $('#daterangestart').val(s1);
            //     $('#daterangeend').val(s2);
            // },
            startDate: "19/09/2020",
            endDate: false,
            time: {
                enabled: false
            },
            minDays: 2,
            maxDays: 5,
            showShortcuts: false,
            beforeShowDay: function(t)
            {
                var day = (t.getDate()<10) ? ('0'+t.getDate()) : t.getDate();
                var month = (t.getMonth()<9) ? ('0'+(t.getMonth()+1)) : (t.getMonth()+1);
                var year = t.getFullYear();

                //console.log('Day : '+day+' - Month : '+month+' - Year : '+year);
                var valid = !(
                    (day == '20' && month == '09' && year == '2020')
                    || (day == '21' && month == '10' && year == '2020')
                );
                var _class = '';
                var _tooltip = valid ? '' : 'Indisponible';
                return [valid,_class,_tooltip];
            },
            customShortcuts : [],
            container:'body',
            alwaysOpen:true,
            singleMonth:1,
        });*/
    });
</script>


@endsection
