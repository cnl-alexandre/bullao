@extends('layouts.tunnel')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<!-- <section class="site-section bg-light pb-4" id="pricing-section">
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="align-self-center">
                <img src="{{ url('medias/img/pictos/reservation-on.png') }}" alt="">
                <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                <img src="{{ url('medias/img/pictos/livraison-off.png') }}" alt="">
                <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                <img src="{{ url('medias/img/pictos/paiement-off.png') }}" alt="">
            </div>
        </div>
    </div>
</section> -->

<form class="" action="{{ $action }}" method="post">

    {{ csrf_field() }}

    <div class="site-section tunnel-achat picker-section bg-light" id="datepicker-section">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-7 mt-2">
                    <div class="block-heading" data-aos="" data-aos-delay="">
                        <h2 class="h2-reservation">Commencer une reservation</h2>
                        <p>Quand souhaitez-vous profiter d'un spa chez vous ?
                            <br><small>La date de pose doit être différente de la date de retrait.</small></p>
                        <br>
                        <div class="text-center" id="containerdaterange" style="height:330px;">
                          <div class="form-group">
                              <label for="daterange">Choisir les dates :</label>
                              <input readonly required type="text" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4} - [0-9]{2}/[0-9]{2}/[0-9]{4}" id="daterange" class="form-control daterange text-center" name="daterange">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 px-0 text-center sticky">
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

        $('#btn-confirm').attr("disabled", false);


    });

    $(document).ready(function() {

        $('#btn-confirm').attr("disabled", true);
        $('#btn-confirm').attr("title", "Vous devez choisir un spa.");

        // Gestion du scroll automatique
        var url = $(location).attr('href');

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
                days: 20
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

            setTimeout(function(){
                $('#daterange').trigger('click');
            }, 1);
        });

        daterangepicker.prototype.outsideClick = function(e) {};
    });
</script>

@endsection
