@extends('layouts.backoffice')

@section('pageTitle', 'Messages | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des clients</h1>
<p class="mb-4">Liste de tous les clients référencées sur le site.</p>

<!-- DataTales Example -->
<div class="card shadow">
    <!-- <div class="text-right">
        <a href="{{ url('/system/clients/new') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div> -->
    <hr>
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
                                <th>Ville</th>
                                <th>Creneau</th>
                                <th>Emplacement</th>
                                <th>Spa libelle</th>
                                <th>Montant total</th>
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($listeClients) > 0)
                                @foreach($listeClients as $detailClient)
                                    <tr>
                                        <td>{{ $detailClient->reservation_id }}</td>
                                        <td>@if($detailClient->reservation_date_debut != NULL){{  $detailClient->DateDebut->format('d/m/Y')  }} @endif</td>
                                        <td>@if($detailClient->reservation_date_fin != NULL){{  $detailClient->DateFin->format('d/m/Y')  }} @endif</td>
                                        <td>{{ $detailClient->reservation_ville }} ({{ $detailClient->reservation_departement }})</td>
                                        <td>{{ $detailClient->reservation_creneau }}</td>
                                        <td>{{ $detailClient->reservation_emplacement }}</td>
                                        <td>{{ $detailClient->reservation_spa_libelle }}</td>
                                        <td>{{ $detailClient->reservation_montant_total }}€</td>
                                        <td><a href="{{ url('/system/reservations/edit/'.$detailClient->reservation_id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
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
