function calculPrixReservation(date1, date2, prixSpa)
{
    console.log("3");
    var diffDays = calculNbJoursReservation(date1, date2);

    var prix = 0.00;

    if(diffDays <= 1)
    {
        prix = parseFloat(prixSpa);
    }
    else if(diffDays == 2)
    {
        prix = parseFloat(prixSpa)+40;
    }
    else if(diffDays == 3)
    {
        prix = parseFloat(prixSpa)+40+40;
    }
    else if(diffDays == 4)
    {
        prix = parseFloat(prixSpa)+40+40+30;
    }
    else if(diffDays > 4)
    {
        prix = parseFloat(prixSpa)+40+40+30+((parseFloat(diffDays)-4)*20);
    }
     
    return prix;
}

function calculNbJoursReservation(date1, date2)
{
    var d1 = moment(date1,'DD/MM/YYYY');
    var d2 = moment(date2,'DD/MM/YYYY');
    var diffDays = d2.diff(d1, 'days');
     
    return diffDays;
}

function bindClickSpas()
{
    $(".spa-recap").click(function() {
        var prixSpa = $(this).attr("rel");
        var spa = $(this).attr("rel2");

        $("#recap-spa-libelle").html(spa);
        $("#recap-spa-prix").html(prixSpa+"€");

        $("#prixSpa").val(prixSpa);

        // Montant total
        var d = $("#daterange").val();
        var dates = d.split(" - ");
        console.log("1");
        var p = calculPrixReservation(dates[0], dates[1], prixSpa);
        console.log("2");
        console.log(dates[0]);
        console.log(dates[1]);
        console.log(p);

        

        $("#montant_total").val(p.toFixed(2));
        $("#montant_without_promo").val(p.toFixed(2));
        $("#prix").val(p.toFixed(2));
        $("#recap-montant-total").html(p.toFixed(2));

        // Calcul des jours de réservation
        var nbJours = calculNbJoursReservation(dates[0], dates[1]);
        

        var jours = "";
        var prix = 0.00;

        jours = "+ "+(nbJours-1)+" jour(s) supplémentaire(s)";

        if(nbJours > 1)
        {
            if(nbJours == 2)
            {
                prix = 40.00;
            }
            else if(nbJours == 3)
            {
                prix = 80.00;
            }
            else if(nbJours == 4)
            {
                prix = 110.00;
            }
            else if(nbJours > 4)
            {
                prix = 110.00 + ((nbJours-4)*20.00);
            }

            $("#recap-jours-libelle").html(jours);
            $("#recap-jours-prix").html(prix+"€");
        }
    });
}