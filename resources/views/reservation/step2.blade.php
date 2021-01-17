@extends('layouts.tunnel')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<form class="" action="{{ url('/reservation/informations') }}" method="post">

    {{ csrf_field() }}

    <div class="site-section site-step-2 bg-light" id="formdata-section">
        <div class="container">

            <div class="row mt-5 mt-md-4 mb-5 mb-md-4 d-flex justify-content-center">
                <div class="align-self-center">
                    <img src="{{ url('medias/img/pictos/reservation-on.png') }}" alt="">
                    <img src="{{ url('medias/img/pictos/separator-on.png') }}" class="separator" alt="">
                    <img src="{{ url('medias/img/pictos/livraison-on.png') }}" alt="">
                    <img src="{{ url('medias/img/pictos/separator-off.png') }}" class="separator" alt="">
                    <img src="{{ url('medias/img/pictos/paiement-off.png') }}" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 mb-5" style="margin-left: auto;">
                    <!--<ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab">J'ai déjà réservé</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab">Pas encore inscrit ?</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" name="login" placeholder="Entrez votre identifiant">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel">
                            <br>-->

                            <div class="card shadow mb-4">
                                <h1 class="card-header titre-card-header">Installation du spa-jacuzzi :</h1>
                                <div class="card-body">


                                    Quel est votre logement ?
                                    <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom" data-toggle="buttons" required>
                                        <label for="type_logement" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 typeLogement">
                                            <input type="radio" name="type_logement" class="typeLogement" value="Maison">
                                            <div class="block-team-member-1 text-center rounded" style="padding: 17px 5px 0px 5px;">
                                                <p class="font-size-15" style="color: #525252;">Une maison</p>
                                            </div>
                                        </label>
                                        <label for="type_logement" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 typeLogement">
                                            <input type="radio" name="type_logement" class="typeLogement" value="Appartement">
                                            <div class="block-team-member-1 text-center rounded"  style="padding: 17px 5px 0px 5px;">
                                                <p class="font-size-15" style="color: #525252;">Un appartement</p>
                                            </div>
                                        </label>
                                    </div>

                                    Où posera-t-on le spa ?
                                    <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom" data-toggle="buttons">
                                        <label for="emplacement" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 emplacement">
                                            <input type="radio" name="emplacement" class="emplacement" value="Intérieur">
                                            <div class="block-team-member-1 text-center rounded" style="padding: 17px 10px 0px 10px;">
                                                <p class="font-size-15" style="color: #525252;">À l'intérieur</p>
                                            </div>
                                        </label>
                                        <label for="emplacement" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 emplacement">
                                            <input type="radio" name="emplacement"  class="emplacement" value="Extérieur">
                                            <div class="block-team-member-1 text-center rounded"  style="padding: 17px 10px 0px 10px;">
                                                <p class="font-size-15" style="color: #525252;">À l'extérieur</p>
                                            </div>
                                        </label>
                                    </div>


                                    Quel moment de la journée ?
                                    <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom" data-toggle="buttons">
                                        <label for="creneau" class="btn btn-radio-custom col-lg-12 col-md-12 creneau">
                                            <input type="radio" name="creneau" class="creneau" value="Entre 8h et 12h">
                                            <div class="block-team-member-1 text-center rounded" style="padding: 17px 10px 0px 10px;">
                                                <p class="font-size-15" style="color: #525252;">Entre 8h et 12h - Recommandé</p>
                                            </div>
                                        </label>
                                        <label for="creneau" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 creneau">
                                            <input type="radio" name="creneau" class="creneau" value="Entre 12h et 15h">
                                            <div class="block-team-member-1 text-center rounded"  style="padding: 17px 10px 0px 10px;">
                                                <p class="font-size-15" style="color: #525252;">Entre 12h et 15h</p>
                                            </div>
                                        </label>
                                        <label for="creneau" class="btn btn-radio-custom col-lg-6 col-md-6 col-6 mb-3 creneau">
                                            <input type="radio" name="creneau" class="creneau" value="Entre 15h et 20h">
                                            <div class="block-team-member-1 text-center rounded"  style="padding: 17px 10px 0px 10px;">
                                                <p class="font-size-15" style="color: #525252;">Entre 15h et 20h</p>
                                            </div>
                                        </label>
                                        <small class="text-left">Idéal en début de journée pour une eau à température.</small>
                                    </div>

                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <h1 class="card-header titre-card-header">Informations personnelles :</h1>
                                <div class="card-body">
                                    <div class="form-group mb-4">
                                        <label for="name">Votre nom et prénom :</label>
                                        <input type="text" id="name" class="form-control" name="name" maxlength="100" placeholder="John Doe" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="email">L'adresse mail :</label>
                                        <input type="email" id="email" class="form-control" name="email" maxlength="100" placeholder="mon-adresse@email.com" required>
                                        <small>Vous ne recevrez pas de spams, c'est promis !</small>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone">Numéro de téléphone :</label>
                                        <input type="tel" id="phone" class="form-control" name="phone" maxlength="10" placeholder="0612345678" required>
                                        <small>Uniquement si besoin le jour de la location.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow">
                                <h1 class="card-header titre-card-header">Adresse de livraison :</h1>
                                <div class="card-body">
                                    <div class="form-group mb-4">
                                        <label for="adresse1">L'adresse :</label>
                                        <input type="text" id="adresse1" class="form-control" name="adresse1" maxlength="100" placeholder="39 chemin de la porte verte" required>
                                    </div>
                                    <div class="row">
                                    <div class="col-7 form-group">
                                        <label for="ville">La ville :</label>
                                        <input type="text" id="ville" class="form-control" name="ville" maxlength="100" placeholder="Montévrain" required>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="departement">Le département :</label>
                                        <select class="form-control" name="departement" id="departement" required>
                                            <option value="" disabled selected hidden>77 ou 75 ?</option>
                                            <option value="75">75</option>
                                            <option value="77">77</option>
                                        </select>
                                        <!-- <input type="tel" id="cp" class="form-control" name="cp"> -->
                                    </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="adresse2">Complément d'adresse <small>(facultatif)</small> :</label>
                                        <input type="text" id="adresse2" class="form-control" name="adresse2" placeholder="3eme étage, code 3321" maxlength="100">
                                    </div>

                                </div>
                            </div>

                        <!--</div>
                    </div>-->


                </div>
                <div class="col-lg-5 col-md-6" style="margin-right: auto;height: min-content;">

                    <div class="card shadow">
                        <h1 class="card-header titre-card-header">Détail de la réservation :</h1>
                        <div class="card-body">
                            <img src="{{ url($reservation->spa->spa_chemin_img) }}" alt="Spa Intex choix réservation" width="150px">
                            <br>
                            <div class="row" style="color: #525252">
                                <div class="col-12 text-left">
                                    <b>Du {{ $reservation->dateDebut->format('d/m/Y') }} au {{ $reservation->dateFin->format('d/m/Y') }}</b>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-left">
                                    {{ $reservation->reservation_spa_libelle }}
                                </div>
                                <div class="col-6 text-right">
                                    {{ number_format($reservation->reservation_prix, 2, '.', ' ') }}€
                                </div>
                            </div>


                            @if($joursSupp != "0")
                                <div class="row">
                                    <div class="col-6 text-left">
                                        + {{ $joursSupp }} jour(s) en plus
                                    </div>
                                    <div class="col-6 text-right">
                                        {{ number_format($reservation->spa->calculPrixJoursSupp($joursSupp, $reservation->spa), 2, '.', ' ') }}€
                                    </div>
                                </div>
                            @endif



                            @if($reservation->reservation_pack_id != NULL)
                                <hr>

                                <div class="row mb-2">
                                    <img src="{{ url($reservation->pack->pack_chemin_img) }}" width="100px" style="padding-left: 15px;" alt="">
                                </div>
                                <div class="row">
                                    <div class="col-6 text-left">
                                        + {{ $reservation->pack->pack_libelle }}
                                    </div>
                                    <div class="col-6 text-right">
                                        {{ number_format($reservation->pack->pack_prix, 2, '.', ' ') }}€
                                    </div>
                                </div>
                            @endif

                            @if(count($reservation->accessoires) > 0)
                                <hr>
                                <div class="row mb-2">
                                    @foreach($reservation->accessoires as $accessoire)
                                        <img src="{{ url($accessoire->accessoire->accessoire_chemin_img) }}" width="100px" style="padding-left: 15px;" alt="">
                                    @endforeach
                                </div>
                                @foreach($reservation->accessoires as $accessoire)
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            + {{ $accessoire->accessoire->accessoire_libelle }}
                                        </div>
                                        <div class="col-6 text-right">
                                            {{ number_format($accessoire->accessoire->accessoire_prix, 2, '.', ' ') }}€
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <hr>
                            <div class="row"  style="color: #525252">
                                <div class="col-6 text-left">
                                    <h5>Sous-total :</h5>
                                </div>
                                <div class="col-6 text-right">
                                    <span id="recap-sous-total">{{ number_format($reservation->reservation_montant_total, 2, '.', ' ') }}</span>€
                                </div>
                            </div>

                                <div class="form-group mt-3 mb-4">
                                    <label for="promo">Vous avez un code promo ?</label>
                                    <input type="text" id="promo" class="form-control" name="promo" placeholder="MONCODE" maxlength="15">
                                </div>

                            <div id="bloc-promo">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        Promo :
                                    </div>
                                    <div class="col-6 text-right">
                                        -<span id="recap-promo"></span>€
                                    </div>
                                </div>
                            </div>
                            <div id="bloc-frais-km">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        Frais km :
                                    </div>
                                    <div class="col-6 text-right">
                                        +<span id="recap-frais-km"></span>€
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding: 10px 0px 5px 0px;margin: 25px 0px 17px 0px;background-color: #efefef;color: #525252;">
                                <div class="col-6 text-left">
                                    <h5>Total :</h5>
                                </div>
                                <div class="col-6 text-right">
                                    <span id="recap-montant-total">{{ number_format($reservation->reservation_montant_total, 2, '.', ' ') }}</span>€
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="acceptCGV" value="yes" id="acceptCGV">
                                        <label class="form-check-label" for="acceptCGV">
                                            J'ai lu et j'accepte les <a href="{{ url('/cgv-bullao') }}" target="_blank">CGV - Bullao</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <a href="{{ url('/') }}" class="btn btn-secondary btn-md text-white">Annuler</a>
                                </div>
                                <div class="col-6 text-right">
                                    <input type="submit" name="" id="btn-confirm" value="Confirmer l'achat" class="btn btn-primary bg-action btn-md text-white">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div>
                <input type="hidden" name="step" value="2">
                <input type="hidden" name="id" value="{{ $reservation->reservation_id }}">
                <input type="hidden" name="montant_without_promo" id="montant_without_promo" value="{{ $reservation->reservation_montant_total }}">
                <input type="hidden" name="montant_without_frais_km" id="montant_without_frais_km" value="{{ $reservation->reservation_montant_total }}">
                <input type="hidden" name="montant_total" id="montant_total" value="{{ $reservation->reservation_montant_total }}">
            </div>
        </div>
    </div>

