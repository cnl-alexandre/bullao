@extends('layouts.backoffice')

@section('pageTitle', 'Nouvelle reservation Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadreservation">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($reservation))
                <h1 class="h3 mb-2 text-gray-800">Modifier la reservation</h1>
                <p class="mb-4">Dernière mise à jour le : {{ $reservation->dateUpdated->format('d-m-Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter une reservation</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter une reservation à la liste</p>

            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-5 text-right">
            <!-- <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($reservation))
                    Enregistrer
                @else
                    Ajouter
                @endif
            </button> -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 ml-auto my-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-2">Propriétés de la reservation </h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="reservationDateDebut">Date de début</label>
                            @if(isset($reservation))
                                <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut">
                            @else
                                <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationDateFin">Date de fin</label>
                            @if(isset($reservation))
                                <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin">
                            @else
                                <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationCreneau">Créneau</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationCreneau" id="reservationCreneau" value="{{ $reservation->reservation_creneau }}">
                            @else
                                <input type="text" class="form-control" name="reservationCreneau" id="reservationCreneau">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationEmplacement">Emplacement</label>
                            @if(isset($reservation))
                                <input type="text" class="form-control" name="reservationEmplacement" id="reservationEmplacement" value="{{ $reservation->reservation_emplacement }}">
                            @else
                                <input type="text" class="form-control" name="reservationEmplacement" id="reservationEmplacement">
                            @endif
                        </div>
                    </div>
                    <h5 class="mt-2">Adresse de la reservation </h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-9 form-group">
                            <label for="reservationVille">Ville</label>
                            <input type="text" class="form-control" name="reservationVille" id="reservationVille" value="{{ $reservation->reservation_ville }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="reservationDepartement">Departement</label>
                            <input type="text" class="form-control" name="reservationDepartement" id="reservationDepartement" value="{{ $reservation->reservation_departement }}">
                        </div>
                        <div class="col-md-8 form-group">
                            <label for="reservationAdresse">Adresse</label>
                            <input type="text" class="form-control" name="reservationAdresse" id="reservationAdresse" value="{{ $reservation->reservation_rue }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="reservationType">Type</label>
                            <input type="text" class="form-control" name="reservationType" id="reservationType" value="{{ $reservation->reservation_type_logement }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationComplement">Complément</label>
                            <input type="text" class="form-control" name="reservationComplement" id="reservationComplement" value="{{ $reservation->reservation_complement }}">
                        </div>
                    </div>
                    <h5 class="mt-2">Informations des produits</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="reservationLibelleSpa">Libellé du spa</label>
                            <input type="text" class="form-control" name="reservationLibelleSpa" id="reservationLibelleSpa" value="{{ $reservation->reservation_spa_libelle }}">
                        </div>
                        @if($reservation->reservation_pack_id)
                        <div class="col-md-12 form-group">
                            <label for="reservationLibellePack">Libellé du pack</label>
                            <input type="text" class="form-control" name="reservationLibellePack" id="reservationLibellePack" value="{{ $reservation->pack->pack_libelle }}">
                        </div>
                        @endif
                        @if(count($reservation->accessoires) > 0)
                            @foreach($reservation->accessoires as $accessoire)
                                <div class="col-md-12 form-group">
                                    <label for="reservationLibelleAccessoire">Accessoire</label>
                                    <input type="text" class="form-control" name="reservationLibelleAccessoire" id="reservationLibelleAccessoire" value="{{ $accessoire->accessoire->accessoire_libelle }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mr-auto my-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-2">Fiche client </h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="reservationClientName">Nom</label>
                            <input type="text" class="form-control" name="reservationClientName" id="reservationClientName" value="{{ $reservation->client->client_name }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationClientPhone">Téléphone</label>
                            <input type="text" class="form-control" name="reservationClientPhone" id="reservationClientPhone" value="{{ $reservation->client->client_phone }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationClientEmail">Email</label>
                            <input type="text" class="form-control" name="reservationClientEmail" id="reservationClientEmail" value="{{ $reservation->client->client_email }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection