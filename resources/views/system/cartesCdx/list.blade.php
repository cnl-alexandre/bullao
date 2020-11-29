@extends('layouts.backoffice')

@section('pageTitle', 'Messages | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des cartes cadeaux</h1>
<p class="mb-4">Liste de toutes les cartes cadeaux achetées sur le site.</p>

<div class="card shadow mb-4">
    <div class="text-right">
        <a href="{{ url('/system/cartes//new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="min-width:30px;">#</th>
                        <th style="min-width:150px;">Nom client</th>
                        <th style="min-width:70px;">Prix</th>
                        <th>Montant</th>
                        <th style="min-width:80px;">Date utilisé</th>
                        <th style="width:180px;">Libelle</th>
                        <th style="width:180px;">Code</th>
                        <th style="width:50px;"></th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($listeCartes) > 0)
                        @foreach($listeCartes as $detailCarte)
                            <tr>
                                <td>{{ $detailCarte->cadeau_id }}</td>
                                <td>{{ $detailCarte->client_name }}</td>
                                <td>{{ $detailCarte->cadeau_montant }} €</td>
                                <td>{{ $detailCarte->cadeau_offre }}</td>
                                <td>{{ $detailCarte->cadeau_date_paie }}</td>
                                <td>{{ $detailCarte->cadeau_date_fin }}</td>
                                <td>{{ $detailCarte->cadeau_code }}</td>
                                <td><a href="{{ url('/system/cartes/edit/'.$detailCarte->pack_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
