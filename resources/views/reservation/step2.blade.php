@extends('layouts.tunnel')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<form class="" action="{{ url('/reservation/informations') }}" method="post">

    {{ csrf_field() }}

    <div class="site-section" id="formdata-section">
        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                        <h2 class="h2-reservation">6. Votre réservation</h2>
                        <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-6" style="margin-left: auto;margin-right: auto;">
                    <h5 class="mb-4">Gestion du spa :</h5>
                    <div class="form-group mb-4">
                        <label for="type_logement">Type d'habitation</label>
                        <select class="form-control" name="type_logement" required>
                            <option value="" disabled selected hidden>Choisir le type d'habitation</option>
                            <option value="maison">Maison</option>
                            <option value="appartement">Appartement</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="emplacement">L'emplacement</label>
                        <select class="form-control" name="emplacement" required>
                            <option value="" disabled selected hidden>Choisir l'emplacement du spa</option>
                            <option value="interieur">Intérieur</option>
                            <option value="exterieur">Exterieur</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="creneau">Créneau d'installation</label>
                        <select class="form-control" name="creneau"  required>
                            <option value="" disabled selected hidden>Choisir un moment de la journée</option>
                            <option value="matin">Matin (8h à 12h)</option>
                            <option value="aprem">Après-Midi (12h à 17h) Recommandé</option>
                            <option value="soir">Soirée (17h à 21h)</option>
                        </select>
                        <small>Idéal en début de journée pour une eau à température</small>
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
                      <div class="col-7 form-group">
                          <label for="ville">La ville :</label>
                          <input type="text" id="ville" class="form-control" name="ville" required>
                      </div>
                      <div class="col-5 form-group">
                          <label for="cp">Le département :</label>
                          <select class="form-control" name="departement">
                              <option value="" disabled selected hidden>Dept</option>
                              <option value="75">75</option>
                              <option value="77">77</option>
                          </select>
                          <!-- <input type="tel" id="cp" class="form-control" name="cp"> -->
                      </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="adresse2">Complément d'adresse :</label>
                        <input type="text" id="adresse2" class="form-control" name="adresse2">
                    </div>
                    <hr>
                    <h5 class="mt-5 mb-4">Vous avez une réduction ?</h5>
                    <div class="form-group mb-4">
                        <label for="promo">Code promo :</label>
                        <input type="text" id="promo" class="form-control" name="promo">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6" style="margin-left: auto;margin-right: auto;">
                    <h5>Mon panier</h5>
                    <hr>
                    @if (request()->is('reservation/4places'))
                        <div class="row">
                            <div class="col-6 text-left">
                                Formule 1 soirée
                            </div>
                        </div>
                    @elseif (request()->is('reservation/6places'))
                        <div class="row">
                            <div class="col-6 text-left">
                                Formule 1 soirée XL
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6 text-left">
                            <span id="recap-spa-libelle"></span>
                        </div>
                        <div class="col-6 text-right">
                            <span id="recap-spa-prix"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            <span id="recap-jours-libelle"></span>
                        </div>
                        <div class="col-6 text-right">
                            <span id="recap-jours-prix"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-left">
                            Du <span id="recap-date-debut"></span> au <span id="recap-date-fin"></span>
                        </div>
                    </div>
                    <hr id="separation-recap"/>
                    <div class="row">
                        <div class="col-6 text-left">
                            <span id="recap-pack-libelle"></span>
                        </div>
                        <div class="col-6 text-right">
                            <span id="recap-pack-prix"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            <span id="recap-accessoires-libelle"></span>
                        </div>
                        <div class="col-6 text-right">
                            <span id="recap-accessoires-prix"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="row bloc-promo">
                        <div class="col-6 text-left">
                            <h5>Code promo :</h5>
                        </div>
                        <div class="col-6 text-right">
                            -<span id="recap-promo">0.00</span>%
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            <h5>Total :</h5>
                        </div>
                        <div class="col-6 text-right">
                            <span id="recap-montant-total">0.00</span>€
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <input type="hidden" name="step" value="2">
                <input type="hidden" name="id" value="{{ $reservation->reservation_id }}">
                <input type="submit" name="" value="Confirmer ma réservation" class="btn btn-primary btn-md text-white">
            </div>
        </div>
    </div>

</form>

<footer style="background-color:#F4F4F4;">
    @include('partials.footer-tunnel')
</footer>

<script>

    $("#promo").keyup(function() {
        var code = $(this).val();
        var montant = $('#montant_total').val();
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

                        $('#bloc-promo').css("display", "block");
                        $('#recap-promo').html(response['promo']['promo_valeur']);

                        var promo = parseFloat(montant)*(parseFloat(response['promo']['promo_valeur'])/100);

                        var montant_total = parseFloat(montant)-parseFloat(promo);
                        var recap_montant_total = parseFloat(montant)-parseFloat(promo);

                        $('#montant_total').val(montant_total.toFixed(2));
                        $('#recap-montant-total').html(recap_montant_total.toFixed(2));
                    }
                    else
                    {
                        $('#bloc-promo').css("display", "none");
                        var oldPromo = $('#recap-promo').html();
                        //$('#recap-promo').html(null);

                        if(oldPromo != "0.00")
                        {
                            var promo = parseFloat(montant)*(parseFloat(oldPromo)/100);

                            var montant_total = parseFloat(montant)+parseFloat(promo);
                            var recap_montant_total = parseFloat(montant)+parseFloat(promo);

                            var montantWithoutPromo = parseFloat($('#montant_without_promo').val());

                            $('#montant_total').val(montantWithoutPromo.toFixed(2));
                            $('#recap-montant-total').html(montantWithoutPromo.toFixed(2));
                        }

                        $("#promo").removeClass('is-valid');
                        $("#promo").addClass('is-invalid');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('ERREUR : '+jqXHR.responseText);

                    var oldPromo = parseFloat($('#recap-promo').html());
                    $('#recap-promo').html(null);

                    var promo = parseFloat(montant)*(parseFloat(oldPromo)/100);

                    var montant_total = parseFloat(montant)+parseFloat(promo);
                    var recap_montant_total = parseFloat(montant)-parseFloat(promo);

                    var montantWithoutPromo = parseFloat($('#montant_without_promo').val());

                    $('#montant_total').val(montantWithoutPromo.toFixed(2));
                    $('#recap-montant-total').html(montantWithoutPromo.toFixed(2));

                    $("#promo").removeClass('is-valid');
                    $("#promo").addClass('is-invalid');
                }
            });
        }
        else
        {
            $("#promo").removeClass('is-valid');
            $("#promo").removeClass('is-invalid');
        }
    });

    $(document).ready(function() {

        $('.bloc-promo').css("display", "none");
    });
</script>


@endsection
