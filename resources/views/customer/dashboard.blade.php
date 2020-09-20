@extends('layouts.customer')

@section('pageTitle', 'Mon compte | '.env('APP_NAME'))

@section('content')

<div class="site-section bg-light">
    <div class="container">
        <h2>Mon compte</h2>
    </div>
</div>

<div class="site-section">
    <div class="mb-2">
        <div class="container">
            <div class="row d-flex no-gutters align-items-stretch text-center">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4>Mon profil</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4>Mes commandes</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4>Mes adresses</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4>Mes préférences</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
