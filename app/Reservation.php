<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Client;
use App\ReservationAccessoire;
use App\Pack;
use App\Spa;
use App\Promo;

class Reservation extends Model
{
    protected $connection = 'mysql';
    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';

    public function accessoires()
    {
        return $this->hasMany('App\ReservationAccessoire', 'ra_accessoire_id');
    }

    public function spa()
    {
        return $this->belongsTo('App\Spa', 'reservation_spa_id', 'spa_id');
    }

    public function pack()
    {
        return $this->belongsTo('App\Pack', 'reservation_pack_id', 'pack_id');
    }

    // public function pack()
    // {
    //     return $this->belongsTo('App\Client', 'reservation_client_id', '...');
    // }

    public function create($array)
    {
        $montant_total = 0.00;

        if($array->step == 1)
        {
            $diffJours = 0;

            $daterange = $array->daterange;
            $dates = explode(' - ', $daterange);

            $dateDebut = $this->dateFr2Us($dates[0]);
            $dateFin = $this->dateFr2Us($dates[1]);

            $debut = strtotime($dateDebut);
            $fin = strtotime($dateFin);
            $diffJours = ceil(abs($fin - $debut) / 86400);

            $this->reservation_date_debut           = $dateDebut;
            $this->reservation_date_fin             = $dateFin;

            $this->reservation_spa_id               = $array->spa;
            $spa = Spa::find($array->spa);
            $this->reservation_spa_libelle          = $spa->spa_libelle.' '.$spa->spa_nb_place.' places';
            $this->reservation_prix                 = $spa->spa_prix;

            $montant_total += ($spa->spa_prix + (($diffJours-1)*$spa->spa_prix_jour_supp));

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

            $this->reservation_montant_total        = $montant_total;
            $this->save();
        }
        else if($array->step == 2)
        {
            $this->reservation_emplacement      = $array->emplacement;
            $this->reservation_type_logement    = $array->type_logement;
            $this->reservation_creneau          = $array->creneau;
            $this->reservation_rue              = $array->adresse1;
            $this->reservation_cp               = $array->cp;
            $this->reservation_ville            = $array->ville;
            $this->reservation_complement       = $array->adresse2;
            $this->reservation_departement      = $array->departement;
            
            if(isset($array->promo) && $array->promo != "")
            {
                $this->reservation_promo                = $array->promo;

                $promo = Promo::where('promo_libelle', 'LIKE', $array->promo)->first();

                $this->reservation_montant_total        = $this->reservation_montant_total-(($this->reservation_montant_total*$array->promo)/100);
            }

            // Création du client
            $client = new Client;
            $client->create($array);

            $this->reservation_client_id               = $client->client_id;
            $this->save();
        }
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
}
