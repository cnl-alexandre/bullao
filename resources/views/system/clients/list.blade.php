@extends('layouts.backoffice')

@section('pageTitle', 'Clients | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des clients</h1>
<p class="mb-4">Liste de tous les clients référencées sur le site.</p>

<!-- DataTales Example -->
<div class="card shadow">
    <div class="text-right">
        <a href="{{ url('/system/clients/new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="ResaFutures" role="tabpanel">
            <div class="card-body mb-5">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Tel</th>
                                <th>Rang</th>
                                <th>Nb réservations</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($listeClients) > 0)
                                @foreach($listeClients as $detailClient)
                                    <tr>
                                        <td>{{ $detailClient->client_id }}</td>
                                        <td>{{ $detailClient->client_name }}</td>
                                        <td>{{ $detailClient->client_email }}</td>
                                        <td>{{ $detailClient->client_phone }}</td>
                                        <td>Rang</td>
                                        <td></td>
                                        <td><a href="{{ url('/system/clients/edit/'.$detailClient->client_id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
