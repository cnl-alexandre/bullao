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
    <div class="row">
        <div class="col-6 ml-auto">
            @if(count($adresses) > 0)
                <?php $i=1; ?>
                @foreach($adresses as $adresse)
                    <div class="card mb-4">
                        <h5 class="card-header titre-card-header">Adresse : {{ $adresse->adresse_name }} - reference#{{ $adresse->adresse_id }}</h5>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="id-{{ $i }}" value="{{ $adresse->adresse_id }}">
                                <div class="col-md-9 form-group">
                                    <label for="ville-{{ $i }}">Ville</label>
                                    <input type="text" class="form-control" name="ville-{{ $i }}" id="ville-{{ $i }}" value="{{ $adresse->adresse_ville }}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="cp-{{ $i }}">Code postal</label>
                                    <input type="text" class="form-control" name="cp-{{ $i }}" id="cp-{{ $i }}" value="{{ $adresse->adresse_cp }}">
                                </div>
                                <div class="col-md-9 form-group">
                                    <label for="adresse1-{{ $i }}">Adresse</label>
                                    <input type="text" class="form-control" name="adresse1-{{ $i }}" id="adresse1-{{ $i }}" value="{{ $adresse->adresse_rue }}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="departement-{{ $i }}">Departement</label>
                                    <input type="text" class="form-control" name="departement-{{ $i }}" id="departement-{{ $i }}" value="{{ $adresse->adresse_departement }}">
                                </div>
                                <div class="col-md-9 form-group">
                                    <label for="adresse2-{{ $i }}">Complément</label>
                                    <input type="text" class="form-control" name="adresse2-{{ $i }}" id="adresse2-{{ $i }}" value="{{ $adresse->adresse_complement }}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="nomAdresse-{{ $i }}">Nom de l'adresse</label>
                                    <input type="text" class="form-control" name="nomAdresse-{{ $i }}" id="nomAdresse-{{ $i }}" value="{{ $adresse->adresse_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
            @else
                <div class="card">
                    <h5 class="card-header titre-card-header">Adresse</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 form-group">
                                <label for="ville">Ville</label>
                                <input type="text" class="form-control" name="ville" id="ville">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="departement">Departement</label>
                                <input type="text" class="form-control" name="departement" id="departement">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="adresse1">Adresse</label>
                                <input type="text" class="form-control" name="adresse1" id="adresse1">
                            </div>
                            <div class="col-md-9 form-group">
                                <label for="adresse2">Complément</label>
                                <input type="text" class="form-control" name="adresse2" id="adresse2">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="nomAdresse">Nom de l'adresse</label>
                                <input type="text" class="form-control" name="nomAdresse" id="nomAdresse" disabled>
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
                            <label for="name">Nom</label>
                            @if(isset($client))
                                <input type="text" class="form-control" name="name" id="name" value="{{ $client->client_name }}">
                            @else
                                <input type="text" class="form-control" name="name" id="name" value="">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="phone">Téléphone</label>
                            @if(isset($client))
                                <input type="tel" class="form-control" name="phone" id="phone" maxlength="10" value="{{ $client->client_phone }}">
                            @else
                                <input type="tel" class="form-control" name="phone" id="phone" maxlength="10" value="">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            @if(isset($client))
                                <input type="text" class="form-control" name="email" id="email" value="{{ $client->client_email }}">
                            @else
                                <input type="text" class="form-control" name="email" id="email" value="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="ml-auto mr-auto mb-4" style="width: 70%;">
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
            @endforeach
        @else
            <div class="row mb-4">
                <div class="col-6 ml-auto">
                    <div class="card">
                        <h5 class="card-header titre-card-header">Réservation</h5>
                        <div class="card-body text-center">
                            Il n'y a pas de réservations <br>
                            <a href="{{ url('/system/reservations/new/') }}">Ajouter une réservation</a>
                        </div>
                    </div>
                </div>
                <div class="col-3 mr-auto">

                </div>
            </div>
        @endif
    @endif
</form>

@endsection
