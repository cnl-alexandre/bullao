<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Reservation;

class Promo extends Model
{
    protected $connection = 'mysql';
    protected $table = 'promos';
    protected $primaryKey = 'promo_id';

    public function edit($array)
    {
        $this->promo_libelle                  = $array->promoLibelle;
        $this->promo_valeur                   = $array->promoValeur;
        $this->promo_date_debut               = $array->promoDateDebut;
        $this->promo_date_fin                 = $array->promoDateFin;

        $this->save();
    }

    public function nbReservation()
    {
        $nb = Reservation::where('reservation_promo', 'LIKE', $this->promo_libelle)->count();
        
        return $nb;
    }

    public function getDateDebutAttribute()
    {
        return Carbon::parse($this->attributes['promo_date_debut']);
    }

    public function getDateFinAttribute()
    {
        return Carbon::parse($this->attributes['promo_date_fin']);
    }

    public function getDateCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }

    public function getDateUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['updated_at']);
    }
}
