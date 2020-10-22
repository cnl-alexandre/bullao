@extends('layouts.backoffice')

@section('pageTitle', 'Nouveau Code Promo Bullao | '.env('APP_NAME'))

@section('content')


<form action="{{ $action }}" method="post" enctype="multipart/form-data" id="uploadPack">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7 text-left">
            @if(isset($promo))
                <h1 class="h3 mb-2 text-gray-800">Modifier le code promo</h1>
                <p class="mb-4">Dernière mise à jour le : {{ $promo->dateUpdated->format('d-m-Y') }}</p>
            @else
                <h1 class="h3 mb-2 text-gray-800">Ajouter un pack</h1>
                <p class="mb-4">Renseigner les informations suivantes pour ajouter un pack à la liste</p>
            @endif
            <a href="{{url()->previous()}}">Retour</a>
        </div>
        <div class="col-md-5 text-right">
            <button type="submit" class="btn btn-primary btn-lg">
                @if(isset($promo))
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
                        <div class="col-md-6 form-group">
                            <label for="promoLibelle">Code promo</label>
                            @if(isset($promo))
                                <input type="text" class="form-control {{ $errors->has('promoLibelle') ? 'is-invalid' : '' }}" name="promoLibelle" id="promoLibelle" value="{{ $promo->promo_libelle }}" placeholder="ex : COPAIN2020">
                            @else
                                <input type="text" class="form-control {{ $errors->has('promoLibelle') ? 'is-invalid' : '' }}" name="promoLibelle" id="promoLibelle" placeholder="ex : COPAIN2020">
                            @endif
                            {!! $errors->first('promoLibelle', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="promoValeur">Valeur (en %)</label>
                            @if(isset($promo))
                                <input type="number" class="form-control {{ $errors->has('promoValeur') ? 'is-invalid' : '' }}" name="promoValeur" id="promoValeur" value="{{ $promo->promo_valeur }}" placeholder="Libellé du pack (ex: Pack Chill)">
                            @else
                                <input type="number" class="form-control {{ $errors->has('promoValeur') ? 'is-invalid' : '' }}" name="promoValeur" id="promoValeur" placeholder="Libellé du pack (ex: Pack Chill)">
                            @endif
                            {!! $errors->first('promoValeur', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="promoDateDebut">Date de début</label>
                            @if(isset($promo))
                                <input type="date" class="form-control {{ $errors->has('promoDateDebut') ? 'is-invalid' : '' }}" name="promoDateDebut" id="promoDateDebut" value="{{ $promo->promo_date_debut }}">
                            @else
                                <input type="date" class="form-control {{ $errors->has('promoDateDebut') ? 'is-invalid' : '' }}" name="promoDateDebut" id="promoDateDebut">
                            @endif
                            {!! $errors->first('promoDateDebut', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="promoDateFin">Date de fin</label>
                            @if(isset($promo))
                                <input type="date" class="form-control {{ $errors->has('promoDateFin') ? 'is-invalid' : '' }}" name="promoDateFin" id="promoDateFin" value="{{ $promo->promo_date_fin }}">
                            @else
                                <input type="date" class="form-control {{ $errors->has('promoDateFin') ? 'is-invalid' : '' }}" name="promoDateFin" id="promoDateFin">
                            @endif
                            {!! $errors->first('promoDateFin', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</form>

@endsection
