@extends('layouts.backoffice')

@section('pageTitle', 'Visualiser reservation Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadreservation">
    {{ csrf_field() }}
     <div class="row"> <!-- Header title + cta -->
        <div class="col-md-4 text-left">
            @if(isset($reservation))
                <h1 class="h3 mb-2 text-gray-800">Éditer une reservation</h1>
                <p class="mb-4">Fait le : {{ $reservation->dateUpdated->format('d M Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter une reservation</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter une reservation à la liste</p>

            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-8 text-right">
            @if(isset($reservation))
                <a href="{{ url('/system/reservation/'.$reservation->reservation_id.'/send/client') }}" class="btn btn-secondary btn-lg">
                    Mail client
                </a>
                <a href="{{ url('/system/reservation/'.$reservation->reservation_id.'/send/admin') }}" class="btn btn-secondary btn-lg">
                    Mail admin
                </a>
            @endif
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($reservation))
                    Enregistrer
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </div>

    <div class="row">

        <!-- Mise à jour front -->
        <div class="col-12 col-xl-9 ml-auto mr-auto">
            <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card">
                        <h5 class="card-header titre-card-header">Réservation</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="reservationDateDebut">Date installation</label>
                                            @if(isset($reservation))
                                                <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut" value="{{ $reservation->reservation_date_debut }}">
                                            @else
                                                <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut">
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="reservationDateFin">Date désinstallation</label>
                                            @if(isset($reservation))
                                                <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin" value="{{ $reservation->reservation_date_fin }}">
                                            @else
                                                <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="reservationHeureDebut">Heure installation</label>
                                            @if(isset($reservation))
                                                <input type="time" class="form-control" name="reservationHeureDebut" id="reservationHeureDebut" value="{{ $reservation->reservation_heure_install }}">
                                            @else
                                                <input type="time" class="form-control" name="reservationHeureDebut" id="reservationHeureDebut">
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="reservationHeureFin">Heure désinstallation</label>
                                            @if(isset($reservation))
                                                <input type="time" class="form-control" name="reservationHeureFin" id="reservationHeureFin" value="{{ $reservation->reservation_heure_desinstall }}">
                                            @else
                                                <input type="time" class="form-control" name="reservationHeureFin" id="reservationHeureFin">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="name">Nom client</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="name" id="name" value="{{ $reservation->client->client_name }}">
                                            @else
                                                @if($client != null)
                                                    <input type="text" class="form-control" name="name" id="name" value="{{ $client->client_name }}">
                                                @else
                                                    <input type="text" class="form-control" name="name" id="name">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card">
                        <h5 class="card-header titre-card-header">Localisation</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9 form-group">
                                            <label for="ville">Ville</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="ville" id="ville" value="{{ $reservation->reservation_ville }}">
                                            @else
                                                @if($client != null)
                                                    <input type="text" class="form-control" name="ville" id="ville" value="{{ $client->firstAddress()->adresse_ville }}">
                                                @else
                                                    <input type="text" class="form-control" name="ville" id="ville">
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="cp">Code postal</label>
                                            @if(isset($reservation))
                                                <input type="number" class="form-control" name="cp" id="cp" value="{{ $reservation->reservation_cp }}">
                                            @else
                                                @if($client != null)
                                                    <input type="number" class="form-control" name="cp" id="cp" value="{{ $client->firstAddress()->adresse_cp }}">
                                                @else
                                                    <input type="number" class="form-control" name="cp" id="cp">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9 form-group">
                                            <label for="adresse1">Adresse</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="adresse1" id="adresse1" value="{{ $reservation->reservation_rue }}">
                                            @else
                                                @if($client != null)
                                                    <input type="text" class="form-control" name="adresse1" id="adresse1" value="{{ $client->firstAddress()->adresse_rue }}">
                                                @else
                                                    <input type="text" class="form-control" name="adresse1" id="adresse1">
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="departement">Département</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="departement" id="departement" value="{{ $reservation->reservation_departement }}">
                                            @else
                                                @if($client != null)
                                                    <input type="text" class="form-control" name="departement" id="departement" value="{{ $client->firstAddress()->adresse_departement }}">
                                                @else
                                                    <input type="text" class="form-control" name="departement" id="departement">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="adresse2">Complément</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="adresse2" id="adresse2" value="{{ $reservation->reservation_complement }}">
                                            @else
                                                @if($client != null)
                                                    <input type="text" class="form-control" name="adresse2" id="adresse2" value="{{ $client->firstAddress()->adresse_complement }}">
                                                @else
                                                    <input type="text" class="form-control" name="adresse2" id="adresse2">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-xl-9 ml-auto mr-auto mb-4">
            <div class="card">
                <h5 class="card-header titre-card-header">Commande</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="type_logement">Type</label>
                                    @if(isset($reservation))
                                        <input type="text" class="form-control" name="type_logement" id="type_logement" value="{{ $reservation->reservation_type_logement }}">
                                    @else
                                        <input type="text" class="form-control" name="type_logement" id="type_logement">
                                    @endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="Remplissage">Remplissage</label>
                                    @if(isset($reservation))
                                        <input type="text" class="form-control" name="remplissage" id="remplissage" value="{{ $reservation->reservation_remplissage }}">
                                    @else
                                        <input type="text" class="form-control" name="remplissage" id="remplissage">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="reservationLibelleSpa">Spa</label>
                                    <select class="form-control" name="reservationLibelleSpa" id="reservationLibelleSpa">
                                        <option value="">Sélection du spa (obligatoire)</option>
                                        @if(isset($reservation))
                                            @foreach($spas as $spa)
                                                @if($reservation->reservation_spa_id == $spa->spa_id)
                                                    <option value="{{ $spa->spa_id }}" selected>{{ $spa->spa_libelle }} {{ $spa->spa_nb_place }} places</option>
                                                @else
                                                    <option value="{{ $spa->spa_id }}">{{ $spa->spa_libelle }} {{ $spa->spa_nb_place }} places</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($spas as $spa)
                                                <option value="{{ $spa->spa_id }}">{{ $spa->spa_libelle }} {{ $spa->spa_nb_place }} places</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="pack">Pack</label>
                                    <select class="form-control" name="pack" id="pack">
                                        @if(isset($reservation))
                                            <option value="">Pas de pack sélectionné</option>
                                            @foreach($packs as $pack)
                                                @if($reservation->reservation_pack_id == $pack->pack_id)
                                                    <option value="{{ $pack->pack_id }}" selected>{{ $pack->pack_libelle }}</option>
                                                @else
                                                    <option value="{{ $pack->pack_id }}">{{ $pack->pack_libelle }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Sélection du pack</option>
                                            @foreach($packs as $pack)
                                                <option value="{{ $pack->pack_id }}">{{ $pack->pack_libelle }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                @if(count($accessoires) > 0)
                                    <div class="col-md-12 form-group">
                                        <label for="accessoire">Accessoires</label>
                                        <div class="row">
                                            @foreach($accessoires as $accessoire)
                                                <div class="col-md-4 mb-3">
                                                    <div class="form-check">
                                                        @if(isset($reservation) && in_array($accessoire->accessoire_id, $idAccessoiresReservation))
                                                            <input class="form-check-input" type="checkbox" checked value="{{ $accessoire->accessoire_id }}" id="accessoire{{ $accessoire->accessoire_id }}">
                                                        @else
                                                            <input class="form-check-input" type="checkbox" value="{{ $accessoire->accessoire_id }}" id="accessoire{{ $accessoire->accessoire_id }}" disabled>
                                                        @endif
                                                        <label class="form-check-label" for="accessoire{{ $accessoire->accessoire_id }}">
                                                            {{ $accessoire->accessoire_libelle }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-xl-9 ml-auto mr-auto">
            <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card">
                        <h5 class="card-header titre-card-header">Paiement</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="montant_total">Montant total</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="montant_total" id="montant_total" value="{{ $reservation->reservation_montant_total }}">
                                            @else
                                                <input type="text" class="form-control" name="montant_total" id="montant_total">
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="montant_total">Moyen de paiement</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="montant_total" id="montant_total" value="{{ $reservation->reservation_moyen_paiement }}">
                                            @else
                                                <input type="text" class="form-control" name="montant_total" id="montant_total">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 form-group mt-4">
                                            @if(isset($reservation))
                                                @if($reservation->reservation_paye == 1)
                                                    <input type="checkbox" class="form-check-label" name="paie" value="paie" checked>
                                                @else
                                                    <input type="checkbox" class="form-check-label" name="paie" value="paie">
                                                @endif
                                            @else
                                                <input type="checkbox" class="form-check-label" name="paie" value="paie">
                                            @endif
                                            <label for="">Payé</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card">
                        <h5 class="card-header titre-card-header">Autres</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="phone">Téléphone</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $reservation->client->client_phone }}">
                                            @else
                                                <input type="text" class="form-control" name="phone" id="phone">
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="email">Email</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="email" id="email" value="{{ $reservation->client->client_email }}">
                                            @else
                                                <input type="text" class="form-control" name="email" id="email">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="adresse1">Informations +</label>
                                            @if(isset($reservation))
                                                <input type="text" class="form-control" name="adresse1" id="adresse1" value="">
                                            @else
                                                <input type="text" class="form-control" name="adresse1" id="adresse1">
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-xl-9 mx-auto my-2">
            @if(isset($reservation))
                <div class="card">
                    <h5 class="card-header titre-card-header">Carte</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    $address = str_replace(" ", "+",$reservation->reservation_rue.", ".$reservation->reservation_ville);
                                ?>
                                <iframe style="width: 100%; height: 450px;;" frameborder="0" src="https://maps.google.it/maps?q={{ $address }}&output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            @else

            @endif
        </div>



<!--
        <div class="col-md-6 ml-auto my-3">
            <div class="card">
                <h5 class="card-header titre-card-header">Propriétés de la reservation</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="reservationDateDebut">Date de début</label>
                            @if(isset($reservation))
                                <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut" value="{{ $reservation->reservation_date_debut }}">
                            @else
                                <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationDateFin">Date de fin</label>
                            @if(isset($reservation))
                                <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin" value="{{ $reservation->reservation_date_fin }}">
                            @else
                                <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin">
                            @endif

                        </div>
                        <div class="col-md-6 form-group">
                            <label for="creneau">Créneau</label>
                            <select class="form-control" name="creneau">
                                @if(isset($reservation))
                                    @if($reservation->reservation_creneau == "Entre 8h et 12h")
                                        <option value="Entre 8h et 12h" selected>Entre 8h et 12h</option>
                                    @else
                                        <option value="Entre 8h et 12h">Entre 8h et 12h</option>
                                    @endif
                                    @if($reservation->reservation_creneau == "Entre 12h et 15h")
                                        <option value="Entre 12h et 15h" selected>Entre 12h et 15h</option>
                                    @else
                                        <option value="Entre 12h et 15h">Entre 12h et 15h</option>
                                    @endif
                                    @if($reservation->reservation_creneau == "Entre 15h et 20h")
                                        <option value="Entre 15h et 20h" selected>Entre 15h et 20h</option>
                                    @else
                                        <option value="Entre 15h et 20h">Entre 15h et 20h</option>
                                    @endif
                                @else
                                    <option value="">Sélection du créneau</option>
                                    <option value="Entre 8h et 12h">Entre 8h et 12h</option>
                                    <option value="Entre 12h et 15h">Entre 12h et 15h</option>
                                    <option value="Entre 15h et 20h">Entre 15h et 20h</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="emplacement">Emplacement</label>
                            <select class="form-control" name="emplacement">

                                @if(isset($reservation))
                                    @if($reservation->reservation_emplacement == "Intérieur")
                                        <option value="Intérieur" selected>Intérieur</option>
                                    @else
                                        <option value="Intérieur">Intérieur</option>
                                    @endif
                                    @if($reservation->reservation_emplacement == "Extérieur")
                                        <option value="Extérieur" selected>Extérieur</option>
                                    @else
                                        <option value="Extérieur">Extérieur</option>
                                    @endif
                                @else
                                    <option value="">Sélection de l'emplacement</option>
                                    <option value="Intérieur">Intérieur</option>
                                    <option value="Extérieur">Extérieur</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="montant_total">Montant total</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="montant_total" id="montant_total" value="{{ $reservation->reservation_montant_total }}" disabled>
                            @else
                                <input type="text" class="form-control" name="montant_total" id="montant_total" disabled>
                            @endif
                        </div>
                        <div class="col-md-2 form-check">
                            <input type="checkbox" class="form-check-label" name="paie" value="paie" checked>
                            <label for="">Payé</label>
                        </div>
                        <div class="col-md-4">
                            <label for="montant_total">Moyen de paiement</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="montant_total" id="montant_total" value="{{ $reservation->reservation_moyen_paiement }}" disabled>
                            @else
                                <input type="text" class="form-control" name="montant_total" id="montant_total" disabled>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <h5 class="card-header titre-card-header">Adresse de la reservation</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 form-group">
                            <label for="ville">Ville</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="ville" id="ville" value="{{ $reservation->reservation_ville }}">
                            @else
                                <input type="text" class="form-control" name="ville" id="ville">
                            @endif

                        </div>
                        <div class="col-md-3 form-group">
                            <label for="departement">Departement</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="departement" id="departement" value="{{ $reservation->reservation_departement }}">
                            @else
                                <input type="text" class="form-control" name="departement" id="departement">
                            @endif

                        </div>
                        <div class="col-md-8 form-group">
                            <label for="adresse1">Adresse</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="adresse1" id="adresse1" value="{{ $reservation->reservation_rue }}">
                            @else
                                <input type="text" class="form-control" name="adresse1" id="adresse1">
                            @endif

                        </div>
                        <div class="col-md-4 form-group">
                            <label for="type_logement">Type</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="type_logement" id="type_logement" value="{{ $reservation->reservation_type_logement }}">
                            @else
                                <input type="text" class="form-control" name="type_logement" id="type_logement">
                            @endif

                        </div>
                        <div class="col-md-12 form-group">
                            <label for="adresse2">Complément</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="adresse2" id="adresse2" value="{{ $reservation->reservation_complement }}">
                            @else
                                <input type="text" class="form-control" name="adresse2" id="adresse2">
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <h5 class="card-header titre-card-header">Informations des produits</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="reservationLibelleSpa">Spa</label>
                            <select class="form-control" name="reservationLibelleSpa" id="reservationLibelleSpa">
                                <option value="">Sélection du spa (obligatoire)</option>
                                @if(isset($reservation))
                                    @foreach($spas as $spa)
                                        @if($reservation->reservation_spa_id == $spa->spa_id)
                                            <option value="{{ $spa->spa_id }}" selected>{{ $spa->spa_libelle }} {{ $spa->spa_nb_place }} places</option>
                                        @else
                                            <option value="{{ $spa->spa_id }}">{{ $spa->spa_libelle }} {{ $spa->spa_nb_place }} places</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($spas as $spa)
                                        <option value="{{ $spa->spa_id }}">{{ $spa->spa_libelle }} {{ $spa->spa_nb_place }} places</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>

                        <div class="col-md-12 form-group">
                            <label for="pack">Pack</label>
                            <select class="form-control" name="pack" id="pack">
                                @if(isset($reservation))
                                    <option value="">Pas de pack sélectionné</option>
                                    @foreach($packs as $pack)
                                        @if($reservation->reservation_pack_id == $pack->pack_id)
                                            <option value="{{ $pack->pack_id }}" selected>{{ $pack->pack_libelle }}</option>
                                        @else
                                            <option value="{{ $pack->pack_id }}">{{ $pack->pack_libelle }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="">Sélection du pack</option>
                                    @foreach($packs as $pack)
                                        <option value="{{ $pack->pack_id }}">{{ $pack->pack_libelle }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        @if(count($accessoires) > 0)
                            <div class="col-md-12 form-group">
                                <label for="accessoire">Accessoires</label>
                                <div class="row">
                                    @foreach($accessoires as $accessoire)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                @if(isset($reservation) && in_array($accessoire->accessoire_id, $idAccessoiresReservation))
                                                    <input class="form-check-input" type="checkbox" checked value="{{ $accessoire->accessoire_id }}" id="accessoire{{ $accessoire->accessoire_id }}">
                                                @else
                                                    <input class="form-check-input" type="checkbox" value="{{ $accessoire->accessoire_id }}" id="accessoire{{ $accessoire->accessoire_id }}" disabled>
                                                @endif
                                                <label class="form-check-label" for="accessoire{{ $accessoire->accessoire_id }}">
                                                    {{ $accessoire->accessoire_libelle }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mr-auto my-3">
            <div class="card">
                @if(isset($reservation))
                    <h5 class="card-header titre-card-header">Fiche client <a href="{{ url('/system/clients/edit/'.$reservation->reservation_client_id) }}">voir</a></h5>
                @else
                    <h5 class="card-header titre-card-header">Fiche client</h5>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Nom</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="name" id="name" value="{{ $reservation->client->client_name }}">
                            @else
                                <input type="text" class="form-control" name="name" id="name">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="phone">Téléphone</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $reservation->client->client_phone }}">
                            @else
                                <input type="text" class="form-control" name="phone" id="phone">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="email" id="email" value="{{ $reservation->client->client_email }}">
                            @else
                                <input type="text" class="form-control" name="email" id="email">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>


        </div>
         -->

    </div>
</form>

@endsection
