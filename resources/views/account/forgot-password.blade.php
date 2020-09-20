@extends('layouts.login')

@section('pageTitle', 'Mot de passe oublié | '.env('APP_NAME'))

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-6 col-md-9"  style="max-width: 550px;">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-5">Mot de passe oublié ?</h1>
                                @include('partials.system.alert')
                            </div>
                            <form id="form-recaptcha" name="forgot-password" action="{{ url('/account/forgot-password') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Entrez votre email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="login" placeholder="Entrez votre identifiant">
                                </div>
                                <input type="hidden" name="recaptcha" id="recaptcha">
                                <button type="submit" class="btn btn-primary btn-block g-recaptcha" data-sitekey="reCAPTCHA_site_key" data-callback="onSubmit" data-action="submit">
                                    Envoyer
                                </button>
                            </form>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-left">
                                    <a class="small" href="{{ url('/') }}">Retour sur le site</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="small" href="{{ url('/account/login') }}">Se connecter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'forgot-password'}).then(function(token) {
            if(token) {
                $('#recaptcha').val(token);
            }
        })
    })
</script>

@endsection
