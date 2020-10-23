@extends('layouts.backoffice')

@section('pageTitle', 'Accessoires Bullao | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des accessoires</h1>
<p class="mb-4">Liste de tous les accessoires référencés sur le site</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="text-right">
        <a href="{{ url('/system/produits/accessoires/new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="min-width:30px;">#</th>
                        <th style="min-width:150px;">Libellé</th>
                        <th style="min-width:70px;">Stock total</th>
                        <th>Stock réel</th>
                        <th style="min-width:70px;">Prix</th>
                        <th>Consommable ?</th>
                        <th style="min-width:40px;">Terminé</th>
                        <th style="min-width:40px;">À venir</th>
                        <th style="width:50px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($listeAccessoires) > 0)
                        @foreach($listeAccessoires as $detailAccessoire)
                            <tr>
                                <td>{{ $detailAccessoire->accessoire_id }}</td>
                                <td>{{ $detailAccessoire->accessoire_libelle }}</td>
                                <td>{{ $detailAccessoire->accessoire_stock }}</td>
                                <td>{{ $detailAccessoire->nbStockReel() }}</td>
                                <td>{{ $detailAccessoire->accessoire_prix }}€</td>
                                <td>{{ $detailAccessoire->conso() }}</td>
                                <td class="text-right text-success"></td>
                                <td class="text-right text-warning"></td>
                                <td><a href="{{ url('/system/produits/accessoires/edit/'.$detailAccessoire->accessoire_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
