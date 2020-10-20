@extends('layouts.backoffice')

@section('pageTitle', 'Nouveau accessoire Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadaccessoire">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($accessoire))
                <h1 class="h3 mb-2 text-gray-800">Modifier le accessoire</h1>
                <p class="mb-4">Dernière mise à jour le : {{ $accessoire->dateUpdated->format('d-m-Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter un accessoire</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter un accessoire à la liste</p>
            @endif
        </div>
        <div class="col-md-5 text-right">
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($accessoire))
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
                    <h4>Propriétés du accessoire </h4>
                    <hr>
                    <div class="form-group">
                        <label for="accessoireLibelle">Nom du accessoire</label>
                        @if(isset($accessoire))
                            <input type="text" class="form-control" name="accessoireLibelle" id="accessoireLibelle" value="{{ $accessoire->accessoire_libelle }}" placeholder="Libellé du accessoire (ex: accessoire Chill)">
                        @else
                            <input type="text" class="form-control" name="accessoireLibelle" id="accessoireLibelle" placeholder="Libellé du accessoire (ex: accessoire Chill)">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="accessoirePrix">Prix du accessoire</label>
                        @if(isset($accessoire))
                            <input type="number" class="form-control" name="accessoirePrix" id="accessoirePrix" value="{{ $accessoire->accessoire_prix }}" placeholder="Prix du accessoire">
                        @else
                            <input type="number" class="form-control" name="accessoirePrix" id="accessoirePrix" placeholder="Prix du accessoire">
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="accessoireStock">Stock physique</label>
                        @if(isset($accessoire))
                            <input type="number" class="form-control" name="accessoireStock" id="accessoireStock" value="{{ $accessoire->accessoire_stock }}" placeholder="Nb de accessoire dispo">
                        @else
                            <input type="number" class="form-control" name="accessoireStock" id="accessoireStock" placeholder="Nb de accessoire dispo">
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection
