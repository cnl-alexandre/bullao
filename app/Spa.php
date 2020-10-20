<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Reservation;

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

    public function nbStockReel()
    {
        $nbStockReel = Reservation::where('reservation_spa_id', '=', $this->spa_id)
                        ->where('reservation_date_fin', '>=', date('Y-m-d'))
                        ->where('reservation_date_debut', '<=', date('Y-m-d'))
                        ->count('reservation_id');

        return $nbStockReel;
    }

    public function nbResaFutures()
    {
        $nbResaFutures = Reservation::where('reservation_spa_id', '=', $this->spa_id)
                        ->where('reservation_date_debut', '>', date('Y-m-d'))
                        ->count('reservation_id');

        return $nbResaFutures;
    }

    public function nbResaPassees()
    {
        $nbResaPassees = Reservation::where('reservation_spa_id', '=', $this->spa_id)
                        ->where('reservation_date_fin', '<', date('Y-m-d'))
                        ->count('reservation_id');

        return $nbResaPassees;
    }

    // public function nbResaSahara4p()
    // {
    //     $nbResaSahara4p = Reservation::where('reservation_spa_libelle', '=', 'Spa Sahara 4 places')
    //                         ->count('reservation_paye', '=', '1');
    //
    //     return $nbResaSahara4p;
    // }


    public function edit($array)
    {
        $this->spa_libelle                  = $array->spaLibelle;
        $this->spa_stock                    = $array->spaStock;
        $this->spa_nb_place                 = $array->spaPlace;
        $this->spa_desc                     = $array->spaDescription;
        $this->spa_prix                     = $array->spaPrix;
        $this->spa_prix_jour_supp           = $array->spaPrixSupp;

        $this->save();
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
