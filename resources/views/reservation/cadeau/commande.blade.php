@extends('layouts.tunnel')

@section('pageTitle', 'Réservation | '.env('APP_NAME'))

@section('content')

<form class="" action="{{ url('/cartecadeau/offrir/submit') }}" method="post">

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
                        <h1 class="card-header titre-card-header">Détail de la commande :</h1>
                        <div class="card-body">

                            <div style="border: 1px solid #e9ecef;padding: 20px;">
                                <img src="{{ url('/medias/img/cadeaux/paquet.png') }}" class="mb-2" width="170px" alt="">
                                <h4>{{ $libelle }}</h4>
                                <p class="mb-0">Une valeur de {{ $prix }}€ valable 24 mois</p>
                            </div>
                            <input type="hidden" name="montant" value="{{ $prix }}">
                            <input type="hidden" name="offre" value="{{ $libelle }}">

                            <div class="row mt-5">
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
            <div class="row justify-content-center">
                <input type="hidden" name="step" value="2">

            </div>
        </div>
    </div>

</form>

<footer>
    @include('partials.footer-tunnel')
</footer>

<script>

    $("#acceptCGV").click(function() {
        inputCheck();
    });

    function inputCheck() {
        if($("#acceptCGV").is(':checked') )
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


    $(document).ready(function() {
        $('#btn-confirm').attr("disabled", true);
        $('#btn-confirm').attr("title", "Vous devez accepter les CGV.");
    });
</script>


@endsection
