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
                            <input type="date" class="form-control" name="reservationDateDebut" id="reservationDateDebut" value="{{ $reservation->reservation_date_debut }}" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationDateFin">Date de fin</label>
                            <input type="date" class="form-control" name="reservationDateFin" id="reservationDateFin" value="{{ $reservation->reservation_date_fin }}" disabled>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationCreneau">Créneau</label>
                            <select class="form-control" name="reservationCreneau" disabled>
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
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="reservationEmplacement">Emplacement</label>
                            <select class="form-control" name="reservationEmplacement" disabled>
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
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-2">Adresse de la reservation </h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-9 form-group">
                            <label for="reservationVille">Ville</label>
                            <input type="text" class="form-control" name="reservationVille" id="reservationVille" value="{{ $reservation->reservation_ville }}" disabled>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="reservationDepartement">Departement</label>
                            <input type="text" class="form-control" name="reservationDepartement" id="reservationDepartement" value="{{ $reservation->reservation_departement }}" disabled>
                        </div>
                        <div class="col-md-8 form-group">
                            <label for="reservationAdresse">Adresse</label>
                            <input type="text" class="form-control" name="reservationAdresse" id="reservationAdresse" value="{{ $reservation->reservation_rue }}" disabled>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="reservationType">Type</label>
                            <input type="text" class="form-control" name="reservationType" id="reservationType" value="{{ $reservation->reservation_type_logement }}" disabled>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationComplement">Complément</label>
                            <input type="text" class="form-control" name="reservationComplement" id="reservationComplement" value="{{ $reservation->reservation_complement }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-2">Informations des produits</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="reservationLibelleSpa">Libellé du spa</label>
                            <input type="text" class="form-control" name="reservationLibelleSpa" id="reservationLibelleSpa" value="{{ $reservation->reservation_spa_libelle }}" disabled>
                        </div>
                        @if($reservation->reservation_pack_id)
                        <div class="col-md-12 form-group">
                            <label for="reservationLibellePack">Libellé du pack</label>
                            <input type="text" class="form-control" name="reservationLibellePack" id="reservationLibellePack" value="{{ $reservation->pack->pack_libelle }}" disabled>
                        </div>
                        @endif
                        @if(count($accessoires) > 0)
                            <div class="col-md-12 form-group">
                                <div class="row">
                                    @foreach($accessoires as $accessoire)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                @if($accessoire->accessoire_id == 2)
                                                    <input class="form-check-input" type="checkbox" disabled checked value="{{ $accessoire->accessoire_id }}" id="reservationLibelleAccessoire{{ $accessoire->accessoire_id }}">
                                                @else
                                                    <input class="form-check-input" type="checkbox" disabled value="{{ $accessoire->accessoire_id }}" id="reservationLibelleAccessoire{{ $accessoire->accessoire_id }}">
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
                <div class="card-body">
                    <h5 class="mt-2">Fiche client </h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="reservationClientName">Nom</label>
                            <input type="text" class="form-control" name="reservationClientName" id="reservationClientName" value="{{ $reservation->client->client_name }}" disabled>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationClientPhone">Téléphone</label>
                            <input type="text" class="form-control" name="reservationClientPhone" id="reservationClientPhone" value="{{ $reservation->client->client_phone }}" disabled>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="reservationClientEmail">Email</label>
                            <input type="text" class="form-control" name="reservationClientEmail" id="reservationClientEmail" value="{{ $reservation->client->client_email }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
