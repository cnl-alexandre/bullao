@extends('layouts.backoffice')

@section('pageTitle', 'Paramètres | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des paramètres</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ url('/system/parametres/parameters/maintenance') }}" method="post">
                    {{ csrf_field() }}
                    <h3>Mode maintenance</h3>
                    <div class="row">
                        <div class="col-6 text-left">
                            Activer la maintenance ?
                        </div>
                        <div class="col-6 text-right">
                            <div class="form-check form-check-inline">
                                @if(isset($parametres["maintenance"]) && $parametres["maintenance"] == "1")
                                    <input class="form-check-input" type="radio" name="maintenance" id="maintenanceModeYes" value="1" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="maintenance" id="maintenanceModeYes" value="1">
                                @endif
                                <label class="form-check-label" for="maintenanceModeYes">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                @if((isset($parametres["maintenance"]) && $parametres["maintenance"] == "0") || !isset($parametres["maintenance"]))
                                    <input class="form-check-input" type="radio" name="maintenance" id="maintenanceModeNo" value="0" checked>
                                @else
                                    <input class="form-check-input" type="radio" name="maintenance" id="maintenanceModeNo" value="0">
                                @endif
                                <label class="form-check-label" for="maintenanceModeNo">
                                    Non
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 text-left">
                            Message
                        </div>
                        <div class="col-6 text-right">
                            <textarea class="form-control" name="maintenance_message">@if(isset($parametres["maintenance_message"])){{ $parametres["maintenance_message"] }}@endif</textarea>
                        </div>
                    </div>
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
