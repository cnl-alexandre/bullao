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