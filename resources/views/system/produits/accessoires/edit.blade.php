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
            <a href="{{url()->previous()}}">Retour</a>
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
        <div class="col-md-6 ml-auto my-3">
            <div class="card">
                <div class="card-body">
                    <h4>Propriétés du accessoire </h4>
                    <hr>
                    <div class="form-group">
                        <label for="accessoireLibelle">Nom du accessoire</label>
                        @if(isset($accessoire))
                            <input type="text" class="form-control {{ $errors->has('accessoireLibelle') ? 'is-invalid' : '' }}" name="accessoireLibelle" id="accessoireLibelle" value="{{ $accessoire->accessoire_libelle }}" placeholder="Libellé du accessoire (ex: accessoire Chill)">
                        @else
                            <input type="text" class="form-control {{ $errors->has('accessoireLibelle') ? 'is-invalid' : '' }}" name="accessoireLibelle" id="accessoireLibelle" placeholder="Libellé du accessoire (ex: accessoire Chill)">
                        @endif
                        {!! $errors->first('accessoireLibelle', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="accessoirePrix">Prix du accessoire</label>
                        <div class="input-group mb-3">
                            @if(isset($accessoire))
                                <input type="number" class="form-control {{ $errors->has('accessoirePrix') ? 'is-invalid' : '' }}" name="accessoirePrix" id="accessoirePrix" value="{{ $accessoire->accessoire_prix }}" placeholder="Prix du accessoire">
                            @else
                                <input type="number" class="form-control {{ $errors->has('accessoirePrix') ? 'is-invalid' : '' }}" name="accessoirePrix" id="accessoirePrix" placeholder="Prix du accessoire">
                            @endif
                            {!! $errors->first('accessoirePrix', '<div class="invalid-feedback">:message</div>') !!}
                            <div class="input-group-append">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="accessoireStock">Stock physique</label>
                        @if(isset($accessoire))
                            <input type="number" class="form-control {{ $errors->has('accessoireStock') ? 'is-invalid' : '' }}" name="accessoireStock" id="accessoireStock" value="{{ $accessoire->accessoire_stock }}" placeholder="Nb de accessoire dispo">
                        @else
                            <input type="number" class="form-control {{ $errors->has('accessoireStock') ? 'is-invalid' : '' }}" name="accessoireStock" id="accessoireStock" placeholder="Nb de accessoire dispo">
                        @endif
                        {!! $errors->first('accessoireStock', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="accessoireDescription">Description <small>(🛠 inactif)</small></label>
                        @if(isset($accessoire))
                            <textarea rows="4" class="form-control {{ $errors->has('accessoireDescription') ? 'is-invalid' : '' }}" name="accessoireDescription" id="accessoireDescription">{{ $accessoire->accessoire_description }}</textarea>
                        @else
                            <textarea rows="4" class="form-control {{ $errors->has('accessoireDescription') ? 'is-invalid' : '' }}" name="accessoireDescription" id="accessoireDescription"></textarea>
                        @endif
                        {!! $errors->first('accessoireDescription', '<div class="invalid-feedback">:message</div>') !!}
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
                            @if(isset($accessoire))
                                <img id="previewImg" src="{{ url($accessoire->accessoire_chemin_img)  }}" style="width: 200px;" class="img-fluid">
                            @else
                                <img id="previewImg" src="{{ url('medias/img/no-image.png') }}" style="width: 200px;" class="img-fluid">
                            @endif
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
