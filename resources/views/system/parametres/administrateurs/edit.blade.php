@extends('layouts.backoffice')

@section('pageTitle', 'Administrateur  Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($indispo))
                <h1 class="h3 mb-2 text-gray-800">Modifier l'administrateur'</h1>
                <p class="mb-4">Dernière mise à jour le : {{ $indispo->dateUpdated->format('d-m-Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter un administrateur</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter un administrateur à la liste</p>
            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-5 text-right">
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($indispo))
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
                    <h4>Propriétés du code </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="promoLibelle">Description</label>
                            @if(isset($indispo))
                                <input type="text" class="form-control {{ $errors->has('indispoDesc') ? 'is-invalid' : '' }}" name="indispoDesc" id="indispoDesc" value="{{ $indispo->indisponibilite_desc }}" placeholder="Information">
                            @else
                                <input type="text" class="form-control {{ $errors->has('indispoDesc') ? 'is-invalid' : '' }}" name="indispoDesc" id="indispoDesc" placeholder="Information">
                            @endif
                            {!! $errors->first('indispoDesc', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="indispoDate">Date</label>
                            @if(isset($indispo))
                                <input type="date" class="form-control {{ $errors->has('indispoDate') ? 'is-invalid' : '' }}" name="indispoDate" id="indispoDate" value="{{ $indispo->indisponibilite_date }}">
                            @else
                                <input type="date" class="form-control {{ $errors->has('indispoDate') ? 'is-invalid' : '' }}" name="indispoDate" id="indispoDate">
                            @endif
                            {!! $errors->first('promoDateDebut', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>

@endsection
