$(document).ready(function()
{
    $(".file-upload").change(function () {
        previewFile();
    });

    $('.selectcolor').colorselector();
});

function previewFile()
{
    var file = $("#photo").get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#previewImg").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}