<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Client;
use App\ReservationAccessoire;
use App\Pack;
use App\Spa;
use App\Promo;
use App\Adresse;

class Reservation extends Model
{
    protected $connection = 'mysql';
    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';

    public function accessoires()
    {
        return $this->hasMany('App\ReservationAccessoire', 'ra_reservation_id');
    }

    public function spa()
    {
        return $this->belongsTo('App\Spa', 'reservation_spa_id', 'spa_id');
    }

    public function pack()
    {
        return $this->belongsTo('App\Pack', 'reservation_pack_id', 'pack_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client', 'reservation_client_id', 'client_id');
    }

    public function paye()
    {
        if($this->reservation_paye == 0)
        {
            $html = '<span class="badge badge-danger">Non payé</span>';
        }
        elseif($this->reservation_paye == 1)
        {
            $html = '<span class="badge badge-success">Payé</span>';
        }

        return $html;
    }

    // public function pack()
    // {
    //     return $this->belongsTo('App\Client', 'reservation_client_id', '...');
    // }

    // public function edit($array){

        // Reprise create
        //
        // $this->reservation_heure_install
        // $this->reservation_heure_desinstall
        //
        // $this->reservation_emplacement
        // $this->reservation_remplissage
        // $this->reservation_type_logement
        // $this->reservation_source
        //
        //
        // $this->reservation_email
        // $this->reservation_phone
    // }

    public function create($array)
    {
        $montant_total = 0.00;

        if($array->step == 1 || $array->step == "")
        {
            $daterange = $array->daterange;
            $dates = explode(' - ', $daterange);

            $dateDebut = $this->dateFr2Us($dates[0]);
            $dateFin = $this->dateFr2Us($dates[1]);

            if($dateFin == $dateDebut)
            {
                $dateFin = date('Y-m-d', strtotime($dateFin. ' + 1 days'));
            }

            $this->reservation_date_debut           = $dateDebut;
            $this->reservation_date_fin             = $dateFin;

            $this->reservation_spa_id               = $array->spa;
            $spa = Spa::find($array->spa);
            $this->reservation_spa_libelle          = $spa->spa_libelle.' '.$spa->spa_nb_place.' places';
            $this->reservation_prix                 = $spa->spa_prix;

            $joursSupp = $this->joursSupp($daterange);

            $montant_total += $spa->spa_prix;
            $montant_total += $spa->calculPrixJoursSupp($joursSupp);

            if(isset($array->pack) && $array->pack != "")
            {
                $this->reservation_pack_id          = $array->pack;
                $pack = Pack::find($array->pack);
                $this->reservation_prix_pack        = $pack->pack_prix;

                $montant_total += $pack->pack_prix;
            }

            $this->save();

            if(isset($array->accessoires) && count($array->accessoires) > 0)
            {
                foreach($array->accessoires as $accessoire)
                {
                    $reservationAccessoire = new ReservationAccessoire;
                    $reservationAccessoire->create($accessoire, $this->reservation_id);

                    $accessory = Accessoire::find($accessoire);

                    $montant_total += $accessory->accessoire_prix;
                }
            }

            // $this->reservation_montant_total        = $montant_total;
            // $this->save();
        }
        else if($array->step == 2 || $array->step == "")
        {
            $this->reservation_emplacement      = $array->emplacement;
            $this->reservation_type_logement    = $array->type_logement;
            $this->reservation_creneau          = $array->creneau;
            $this->reservation_rue              = $array->adresse1;
            $this->reservation_cp               = $array->cp;
            $this->reservation_ville            = ucfirst($array->ville);
            $this->reservation_complement       = $array->adresse2;
            $this->reservation_departement      = $array->departement;
            $this->reservation_heure_install    = $array->reservationHeureDebut;
            $this->reservation_heure_desinstall = $array->reservationHeureFin;
            $this->reservation_remplissage      = $array->remplissage;
            $this->reservation_moyen_paiement   = $array->moyen_paiement;
            $this->reservation_info_complementaires = $array->info_complementaires;

            if(isset($array->validation) && $array->validation == "1" )
            {
                $this->reservation_active       = $array->validation;
            }

            if(isset($array->promo) && $array->promo != "")
            {
                $code = $array->promo;

                $promo = Promo::where('promo_libelle', 'LIKE', $code)->first();
                $carte = Cadeau::where('cadeau_code', 'LIKE', $code)->first();

                if(isset($promo) && $promo != NULL)
                {
                    $this->reservation_promo = $code;
                    $this->reservation_montant_total        = $this->reservation_montant_total-(($this->reservation_montant_total*$promo->promo_valeur)/100);
                }
                elseif(isset($carte) && $carte != NULL)
                {
                    $this->reservation_cadeau_id = $carte->cadeau_id;

                    if($carte->cadeau_montant_restant > $this->reservation_montant_total) {
                        $montantRestant = $carte->cadeau_montant_restant - $this->reservation_montant_total;
                        Session::put('montant_total', 0.00);
                    }
                    else {
                        $montantRestant = 0.00;
                        Session::put('montant_total', $this->reservation_montant_total - $carte->cadeau_montant_restant);
                    }
                }
            }
            else{
                Session::put('montant_total', $this->reservation_montant_total);
            }

            if(isset($array->fraisKm) && $array->fraisKm != "")
            {
                $this->reservation_frais_km             = $array->frais_km;

                $this->reservation_montant_total        = $this->reservation_montant_total+$array->fraisKm;
            }

            $c = Client::where('client_email', 'LIKE', $array->email)->get();

            if(count($c) == 0)
            {
                $client = new Client;
                $client->create($array);
                $idClient = $client->client_id;
            }
            else
            {
                $idClient = $c[0]->client_id;
            }

            $this->reservation_client_id        = $idClient;
            $this->reservation_email            = $array->email;
            $this->reservation_phone            = $array->phone;
            $this->save();

            if(isset($array->adresse1) && $array->adresse1 != "")
            {
                $a = Adresse::where('adresse_rue', 'LIKE', $array->adresse1)
                            ->where('adresse_client_id', '=', $idClient)
                            ->get();

                if(count($a) == 0)
                {
                    $address = new Adresse;
                    $address->create($idClient, $array);
                }
            }
        }
    }

