@extends('layouts.backoffice')

@section('pageTitle', 'Messages | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des codes promo</h1>
<p class="mb-4">Liste de tous les codes promo référencées sur le site.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="text-right">
        <a href="{{ url('/system/parametres/codespromo/new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="min-width:30px;">#</th>
                        <th style="min-width:150px;">Libellé</th>
                        <th style="min-width:70px;">Valeur</th>
                        <th style="min-width:150px;">Date début</th>
                        <th style="min-width:150px;">Date Fin</th>
                        <th style="width:25px;">OK</th>
                        <th style="width:50px;"></th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($listePromo) > 0)
                        @foreach($listePromo as $detailPromo)
                            <tr>
                                <td>{{ $detailPromo->promo_id }}</td>
                                <td>{{ $detailPromo->promo_libelle }}</td>
                                <td>{{ $detailPromo->promo_valeur }}</td>
                                <td>{{ $detailPromo->promo_date_debut }}</td>
                                <td>{{ $detailPromo->promo_date_fin }}</td>
                                <td class="text-right text-success"></td>
                                <td><a href="{{ url('/system/parametres/codespromo/edit/'.$detailPromo->promo_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
