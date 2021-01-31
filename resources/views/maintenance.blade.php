@extends('layouts.blank')

@section('pageTitle', 'Maintenance | '.env('APP_NAME'))

@section('content')
<style>
@font-face {
  font-family: "Regular";
  src: "{{ url('/fonts/Lato-Regular.ttf') }}";
}
html, body {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    color:#282828;
    letter-spacing: 0px;
    vertical-align: baseline;
    background-color: #f0f1fa;
}
.englobe {
    width: 100vw;height: 100vh;font-family: "Regular";
}
.page {
    display: flex;
    flex-direction: column;
    height: inherit;
}
.notification {
    max-width: 450px;
    width: 95%;
    box-shadow: 0 2px 7px rgba(0,0,0,0.11);
    border-radius: 6px;
    background-color: #ffffff;
    margin: auto;
    text-align: center;
}
.notification .title {
    font-size: 24px;
}
.notification .logo {
    width: 70%;max-width: 280px;margin-top: 45px;
}
.notification p {
    width: 85%;margin: 10px auto;

}
.notification img{
    margin: 20px;
}
.notification .illustration {
    width: 200px;margin-bottom: 25px;
}
</style>

<section class="englobe">
    <section class="page">
        <div class="notification">
              <img class="logo" src="{{ url('/medias/img/logos/logo-bleu.svg') }}" alt="Logo entreprise">
              <h1 class="title">Site en maintenance</h1>
              <p class="text"> {{ $message->parametre_value }}</p>
              <img class="illustration" src="{{ url('/medias/img/systems/undraw_maintenance.svg') }}" alt="Illustration site maintenance">
        </div>
    </section>
</section>
@endsection
