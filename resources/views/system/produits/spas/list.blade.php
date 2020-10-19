@extends('layouts.backoffice')

@section('pageTitle', 'Spas Bullao | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des spas</h1>
<p class="mb-4">Liste de tous les spas référencés en base de données</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="text-right">
        <a href="{{ url('/system/produits/spas/edit') }}" class="btn btn-primary text-white mt-3 mr-3">Ajouter</a>
    </div>
    <hr>
    <div class="card-body mt-0 pt-0">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:15px;">#</th>
                        <th>Libellé</th>
                        <th>Places</th>
                        <th>Prix</th>
                        <th>Supp</th>
                        <th>Stock</th>
                        <th style="width:25px;">OK</th>
                        <th style="width:25px;">DO</th>
                        <th style="width:50px;"></th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($listeSpas) > 0)
                        @foreach($listeSpas as $detailSpa)
                            <tr>
                                <td>{{ $detailSpa->spa_id }}</td>
                                <td>{{ $detailSpa->spa_libelle }}</td>
                                <td>{{ $detailSpa->spa_nb_place }} pers.</td>
                                <td>{{ $detailSpa->spa_prix }}</td>
                                <td>{{ $detailSpa->spa_prix_jour_supp }}</td>
                                <td>{{ $detailSpa->spa_stock }}</td>
                                <td class="text-right text-success">{{ $detailSpa->nbResaPassees() }}</td>
                                <td class="text-right text-warning">{{ $detailSpa->nbResaFutures() }}</td>
                                <td><a href="{{ url('/system/produits/spas/edit/'.$detailSpa->spa_id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Libellé</th>
                            <th>Places</th>
                            <th>Prix</th>
                            <th>Supp</th>
                            <th>Stock</th>
                            <th>OK</th>
                            <th>DO</th>
                            <th></th>
                        </tr>
                    </thead>
                </tfoot>
            </table>
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
