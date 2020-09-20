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
                        <a href="{{ url('/reservation#datepicker-section') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="" data-aos-delay="100" style="margin-left: 0;margin-right: auto;">
                <div class="pricing">
                    <h3 class="text-center text-black">1 soirée XL</h3>
                    <div class="price text-center mb-4 ">
                        <span><span>130€</span></span>
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
                        <a href="{{ url('/reservation#datepicker-section') }}" class="btn btn-primary btn-md text-white">Réserver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="site-section" id="datepicker-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8 text-center">
                <div class="block-heading-1" data-aos="" data-aos-delay="">
                    <h2 class="h2-reservation">Quand cela vous fait envie ?</h2>
                    <br>

                    <div class="text-center" id="containerdaterange" style="height:400px;">
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
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                  <figure>
                      <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                  </figure>
                  <h3 class="font-size-20 text-black">Spa Sahara</h3>
                  <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Couleur sable<br> idéal pour l'intérieurs</span>
              </div>
          </div>
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
            </div>
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
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                  <figure>
                      <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                  </figure>
                  <h3 class="font-size-20 text-black">Pack Fun - 20€</h3>
                  <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
              </div>
          </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Pack Romance - 20€</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Pack Chill - 20€</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
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
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                  <figure>
                      <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                  </figure>
                  <h3 class="font-size-20 text-black">Accessoire 1</h3>
                  <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
              </div>
          </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Accessoire 2</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Accessoire 3</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
              <div class="block-team-member-1 text-center rounded">
                  <figure>
                      <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                  </figure>
                  <h3 class="font-size-20 text-black">Accessoire 4</h3>
                  <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
              </div>
          </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Accessoire 5</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up">
                <div class="block-team-member-1 text-center rounded">
                    <figure>
                        <img src="{{ url('medias/img/spas/couleur-baltik.png') }}" alt="Image" class="img-fluid rounded-circle">
                    </figure>
                    <h3 class="font-size-20 text-black">Accessoire 6</h3>
                    <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Description ?</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section" id="formdata-section">
    <div class="container">
      <div class="row mb-4 justify-content-center">
          <div class="col-md-8 text-center">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                  <h2 class="h2-reservation">Finalisez votre réservation !</h2>
                  <br>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
              <h4>Vos informations</h4>
              
          </div>
          <div class="col-md-6">
              <h4>Récapitulatif</h4>
          </div>
      </div>
    </div>
</div>

<script>
    $(document).ready(function() {

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
