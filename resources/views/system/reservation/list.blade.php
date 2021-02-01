@extends('layouts.backoffice')

@section('pageTitle', 'Messages | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des réservations</h1>
<p class="mb-4">Liste de toutes les réservations référencées sur le site.</p>

<!-- DataTales Example -->
<div class="card shadow">
    <div class="text-right">
        <a href="{{ url('/system/reservations/new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#ResaFutures" role="tab">Réservations à venir ({{ count($listeResas) }})</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="register-tab" data-toggle="tab" href="#ResaPassees" role="tab">Précédentes réservations</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="ResaFutures" role="tabpanel">
            <div class="card-body mb-5">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Début</th>
                                <th>Fin</th>
                                <th>Nom client</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                                <th>Spa libelle</th>
                                <th>Montant</th>
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($listeResas) > 0)
                                @foreach($listeResas as $detailResa)
                                    <tr>
                                        <td>{{ $detailResa->reservation_id }}</td>
                                        <td>@if($detailResa->reservation_date_debut != NULL){{  $detailResa->DateDebut->format('d/m/Y')  }} @endif</td>
                                        <td>@if($detailResa->reservation_date_fin != NULL){{  $detailResa->DateFin->format('d/m/Y')  }} @endif</td>
                                        <td>{{ $detailResa->client->client_name }}</td>
                                        <td>{{ $detailResa->reservation_ville }} ({{ $detailResa->reservation_departement }})</td>
                                        <td>{{ $detailResa->reservation_rue }}</td>
                                        <td>{{ $detailResa->reservation_spa_libelle }}</td>
                                        <td>{{ $detailResa->reservation_montant_total }}€</td>
                                        <td><a href="{{ url('/system/reservations/edit/'.$detailResa->reservation_id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="ResaPassees" role="tabpanel">
            <div class="card-body mb-5">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Début</th>
                                <th>Fin</th>
                                <th>Nom client</th>
                                <th>Ville</th>
                                <th>Adresse</th>
                                <th>Spa libelle</th>
                                <th>Montant</th>
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($listeResaPassees) > 0)
                                @foreach($listeResaPassees as $listeResaPassee)
                                    <tr>
                                        <td>{{ $listeResaPassee->reservation_id }}</td>
                                        <td>@if($listeResaPassee->reservation_date_debut != NULL){{  $listeResaPassee->DateDebut->format('d/m/Y')  }} @endif</td>
                                        <td>@if($listeResaPassee->reservation_date_fin != NULL){{  $listeResaPassee->DateFin->format('d/m/Y')  }} @endif</td>
                                        <td>{{ $listeResaPassee->client->client_name }}</td>
                                        <td>{{ $listeResaPassee->reservation_ville }} ({{ $listeResaPassee->reservation_departement }})</td>
                                        <td>{{ $listeResaPassee->reservation_rue }}</td>
                                        <!-- <td>{{ $listeResaPassee->reservation_creneau }}</td>
                                        <td>{{ $listeResaPassee->reservation_emplacement }}</td> -->
                                        <td>{{ $listeResaPassee->reservation_spa_libelle }}</td>
                                        <td>{{ $listeResaPassee->reservation_montant_total }} €</td>
                                        <td><a href="{{ url('/system/reservations/edit/'.$listeResaPassee->reservation_id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
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
<script>
    $('.btnEditState').on('change', function() {
        var id = $(this).attr('rel');

        $.ajax({
            url : "{{ url('/administration/annonce/edit/state') }}/"+id,
            type : 'POST',
            data : '_token={{ csrf_token() }}&id=' + id,
            success : function(response, statut){
                if(response == 0)
                {
                    $("#btn-delete-"+id).removeClass("disabled");
                }
                else
                {
                    $("#btn-delete-"+id).addClass("disabled");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });
    });

    // $(document).ready(function() {
    //     setTimeout(function(){
    //         console.log('La');
    //         $('#DataTables_Table_0_filter input[type=search]').val('Compromis');

    //         // Create a new jQuery.Event object with specified event properties.
    //         var e = jQuery.Event( "keydown", { keyCode: 64 } );
    //         // trigger an artificial keydown event with keyCode 64
    //         $("#DataTables_Table_0_filter input[type=search]").trigger( e );
    //     }, 1000);
    // });
</script>

@endsection
