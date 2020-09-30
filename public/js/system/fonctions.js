$(document).ready(function()
{
    $('.dataTable').DataTable({
        "order": [],
        "pageLength": 50,
        language: {
            url: "http://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
        }
    });

    /*$('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
        // other options
    });*/

    // Confirmation lors d'un click sur un lien ou un bouton
    /*$('a[data-confirm]').click(function(ev)
    {
        var href = $(this).attr('href');

        if (!$('#dataConfirmModal').length)
        {
            $('body').append('<div id="dataConfirmModal" class="modal" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Merci de confirmer</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"></div><div class="modal-footer"><button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
        }
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show:true});

        return false;
    });*/

    $(".file-upload").change(function () {
        var position = $(this).attr('rel');
        previewFile(this, position);
    });
});

function previewFile(input, position){
    var file = $("#photo-"+position).get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#previewImg-"+position).attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}