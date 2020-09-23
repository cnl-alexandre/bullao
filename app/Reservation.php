<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Client;

class Reservation extends Model
{
    protected $connection = 'mysql';
    protected $table = 'reservations';
    protected $primaryKey = 'reservation_id';
    
    public function create($array)
    {
        $this->reservation_date_debut           = $array->date_debut;
        $this->reservation_date_fin             = $array->date_fin;
        $this->reservation_emplacement          = $array->emplacement;
        $this->reservation_type_logement        = $array->type_logement;
        $this->reservation_prix                 = $array->prix;
        $this->reservation_pack_id              = $array->pack;
        $this->reservation_prix_pack            = $array->prix_pack;
        $this->reservation_accessoire_1_id      = $array->accessoire_1_id;
        $this->reservation_prix_accessoire_1    = $array->prix_accessoire_1;
        $this->reservation_accessoire_2_id      = $array->accessoire_2_id;
        $this->reservation_prix_accessoire_2    = $array->prix_accessoire_2;
        $this->reservation_accessoire_3_id      = $array->accessoire_3_id;
        $this->reservation_prix_accessoire_3    = $array->prix_accessoire_3;
        $this->reservation_montant_total        = $array->montant_total;
        $this->reservation_promo                = $array->promo;
        $this->save();

        $client = new Client;
        $client->create($array);
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