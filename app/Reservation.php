<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Client;
use App\ReservationAccessoire;
use App\Pack;
use App\Spa;

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
        $daterange = $array->daterange;
        $dates = explode(' - ', $daterange);

        $dateDebut = $this->dateFr2Us($dates[0]);
        $dateFin = $this->dateFr2Us($dates[1]);

        $this->reservation_date_debut           = $dateDebut;
        $this->reservation_date_fin             = $dateFin;
        $this->reservation_emplacement          = $array->emplacement;
        $this->reservation_type_logement        = $array->type_logement;
        $this->reservation_creneau              = $array->creneau;
        $this->reservation_prix                 = $array->prix;
        $this->reservation_spa_id               = $array->spa;
        $spa = Spa::find($array->spa);
        $this->reservation_spa_libelle          = $spa->spa_libelle.' '.$spa->spa_nb_place.' places';

        if(isset($array->pack) && $array->pack != "")
        {
            $this->reservation_pack_id          = $array->pack;
            $pack = Pack::find($array->pack);
            $this->reservation_prix_pack        = $pack->pack_prix;
        }

        $this->reservation_montant_total        = $array->montant_total;
        $this->reservation_promo                = $array->promo;
        $this->save();

        if(isset($array->accessoires) && count($array->accessoires) > 0)
        {
            foreach($array->accessoires as $accessoire)
            {
                $reservationAccessoire = new ReservationAccessoire;
                $reservationAccessoire->create($accessoire, $this->reservation_id);
            }
        }

        /*$client = new Client;
        $client->create($array);*/
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
