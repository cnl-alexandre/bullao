@extends('layouts.backoffice')

@section('pageTitle', 'Packs Bullao | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des packs</h1>
<p class="mb-4">Liste de tous les packs référencés sur le site</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="text-right">
        <a href="{{ url('/system/produits/packs/new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="min-width:30px;">#</th>
                        <th style="min-width:150px;">Libellé</th>
                        <th style="min-width:70px;">Stock</th>
                        <th>Stock réel</th>
                        <th style="min-width:70px;">Prix</th>
                        <th style="width:25px;">OK</th>
                        <th style="width:25px;">DO</th>
                        <th style="width:50px;"></th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($listePacks) > 0)
                        @foreach($listePacks as $detailPack)
                            <tr>
                                <td>{{ $detailPack->pack_id }}</td>
                                <td>{{ $detailPack->pack_libelle }}</td>
                                <td>{{ $detailPack->pack_stock }}</td>
                                <th></th>
                                <td>{{ $detailPack->pack_prix }}€</td>
                                <td class="text-right text-success">{{ $detailPack->nbResaPassees() }}</td>
                                <td class="text-right text-warning">{{ $detailPack->nbResaFutures() }}</td>
                                <td><a href="{{ url('/system/produits/packs/edit/'.$detailPack->pack_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
