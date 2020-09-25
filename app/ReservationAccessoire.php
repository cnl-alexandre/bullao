<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ReservationAccessoire extends Model
{
    protected $connection = 'mysql';
    protected $table = 'reservations_accessoires';
    
    public function create($array)
    {
        $this->ra_reservation    = $array->reservation;
        $this->ra_accessoire     = $array->accessoire;
        $this->save();
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation', 'ra_reservation_id', 'reservation_id');
    }

    public function accessoire()
    {
        return $this->belongsTo('App\Accessoire', 'ra_accessoire_id', 'accessoire_id');
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