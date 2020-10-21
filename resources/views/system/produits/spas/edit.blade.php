@extends('layouts.backoffice')

@section('pageTitle', 'Nouveau spa Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadSpa">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($spa))
                <h1 class="h3 mb-2 text-gray-800">Modifier le spa</h1>
                <p class="mb-4">Dernière mise à jour le : {{ $spa->dateUpdated->format('d-m-Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter un spa</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter un spa à la liste</p>
            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-5 text-right">
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($spa))
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
                <div class="card-body">
                    <h4>Propriétés du spa </h4>
                    <hr>
                    <div class="form-group">
                        <label for="spaLibelle">Nom du spa</label>
                        @if(isset($spa))
                            <input type="text" class="form-control" name="spaLibelle" id="spaLibelle" value="{{ $spa->spa_libelle }}" placeholder="Libellé du spa (ex: Spa Baltik)">
                        @else
                            <input type="text" class="form-control" name="spaLibelle" id="spaLibelle" placeholder="Libellé du spa (ex: Spa Baltik)">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="spaPlace">Nombre de personnes max</label>
                        <div class="input-group mb-3">
                            @if(isset($spa))
                                <input type="text" class="form-control" name="spaPlace" id="spaPlace" value="{{ $spa->spa_nb_place }}" placeholder="Nombre de place">
                            @else
                                <input type="text" class="form-control" name="spaPlace" id="spaPlace" placeholder="Nombre de place">
                            @endif
                            <div class="input-group-append">
                                <span class="input-group-text">place(s)</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="spaPrix">Prix du spa</label>
                        <div class="input-group mb-3">
                            @if(isset($spa))
                                <input type="number" class="form-control" name="spaPrix" id="spaPrix" value="{{ $spa->spa_prix }}" placeholder="Prix de la première journée">
                            @else
                                <input type="number" class="form-control" name="spaPrix" id="spaPrix" placeholder="Prix de la première journée">
                            @endif
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="spaPrixSupp">Prix jour supplémentaire</label>
                        <div class="input-group mb-3">
                            @if(isset($spa))
                                <input type="number" class="form-control" name="spaPrixSupp" id="spaPrixSupp" value="{{ $spa->spa_prix_jour_supp }}" placeholder="Prix jours supplémentaires">
                            @else
                                <input type="number" class="form-control" name="spaPrixSupp" id="spaPrixSupp" placeholder="Prix jours supplémentaires">
                            @endif
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="spaStock">Stock physique</label>
                        @if(isset($spa))
                            <input type="number" class="form-control" name="spaStock" id="spaStock" value="{{ $spa->spa_stock }}" placeholder="Nb de spa dispo">
                        @else
                            <input type="number" class="form-control" name="spaStock" id="spaStock" placeholder="Nb de spa dispo">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="spaDescription">Description</label>
                        @if(isset($spa))
                            <textarea rows="4" class="form-control" name="spaDescription" id="spaDescription">{{ $spa->spa_desc }}</textarea>
                        @else
                            <textarea rows="4" class="form-control" name="spaDescription" id="spaDescription"></textarea>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mr-auto my-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="mt-2">Image produit</h5>
                    <hr>
                    <div class="file-field text-center">
                        <div class="z-depth-1-half mb-4">
                            <img id="previewImg" src="{{ url('medias/img/no-image.png') }}" style="width: 200px;" class="img-fluid">
                        </div>
                        <div class="d-flex justify-content-center">
                            <div style="width: 100%; margin: 0;" class="file btn btn-primary btn-block select">
                                <div id="div-choose">
                                    Choisir un fichier
                                </div>
                                <input type="file" name="photo" id="photo" class="file-upload">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
