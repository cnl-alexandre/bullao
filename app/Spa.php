<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Spa extends Model
{
    protected $connection = 'mysql';
    protected $table = 'spas';
    protected $primaryKey = 'spa_id';

    public function create($array)
    {
        $this->spa_stock        = $array->stock;
        $this->spa_libelle      = $array->libelle;
        $this->spa_nb_place     = $array->nb_place;
        $this->save();
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'reservation_spa_id');
    }

    public function getDateCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }

    public function getDateUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['updated_at']);
    }

    public function calculPrixJoursSupp($nbJours)
    {
        $prix = 0.00;

        $prix = $nbJours*$this->spa_prix_jour_supp;
        
        return $prix;
    }
}
