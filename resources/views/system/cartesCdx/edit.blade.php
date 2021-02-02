@extends('layouts.backoffice')

@section('pageTitle', 'Edition Carte Cadeau Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadclient">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($client))
                <h1 class="h3 mb-2 text-gray-800">Visualiser la carte cadeau</h1>
                <p class="mb-4">Client créé le : {{ $client->dateUpdated->format('d M Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter une carte cadeau</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter une carte cadeau à la liste</p>
            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-5 text-right">
            <!-- <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($client))
                    Enregistrer
                @else
                    Ajouter
                @endif
            </button> -->
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6 ml-auto">
            <div class="card">
                <h5 class="card-header titre-card-header">Carte</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="reservationDateDebut">Offre</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="reservationDateDebut" id="reservationDateDebut" value="{{ $carte->cadeau_offre }} - {{ $carte->cadeau_montant }}" disabled>
                            @else
                                <input type="text" class="form-control" name="reservationDateDebut" id="reservationDateDebut">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationDateFin">Montant restant</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="reservationDateFin" id="reservationDateFin" value="{{ $carte->cadeau_montant_restant }}" disabled>
                            @else
                                <input type="text" class="form-control" name="reservationDateFin" id="reservationDateFin">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationDateDebut">Date de début</label>
                            @if(isset($carte))
                                <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut" value="{{ $carte->cadeau_date_debut }}">
                            @else
                                <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationDateFin">Date de fin</label>
                            @if(isset($carte))
                                <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin" value="{{ $carte->cadeau_date_fin }}">
                            @else
                                <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationDateFin">Code</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="reservationDateFin" id="reservationDateFin" value="{{ $carte->cadeau_code }}">
                            @else
                                <input type="text" class="form-control" name="reservationDateFin" id="reservationDateFin">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mr-auto">
            <div class="card">
                <h5 class="card-header titre-card-header">Fiche client (achat)</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Nom</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="name" id="name" value="{{ $carte->clientPaiement->client_name }}">
                            @else
                                <input type="text" class="form-control" name="name" id="name" value="">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="phone">Téléphone</label>
                            @if(isset($carte))
                                <input type="tel" class="form-control" name="phone" id="phone" maxlength="10" value="{{ $carte->clientPaiement->client_phone }}">
                            @else
                                <input type="tel" class="form-control" name="phone" id="phone" maxlength="10" value="">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="email" id="email" value="{{ $carte->clientPaiement->client_email }}">
                            @else
                                <input type="text" class="form-control" name="email" id="email" value="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 ml-auto">
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
        </div>
        <div class="col-3 mr-auto">
            <div class="card">
                <h5 class="card-header titre-card-header">Fiche client</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Nom</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="name" id="name" value="{{ $carte->clientPaiement->client_name }}">
                            @else
                                <input type="text" class="form-control" name="name" id="name" value="">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="phone">Téléphone</label>
                            @if(isset($carte))
                                <input type="tel" class="form-control" name="phone" id="phone" maxlength="10" value="{{ $carte->clientPaiement->client_phone }}">
                            @else
                                <input type="tel" class="form-control" name="phone" id="phone" maxlength="10" value="">
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="email" id="email" value="{{ $carte->clientPaiement->client_email }}">
                            @else
                                <input type="text" class="form-control" name="email" id="email" value="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>

@endsection
