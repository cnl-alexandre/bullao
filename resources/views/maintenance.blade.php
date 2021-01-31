@extends('layouts.blank')

@section('pageTitle', 'Maintenance | '.env('APP_NAME'))

@section('content')

<section class="englobe">
    <section class="page">
        <div class="notification">
              <img class="logo" src="assets/logo.png" alt="Logo entreprise">
              <h1 class="title">Maintenance</h1>
              <p class="text">Bonjour, nous sommes actuellement en cours de mise à jour. Nous allons revenir dans pas longtemps !</p>
              <img class="illustration" src="assets/illustration.svg" alt="Illustration site maintenance">
        </div>
    </section>
</section>

@if(Session::has('success'))
    <script>alert("{!! Session::get('success') !!}");</script>
    {{ Session::forget('success') }}
@endif
@if(Session::has('error'))
    <script>alert("{!! Session::get('error') !!}");</script>
    {{ Session::forget('error') }}
@endif

@endsection
