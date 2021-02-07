@extends('layouts.backoffice')

@section('pageTitle', 'Liste Administateurs Bullao | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des administrateurs</h1>
<p class="mb-4">Liste de tous les administrateurs référencées sur le site.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="text-right">
        <a href="{{ url('/system/parametres/administrateur/new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="min-width:30px;">#</th>
                        <th style="min-width:150px;">Identifiant</th>
                        <th style="min-width:70px;">Rang</th>
                        <th style="width:50px;"></th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($listeAdmins) > 0)
                        @foreach($listeAdmins as $detailAdmin)
                            <tr>
                                <td>{{ $detailAdmin->user_id }}</td>
                                <td>{{ $detailAdmin->user_login }}</td>
                                <td></td>
                                <td><a href="{{ url('/system/parametres/indisponibilite/edit/'.$detailAdmin->user_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