</form>

<footer>
    @include('partials.footer-tunnel')
</footer>

<script>

    $("#promo").keyup(function() {
        var code = $(this).val();
        var montant = $('#montant_total').val();
        var montantWithoutPromo = $('#montant_without_promo').val();
        var montantWithoutFrais = $('#montant_without_frais_km').val();

        if(code != "")
        {
            $.ajax({
                url : "{{ url('/webservices/promo/verify') }}",
                type : 'POST',
                data : '_token={{ csrf_token() }}&code=' + code,
                success : function(response, statut){
                    if(response != "" && typeof response == "object")
                    {
                        $("#promo").addClass('is-valid');
                        $("#promo").removeClass('is-invalid');

                        // console.log(response);
                        if(typeof response['promo'] !== 'undefined'){
                            var promo = parseFloat(montantWithoutFrais)*(parseFloat(response['promo']['promo_valeur'])/100);
                            $('#recap-promo').html(promo.toFixed(2));
                            var montant_total = parseFloat(montantWithoutFrais)-parseFloat(promo);
                        }
                        else if (typeof response['carte'] !== 'undefined') {
                            var carte = parseFloat(response['carte']['cadeau_montant_restant']);
                            $('#recap-promo').html(carte.toFixed(2));
                            var montant_total = parseFloat(montantWithoutFrais)-parseFloat(carte);

                            console.log("carte : "+carte);

                            if (montant_total <= '0') {
                                var montant_total = parseFloat(0);
                            }

                            // if(carte > montant_total){
                            //     // $('#recap-promo').html(montant_total.toFixed(2));
                            //     var montant_total = parseFloat(0);
                            // }
                            console.log("Total : "+montant_total); console.log("Montant base : "+montantWithoutFrais);

                        }
                        $('#bloc-promo').css("display", "block");

                        //$('#recap-sous-total').html(montant.toFixed(2));
                        $('#montant_total').val(montant_total.toFixed(2));
                        $('#recap-montant-total').html(montant_total.toFixed(2));
                    }
                    else
                    {
                        $('#bloc-promo').css("display", "none");

                        montantWithoutPromo = parseFloat(montantWithoutPromo);

                        $('#montant_total').val(montantWithoutPromo.toFixed(2));
                        $('#recap-montant-total').html(montantWithoutPromo.toFixed(2));

                        $("#promo").removeClass('is-valid');
                        $("#promo").addClass('is-invalid');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('ERREUR : '+jqXHR.responseText);

                    $('#bloc-promo').css("display", "none");

                    montantWithoutPromo = parseFloat(montantWithoutPromo);

                    $('#montant_total').val(montantWithoutPromo.toFixed(2));
                    $('#recap-montant-total').html(montantWithoutPromo.toFixed(2));

                    $("#promo").removeClass('is-valid');
                    $("#promo").addClass('is-invalid');
                }
            });
        }
        else
        {
            $('#bloc-promo').css("display", "none");

            montantWithoutPromo = parseFloat(montantWithoutPromo);

            $('#montant_total').val(montantWithoutPromo.toFixed(2));
            $('#recap-montant-total').html(montantWithoutPromo.toFixed(2));

            $("#promo").removeClass('is-valid');
            $("#promo").addClass('is-invalid');
        }
    });

    $("#acceptCGV").click(function() {
        inputCheck();
    });
    $(".typeLogement").change(function() {
        inputCheck();
    });
    $(".emplacement").change(function() {
        inputCheck();
    });
    $(".creneau").change(function() {
        inputCheck();
    });

    function inputCheck() {
        if($("#acceptCGV").is(':checked') && $(".typeLogement").is(':checked') && $(".emplacement").is(':checked') && $(".creneau").is(':checked'))
        {
            $('#btn-confirm').attr("disabled", false);
            $('#btn-confirm').attr("title", null);
        }
        else
        {
            $('#btn-confirm').attr("disabled", true);
            $('#btn-confirm').attr("title", "Vous devez remplir toutes les informations.");
        }

    }

    /*$("#departement").change(function() {
        var montant = $('#montant_total').val();
        var montantWithoutFrais = $('#montant_without_frais_km').val();

        var value = $(this).val();

        if(value == '75')
        {
            var frais = 10.00;

            $('#bloc-frais-km').css("display", "block");
            $('#recap-frais-km').html(frais.toFixed(2));

            var montant_total = parseFloat(montant)+parseFloat(frais);

            $('#montant_total').val(montant_total.toFixed(2));
            $('#montant_without_promo').val(montant_total.toFixed(2));
            $('#recap-montant-total').html(montant_total.toFixed(2));
        }
        else
        {
            $('#bloc-frais-km').css("display", "none");
            $('#recap-frais-km').html(null);

            montantWithoutFrais = parseFloat(montantWithoutFrais);

            $('#montant_total').val(montantWithoutFrais.toFixed(2));
            $('#montant_without_promo').val(montantWithoutFrais.toFixed(2));
            $('#recap-montant-total').html(montantWithoutFrais.toFixed(2));
        }
    });*/

    $(document).ready(function() {
        $('#bloc-promo').css("display", "none");
        $('#bloc-frais-km').css("display", "none");
        $('#btn-confirm').attr("disabled", true);
        $('#btn-confirm').attr("title", "Vous devez accepter les CGV.");
    });
</script>


@endsection
