@extends('layouts.login')

@section('pageTitle', 'Connexion | '.env('APP_NAME'))

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-6 col-md-9"  style="max-width: 550px;">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0" >
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-5">Connexion</h1>
                                @include('partials.system.alert')
                            </div>
                            <form class="" action="{{ url('/account/login') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="login" placeholder="Entrez votre identifiant">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" name="rememberme" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Connexion
                                </button>
                            </form>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <a class="small" href="{{ url('/') }}">Retour sur le site</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="small" href="{{ url('/account/forgot-password') }}">Mot de passe oublié ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
