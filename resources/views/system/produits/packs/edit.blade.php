@extends('layouts.backoffice')

@section('pageTitle', 'Nouveau pack Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadPack">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($pack))
                <h1 class="h3 mb-2 text-gray-800">Modifier le pack</h1>
                <p class="mb-4">Dernière mise à jour le : {{ $pack->dateUpdated->format('d-m-Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter un pack</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter un pack à la liste</p>
            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-5 text-right">
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($pack))
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
                    <h4>Propriétés du pack </h4>
                    <hr>
                    <div class="form-group">
                        <label for="packLibelle">Nom du pack</label>
                        @if(isset($pack))
                            <input type="text" class="form-control" name="packLibelle" id="packLibelle" value="{{ $pack->pack_libelle }}" placeholder="Libellé du pack (ex: Pack Chill)">
                        @else
                            <input type="text" class="form-control" name="packLibelle" id="packLibelle" placeholder="Libellé du pack (ex: Pack Chill)">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="packDescription">Description</label>
                        @if(isset($pack))
                            <textarea name="name" rows="4" class="form-control  {{ $errors->has('packDescription') ? 'is-invalid' : '' }}" name="packDescription" id="packDescription" required>
                                {{ $pack->pack_description }}
                            </textarea>
                        @else
                            <textarea name="name" rows="4" class="form-control" name="packDescription" id="packDescription" required></textarea>
                        @endif
                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="packPrix">Prix du pack</label>
                        @if(isset($pack))
                            <input type="number" class="form-control" name="packPrix" id="packPrix" value="{{ $pack->pack_prix }}" placeholder="Prix du pack">
                        @else
                            <input type="number" class="form-control" name="packPrix" id="packPrix" placeholder="Prix du pack">
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="packStock">Stock physique</label>
                        @if(isset($pack))
                            <input type="number" class="form-control" name="packStock" id="packStock" value="{{ $pack->pack_stock }}" placeholder="Nb de pack dispo">
                        @else
                            <input type="number" class="form-control" name="packStock" id="packStock" placeholder="Nb de pack dispo">
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

@endsection
