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
        <div class="col-md-6 mx-auto my-3">
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
                        @if(isset($spa))
                            <input type="text" class="form-control" name="spaPlace" id="spaPlace" value="{{ $spa->spa_nb_place }}" placeholder="Nombre de place">
                        @else
                            <input type="text" class="form-control" name="spaPlace" id="spaPlace" placeholder="Nombre de place">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="spaPrix">Prix du spa</label>
                        @if(isset($spa))
                            <input type="number" class="form-control" name="spaPrix" id="spaPrix" value="{{ $spa->spa_prix }}" placeholder="Prix de la première journée">
                        @else
                            <input type="number" class="form-control" name="spaPrix" id="spaPrix" placeholder="Prix de la première journée">
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="spaPrixSupp">Prix jour supplémentaire</label>
                        @if(isset($spa))
                            <input type="number" class="form-control" name="spaPrixSupp" id="spaPrixSupp" value="{{ $spa->spa_prix_jour_supp }}" placeholder="Prix jours supplémentaires">
                        @else
                            <input type="number" class="form-control" name="spaPrixSupp" id="spaPrixSupp" placeholder="Prix jours supplémentaires">
                        @endif
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
                            <textarea name="name" rows="4" class="form-control" name="spaDescription" id="spaDescription">
                                {{ $spa->spa_desc }}
                            </textarea>
                        @else
                            <textarea name="name" rows="4" class="form-control" name="spaDescription" id="spaDescription"></textarea>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
