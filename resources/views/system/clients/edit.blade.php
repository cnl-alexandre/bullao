@extends('layouts.backoffice')

@section('pageTitle', 'Edition client Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadclient">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($client))
                <h1 class="h3 mb-2 text-gray-800">Visualiser le client</h1>
                <p class="mb-4">Client créé le : {{ $client->dateUpdated->format('d M Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter un client</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter un client à la liste</p>
            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-5 text-right">
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($client))
                    Enregistrer
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6 ml-auto">
            @if(isset($client))
                @if(count($adresses) > 0)
                    @foreach($adresses as $adresse)
                        <div class="card">
                            <h5 class="card-header titre-card-header">Adresse : {{ $adresse->adresse_name }} - reference#{{ $adresse->adresse_id }}</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <label for="adresseVille">Ville</label>
                                        <input type="text" class="form-control" name="adresseVille" id="adresseVille" value="{{ $adresse->adresse_ville }}">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="adresseDepartement">Departement</label>
                                        <input type="text" class="form-control" name="adresseDepartement" id="adresseDepartement" value="{{ $adresse->adresse_departement }}">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="adresseAdresse">Adresse</label>
                                        <input type="text" class="form-control" name="adresseAdresse" id="adresseAdresse" value="{{ $adresse->adresse_rue }}">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="reservationComplement">Complément</label>
                                        <input type="text" class="form-control" name="adresseComplement" id="adresseComplement" value="{{ $adresse->adresse_complement }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card">
                        <h5 class="card-header titre-card-header">Adresse</h5>
                        <div class="card-body text-center">
                            Il n'y a pas d'adresse sur ce profil
                        </div>
                    </div>
                @endif
            @else
            <div class="card">
                <h5 class="card-header titre-card-header">Adresse</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 form-group">
                            <label for="adresseVille">Ville</label>
                            <input type="text" class="form-control" name="adresseVille" id="adresseVille" value="">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="adresseDepartement">Departement</label>
                            <input type="text" class="form-control" name="adresseDepartement" id="adresseDepartement" value="">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="adresseAdresse">Adresse</label>
                            <input type="text" class="form-control" name="adresseAdresse" id="adresseAdresse" value="">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationComplement">Complément</label>
                            <input type="text" class="form-control" name="adresseComplement" id="adresseComplement" value="">
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-3 mr-auto">
            <div class="card">
                <h5 class="card-header titre-card-header">Fiche client</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="clientName">Nom</label>
                            @if(isset($client))
                                <input type="text" class="form-control" name="clientName" id="clientName" value="{{ $client->client_name }}">
                            @else
                                <input type="text" class="form-control" name="clientName" id="clientName" value="">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationClientPhone">Téléphone</label>
                            @if(isset($client))
                                <input type="text" class="form-control" name="clientPhone" id="clientPhone" value="{{ $client->client_phone }}">
                            @else
                                <input type="text" class="form-control" name="clientPhone" id="clientPhone" value="">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationClientEmail">Email</label>
                            @if(isset($client))
                                <input type="text" class="form-control" name="clientEmail" id="clientEmail" value="{{ $client->client_email }}">
                            @else
                                <input type="text" class="form-control" name="clientEmail" id="clientEmail" value="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($client))
        @if(count($reservations) > 0)
            @foreach($reservations as $reservation)
                <div class="row mb-4">
                    <div class="col-6 ml-auto">
                        <div class="card">
                            <h5 class="card-header titre-card-header">
                                Propriétés de la reservation reference#{{ $reservation->reservation_id }}
                                <a class="" href="{{ url('/system/reservations/edit/'.$reservation->reservation_id) }}">voir</a>
                            </h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="reservationDateDebut">Date de début</label>
                                        <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut" value="{{ $reservation->reservation_date_debut }}" disabled>
                                        </div>
                                    <div class="col-md-6 form-group">
                                        <label for="reservationDateFin">Date de fin</label>
                                        <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin" value="{{ $reservation->reservation_date_fin }}" disabled>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="reservationCreneau">Créneau</label>

                                        <select class="form-control" name="reservationCreneau" disabled>
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
                                        <select class="form-control" name="reservationEmplacement" disabled>

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
                                        <label for="reservationLibelleSpa">Spa</label>
                                        <input type="text" class="form-control" name="reservationMontant" id="reservationMontant" value="{{ $reservation->reservation_spa_libelle }}" disabled>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="reservationMontant">Montant total</label>
                                        <input type="text" class="form-control" name="reservationMontant" id="reservationMontant" value="{{ $reservation->reservation_montant_total }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mr-auto">
                        <div class="card">
                            <h5 class="card-header titre-card-header">Carte</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            $address = str_replace(" ", "+",$reservation->reservation_rue.", ".$reservation->reservation_ville);
                                        ?>
                                        <iframe style="width: 100%; height: 296px;" frameborder="0" src="https://maps.google.it/maps?q={{ $address }}&output=embed"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="row mb-4">
                <div class="col-6 mx-auto">
                    <div class="card">
                        <h5 class="card-header titre-card-header">Réservation</h5>
                        <div class="card-body text-center">
                            Il n'y a pas de réservations
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
</form>

@endsection
