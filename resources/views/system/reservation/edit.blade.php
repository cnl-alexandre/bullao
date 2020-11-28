@extends('layouts.backoffice')

@section('pageTitle', 'Visualiser reservation Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadreservation">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($reservation))
                <h1 class="h3 mb-2 text-gray-800">Visualiser la reservation</h1>
                <p class="mb-4">Réservation faite le : {{ $reservation->dateUpdated->format('d M Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter une reservation</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter une reservation à la liste</p>

            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-5 text-right">
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
                            <label for="reservationCreneau">Créneau</label>
                            <select class="form-control" name="reservationCreneau">
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
                            <label for="reservationEmplacement">Emplacement</label>
                            <select class="form-control" name="reservationEmplacement">

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
                            <label for="reservationMontant">Montant total</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationMontant" id="reservationMontant" value="{{ $reservation->reservation_montant_total }}" disabled>
                            @else
                                <input type="text" class="form-control" name="reservationMontant" id="reservationMontant">
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
                            <label for="reservationVille">Ville</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationVille" id="reservationVille" value="{{ $reservation->reservation_ville }}">
                            @else
                                <input type="text" class="form-control" name="reservationVille" id="reservationVille">
                            @endif

                        </div>
                        <div class="col-md-3 form-group">
                            <label for="reservationDepartement">Departement</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationDepartement" id="reservationDepartement" value="{{ $reservation->reservation_departement }}">
                            @else
                                <input type="text" class="form-control" name="reservationDepartement" id="reservationDepartement">
                            @endif

                        </div>
                        <div class="col-md-8 form-group">
                            <label for="reservationAdresse">Adresse</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationAdresse" id="reservationAdresse" value="{{ $reservation->reservation_rue }}">
                            @else
                                <input type="text" class="form-control" name="reservationAdresse" id="reservationAdresse">
                            @endif

                        </div>
                        <div class="col-md-4 form-group">
                            <label for="reservationType">Type</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationType" id="reservationType" value="{{ $reservation->reservation_type_logement }}">
                            @else
                                <input type="text" class="form-control" name="reservationType" id="reservationType">
                            @endif

                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationComplement">Complément</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationComplement" id="reservationComplement" value="{{ $reservation->reservation_complement }}">
                            @else
                                <input type="text" class="form-control" name="reservationComplement" id="reservationComplement">
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
                            <label for="reservationLibellePack">Pack</label>
                            <select class="form-control" name="reservationLibellePack" id="reservationLibellePack">
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
                                <label for="reservationLibelleAccessoires">Accessoires</label>
                                <div class="row">

                                        @foreach($accessoires as $accessoire)
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    @if(isset($reservation) && in_array($accessoire->accessoire_id, $idAccessoiresReservation))
                                                        <input class="form-check-input" type="checkbox" checked value="{{ $accessoire->accessoire_id }}" id="reservationLibelleAccessoire{{ $accessoire->accessoire_id }}">
                                                    @else
                                                        <input class="form-check-input" type="checkbox" value="{{ $accessoire->accessoire_id }}" id="reservationLibelleAccessoire{{ $accessoire->accessoire_id }}">
                                                    @endif
                                                    <label class="form-check-label" for="reservationLibelleAccessoire{{ $accessoire->accessoire_id }}">
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
                            <label for="reservationClientName">Nom</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationClientName" id="reservationClientName" value="{{ $reservation->client->client_name }}" disabled>
                            @else
                                <input type="text" class="form-control" name="reservationClientName" id="reservationClientName">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationClientPhone">Téléphone</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationClientPhone" id="reservationClientPhone" value="{{ $reservation->client->client_phone }}" disabled>
                            @else
                                <input type="text" class="form-control" name="reservationClientPhone" id="reservationClientPhone">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationClientEmail">Email</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationClientEmail" id="reservationClientEmail" value="{{ $reservation->client->client_email }}" disabled>
                            @else
                                <input type="text" class="form-control" name="reservationClientEmail" id="reservationClientEmail">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @if(isset($reservation))
                <div class="card">
                    <h5 class="card-header titre-card-header">Carte</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    $address = str_replace(" ", "+",$reservation->reservation_rue.", ".$reservation->reservation_ville);
                                ?>
                                <iframe style="width: 100%; height: 600px;;" frameborder="0" src="https://maps.google.it/maps?q={{ $address }}&output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            @else

            @endif

        </div>
    </div>
</form>

@endsection
