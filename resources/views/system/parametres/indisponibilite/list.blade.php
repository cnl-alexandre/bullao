@extends('layouts.backoffice')

@section('pageTitle', 'Liste Indisponibilité Bullao | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des dates indisponibles</h1>
<p class="mb-4">Liste de tous les dates indisponibilités référencées sur le site.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="text-right">
        <a href="{{ url('/system/parametres/indisponibilite/new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="min-width:30px;">#</th>
                        <th style="min-width:150px;">Date indispo</th>
                        <th style="min-width:70px;">Description</th>
                        <th style="width:50px;"></th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($listeIndispo) > 0)
                        @foreach($listeIndispo as $detailIndispo)
                            <tr>
                                <td>{{ $detailIndispo->indisponibilite_id }}</td>
                                <td>@if($detailIndispo->indisponibilite_date != NULL){{  $detailIndispo->DateIndispo->format('d/m/Y')  }} @endif</td>
                                <td>{{ $detailIndispo->indisponibilite_desc }}</td>
                                <td><a href="{{ url('/system/parametres/indisponibilite/edit/'.$detailIndispo->indisponibilite_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
