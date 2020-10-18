@extends('layouts.backoffice')

@section('pageTitle', 'Accessoires Bullao | '.env('APP_NAME'))

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Gestions des accessoires</h1>
<p class="mb-4">Liste de tous les accessoires référencés en base de données</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Libellé</th>
                        <th>Stock</th>
                        <th>Prix</th>
                        <th>Description</th>
                    </tr>
                </thead>

                <tbody>
                    @if(count($listeAccessoires) > 0)
                        @foreach($listeAccessoires as $detailAccessoire)
                            <tr>
                                <td>{{ $detailAccessoire->accessoire_id }}</td>
                                <td>{{ $detailAccessoire->accessoire_libelle }}</td>
                                <td>{{ $detailAccessoire->accessoire_stock }}</td>
                                <td>{{ $detailAccessoire->accessoire_prix }}</td>
                                <td>{{ $detailAccessoire->accessoire_description }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Libellé</th>
                            <th>Stock</th>
                            <th>Prix</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                </tfoot>
            </table>
        </div>
        <div class="text-right">
            <a href="{{ url('/administration/annonces/archives') }}" class="btn btn-link">Voir les annonces archivées</a>
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