    public function edit($array)
    {

        $daterange = $array->daterange;
        $dates = explode(' - ', $daterange);

        $dateDebut = $this->dateFr2Us($dates[0]);
        $dateFin = $this->dateFr2Us($dates[1]);

        if($dateFin == $dateDebut)
        {
            $dateFin = date('Y-m-d', strtotime($dateFin. ' + 1 days'));
        }

        $this->reservation_date_debut           = $dateDebut;
        $this->reservation_date_fin             = $dateFin;

        $this->reservation_spa_id               = $array->spa;
        $spa = Spa::find($array->spa);
        $this->reservation_spa_libelle          = $spa->spa_libelle.' '.$spa->spa_nb_place.' places';
        $this->reservation_prix                 = $spa->spa_prix;

        if(isset($array->pack) && $array->pack != "")
        {
            $this->reservation_pack_id          = $array->pack;
            $pack = Pack::find($array->pack);
            $this->reservation_prix_pack        = $pack->pack_prix;
        }
        else {
            $this->reservation_pack_id          = NULL;
            $this->reservation_prix_pack        = NULL;
        }

        $ras = ReservationAccessoire::where('ra_reservation_id', '=', $this->reservation_id)->get();
        foreach($ras as $ra)
        {
            $ra->delete();
        }

        if(isset($array->accessoires))
        {
            foreach($array->accessoires as $accessoire)
            {
                $reservationAccessoire = new ReservationAccessoire;
                $reservationAccessoire->create($accessoire, $this->reservation_id);
            }
        }

        $this->reservation_montant_total    = $array->montant_total;
        $this->reservation_emplacement      = $array->emplacement;
        $this->reservation_type_logement    = $array->type_logement;
        $this->reservation_creneau          = $array->creneau;
        $this->reservation_rue              = $array->adresse1;
        $this->reservation_cp               = $array->cp;
        $this->reservation_ville            = ucfirst($array->ville);
        $this->reservation_complement       = $array->adresse2;
        $this->reservation_departement      = $array->departement;
        $this->reservation_heure_install    = $array->reservationHeureDebut;
        $this->reservation_heure_desinstall = $array->reservationHeureFin;
        $this->reservation_remplissage      = $array->remplissage;
        $this->reservation_moyen_paiement   = $array->moyen_paiement;
        $this->reservation_info_complementaires = $array->info_complementaires;

        if(isset($array->paye) && $array->paye == "1" )
        {
            $this->reservation_paye       = "1";
        }
        else
        {
            $this->reservation_paye       = "0";
        }

        $this->reservation_email            = $array->email;
        $this->reservation_phone            = $array->phone;
        $this->save();
    }

    public function getDateDebutAttribute()
    {
        return Carbon::parse($this->attributes['reservation_date_debut']);
    }

    public function getDateFinAttribute()
    {
        return Carbon::parse($this->attributes['reservation_date_fin']);
    }

    public function getDateCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }

    public function getDateUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['updated_at']);
    }

    function dateUs2Fr($date)
    {
        $split = explode("-",$date);

        $annee = $split[0];
        $mois = $split[1];
        $jour = $split[2];

        return "$jour"."/"."$mois"."/"."$annee";
    }

    function dateFr2Us($date)
    {
        $split = explode("/",$date);

        $annee = $split[2];
        $mois = $split[1];
        $jour = $split[0];

        return "$annee"."-"."$mois"."-"."$jour";
    }

    public function joursSupp()
    {
        $dateDebut = $this->reservation_date_debut;
        $dateFin = $this->reservation_date_fin;

        $debut = strtotime($dateDebut);
        $fin = strtotime($dateFin);
        $joursSupp = ceil(abs($fin - $debut) / 86400)-1;

        return $joursSupp;
    }
}
