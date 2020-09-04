@extends('layouts.app')

@section('pageTitle', 'Erreur 404 | '.env('APP_NAME'))

@section('content')

<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">ERREUR</h1>
            </div>
            <div class="card-body text-center">
                <img src="{{ url('/medias/img/errors/404.png') }}" class="img-height-200px">
                <h2>
                    La page demandée "{{ substr($_SERVER['REQUEST_URI'], 1) }}" est introuvable...
                </h2>
            </div>
            <div class="card-footer">
                <div class="text-left">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg">
                        <i class="fa fa-arrow-left"></i> Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection