@extends('layouts.backoffice')

@section('pageTitle', 'Messages | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des réservations</h1>
<p class="mb-4">Liste de tous les réservations référencés en base de données</p>

<!-- DataTales Example -->
<div class="card shadow">
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#ResaFutures" role="tab">Réservations à venir</a>
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
                                <th>Ville</th>
                                <th>Dept</th>
                                <th>Creneau</th>
                                <th>Emplacement</th>
                                <th>Spa libelle</th>
                                <th>Montant total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($listeResas) > 0)
                                @foreach($listeResas as $detailResa)
                                    <tr>
                                        <td>{{ $detailResa->reservation_id }}</td>
                                        <td>{{ $detailResa->reservation_date_debut }}</td>
                                        <td>{{ $detailResa->reservation_date_fin }}</td>
                                        <td>{{ $detailResa->reservation_ville }}</td>
                                        <td>{{ $detailResa->reservation_departement }}</td>
                                        <td>{{ $detailResa->reservation_creneau }}</td>
                                        <td>{{ $detailResa->reservation_emplacement }}</td>
                                        <td>{{ $detailResa->reservation_spa_libelle }}</td>
                                        <td>{{ $detailResa->reservation_montant_total }} €</td>
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
                                <th>Ville</th>
                                <th>Creneau</th>
                                <th>Emplacement</th>
                                <th>Spa libelle</th>
                                <th>Montant total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($listeResaPassees) > 0)
                                @foreach($listeResaPassees as $listeResaPassee)
                                    <tr>
                                        <td>{{ $listeResaPassee->reservation_id }}</td>
                                        <td>{{ $listeResaPassee->reservation_date_debut }}</td>
                                        <td>{{ $listeResaPassee->reservation_date_fin }}</td>
                                        <td>{{ $listeResaPassee->reservation_ville }}</td>
                                        <td>{{ $listeResaPassee->reservation_departement }}</td>
                                        <td>{{ $listeResaPassee->reservation_creneau }}</td>
                                        <td>{{ $listeResaPassee->reservation_emplacement }}</td>
                                        <td>{{ $listeResaPassee->reservation_spa_libelle }}</td>
                                        <td>{{ $listeResaPassee->reservation_montant_total }} €</td>
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
