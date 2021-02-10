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
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($carte))
                    Enregistrer
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6 ml-auto">
            <div class="card">
                <h5 class="card-header titre-card-header">Carte</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="offre">Offre</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="offre" id="offre" value="{{ $carte->cadeau_offre }}">
                            @else
                                <input type="text" class="form-control" name="offre" id="offre">
                            @endif
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="montant">Montant</label>
                            @if(isset($carte))
                                <input type="number" class="form-control" name="montant" id="montant" value="{{ $carte->cadeau_montant }}">
                            @else
                                <input type="number" class="form-control" name="montant" id="montant">
                            @endif
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="montantRestant">Montant restant</label>
                            @if(isset($carte))
                                <input type="number" class="form-control" name="montantRestant" id="montantRestant" value="{{ $carte->cadeau_montant_restant }}">
                            @else
                                <input type="number" class="form-control" name="montantRestant" id="montantRestant">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="dateDebut">Date de début</label>
                            @if(isset($carte))
                                <input type="date" class="form-control" name="dateDebut" id="dateDebut" value="{{ $carte->cadeau_date_debut }}">
                            @else
                                <input type="date" class="form-control" name="dateDebut" id="dateDebut">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="dateFin">Date de fin</label>
                            @if(isset($carte))
                                <input type="date" class="form-control" name="dateFin" id="dateFin" value="{{ $carte->cadeau_date_fin }}">
                            @else
                                <input type="date" class="form-control" name="dateFin" id="dateFin">
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="CodeKdo">Code</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="CodeKdo" id="CodeKdo" value="{{ $carte->cadeau_code }}">
                            @else
                                <input type="text" class="form-control" name="CodeKdo" id="CodeKdo">
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
                            @if(isset($carte))
                                <input type="text" class="form-control" name="ville" id="ville" value="{{ $carte->cadeau_ville }}">
                            @else
                                <input type="text" class="form-control" name="ville" id="ville">
                            @endif

                        </div>
                        <div class="col-md-3 form-group">
                            <label for="departement">Departement</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="departement" id="departement" value="{{ $carte->cadeau_departement }}">
                            @else
                                <input type="text" class="form-control" name="departement" id="departement">
                            @endif

                        </div>
                        <div class="col-md-12 form-group">
                            <label for="adresse1">Adresse</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="adresse1" id="adresse1" value="{{ $carte->cadeau_rue }}">
                            @else
                                <input type="text" class="form-control" name="adresse1" id="adresse1">
                            @endif

                        </div>
                        <div class="col-md-12 form-group">
                            <label for="adresse2">Complément</label>
                            @if(isset($carte))
                                <input type="text" class="form-control" name="adresse2" id="adresse2" value="{{ $carte->cadeau_complement }}">
                            @else
                                <input type="text" class="form-control" name="adresse2" id="adresse2">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mr-auto">
            <!-- <div class="card">
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
            </div> -->
        </div>
    </div>


</form>

@endsection
