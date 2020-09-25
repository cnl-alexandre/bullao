<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Accessoire extends Model
{
    protected $connection = 'mysql';
    protected $table = 'accessoires';
    protected $primaryKey = 'accessoire_id';

    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'ra_reservation_id');
    }
    
    public function create($array)
    {
        $this->accessoire_libelle         = $array->libelle;
        $this->accessoire_description     = $array->description;
        $this->accessoire_stock           = $array->stock;
        $this->accessoire_prix            = $array->prix;
        $this->save();
    }

    public function stock()
    {
        if($this->accessoire_stock == 0)
        {
            echo '<span class="text-danger">';
                echo 'Victime de son succès';
            echo '</span>';
        }
        else
        {
            echo "<span><br></span>";
        }
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