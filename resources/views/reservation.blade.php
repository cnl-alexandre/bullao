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
            <div class="row d-flex justify-content-around btn-group btn-group-toggle radio-custom" data-toggle="buttons">
                @if(count($spas) > 0)
                    @foreach($spas as $spa)
                        <label for="spa-{{ $spa->spa_id }}" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 spa-recap" data-aos="fade-up" rel="{{ $spa->spa_prix }}" rel2="{{ $spa->spa_libelle }} {{ $spa->spa_nb_place }} places">
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
                        <label for="pack-{{ $pack->pack_id }}" class="btn btn-radio-custom col-lg-4 col-md-6 mb-3 pack-recap" id="label-pack-{{ $pack->pack_id }}" data-aos="fade-up" rel="{{ $pack->pack_prix }}" rel2="{{ $pack->pack_libelle }}">
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
            <input type="hidden" name="prixPack" id="prixPack" value="0.00">
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
                        <label for="accessoire-{{ $accessoire->accessoire_id }}" class="btn btn-checkbox-custom col-lg-3 col-md-4 mb-3 accessoire-recap" data-aos="fade-up" rel="{{ $accessoire->accessoire_prix }}" rel2="{{ $accessoire->accessoire_libelle }}">
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
            <input type="hidden" name="prixAccessoire" id="prixAccessoire" value="0.00">
        </div>
    </div>

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
                          <select class="form-control" name="cp">
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
                <input type="hidden" name="montant_total" id="montant_total">
                <input type="hidden" name="prix" id="prix">
                <input type="hidden" name="montant_without_promo" id="montant_without_promo">
                <input type="submit" name="" value="Confirmer ma réservation" class="btn btn-primary btn-md text-white">
            </div>
        </div>
    </div>

</form>


<script>

    $(".daterange").change(function() {
        var d = $('#daterange').val();
        var dates = d.split(" - ");
        var nbJours = calculNbJoursReservation(dates[0], dates[1]);

        $('#recap-date-debut').html(dates[0]);
        $('#recap-date-fin').html(dates[1]);
    });

    $(".spa-recap").click(function() {
        var prixSpa = $(this).attr("rel");
        var spa = $(this).attr("rel2");

        $('#recap-spa-libelle').html(spa);
        $('#recap-spa-prix').html(prixSpa+"€");

        $('#prixSpa').val(prixSpa);

        // Montant total
        var d = $('#daterange').val();
        var dates = d.split(" - ");
        var p = calculPrixReservation(dates[0], dates[1], prixSpa);

        $('#montant_total').val(p.toFixed(2));
        $('#montant_without_promo').val(p.toFixed(2));
        $('#prix').val(p.toFixed(2));
        $('#recap-montant-total').html(p.toFixed(2));

        // Calcul des jours de réservation
        var nbJours = calculNbJoursReservation(dates[0], dates[1]);

        var jours = "";
        var prix = 0.00;

        jours = "+ "+(nbJours-1)+" jour(s) supplémentaire(s)";

        if(nbJours > 1)
        {
            if(nbJours == 2)
            {
                prix = 40.00;
            }
            else if(nbJours == 3)
            {
                prix = 80.00;
            }
            else if(nbJours == 4)
            {
                prix = 110.00;
            }
            else if(nbJours > 4)
            {
                prix = 110.00 + ((nbJours-4)*20.00);
            }

            $('#recap-jours-libelle').html(jours);
            $('#recap-jours-prix').html(prix+"€");
        }
    });

    $(".pack-recap").click(function() {
        var pack = $(this).attr("rel2");
        var prix = $(this).attr("rel");

        $('#prixPack').val(prix);

        $('#recap-pack-libelle').html("+ "+pack);
        $('#recap-pack-prix').html(prix+"€");

        // Montant total
        var p = $('#prix').val();

        var pPack = parseFloat(p)+parseFloat(prix);

        $('#separation-recap').css("display", "block");

        $('#montant_total').val(pPack.toFixed(2));
        $('#montant_without_promo').val(pPack.toFixed(2));
        $('#recap-montant-total').html(pPack.toFixed(2));
    });

    $('.accessoire-recap').click(function() {
        setTimeout(function(){
            var lib = "";
            var price = "";
            var pAccessoire = 0.00;
            $('label.accessoire-recap.active').each(function() {
                var libelle = $(this).attr("rel2");
                var prix = $(this).attr("rel");

                lib += "+ "+libelle+"<br>";
                price += prix+"€<br>";

                pAccessoire += parseFloat(prix);
            });

            $('#recap-accessoires-libelle').html(lib);
            $('#recap-accessoires-prix').html(price);

            // Montant total
            var p = $('#prix').val();
            var pPack = $('#prixPack').val();

            if(lib != "" || pPack != "0.00")
            {
                $('#separation-recap').css("display", "block");
            }
            else
            {
                $('#separation-recap').css("display", "none");
            }

            var prixAccessoire = parseFloat(p)+parseFloat(pAccessoire)+parseFloat(pPack)

            $('#montant_total').val(prixAccessoire.toFixed(2));
        $('#montant_without_promo').val(prixAccessoire.toFixed(2));
            $('#recap-montant-total').html(prixAccessoire.toFixed(2));
        }, 100);
    });

    @if(count($packs) > 0)
        $("#btn-pack-clear").click(function() {
            @foreach($packs as $pack)
                $("#label-pack-{{ $pack->pack_id }}").removeClass("active");
            @endforeach

            $('#recap-pack-libelle').html(null);
            $('#recap-pack-prix').html(null);

            // Montant total
            var pPack = $('#prixPack').val();
            var prix = $('#recap-montant-total').html();
            var total = parseFloat(prix)-parseFloat(pPack);

            $('#montant_total').val(total.toFixed(2));
            $('#montant_without_promo').val(total.toFixed(2));
            $('#recap-montant-total').html(total.toFixed(2));

            $('#prixPack').val("0.00");

            var pAccessoire = 0.00;
            $('label.accessoire-recap.active').each(function() {
                var prix = $(this).attr("rel");

                pAccessoire += parseFloat(prix);
            });

            if(pAccessoire == 0.00)
            {
                $('#separation-recap').css("display", "none");
            }

            return false;
        });
    @endif

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

        $('#separation-recap').css("display", "none");
        $('.bloc-promo').css("display", "none");

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
