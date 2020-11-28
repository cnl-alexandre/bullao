<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cadeau extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cadeaux';
    protected $primaryKey = 'cadeau_id';

    public function clientPaiement()
    {
        return $this->belongsTo('App\Client', 'cadeau_client_id', 'client_id');
    }

    public function clientUtilisation()
    {
        return $this->belongsTo('App\Client', 'cadeau_client_id_used', 'client_id');
    }

    public function create($clientId, $array)
    {
        $this->cadeau_client_id   = $clientId;
        $this->cadeau_montant     = $array->montant;
        $this->cadeau_offre       = $array->offre;
        $this->cadeau_code        = $array->code;
        $this->cadeau_date_paie   = $array->datePaie;
        $this->cadeau_date_fin    = $array->dateFin;
        $this->save();

        return $this->cadeau_id;
    }

    public function edit($clientId, $array){
        $this->cadeau_client_id   = $clientId;
        $this->cadeau_montant     = $array->montant;
        $this->cadeau_offre       = $array->offre;
        $this->cadeau_code        = $array->code;
        $this->cadeau_date_paie   = $array->datePaie;
        $this->cadeau_client_id_used    = $array->clientIdUsed;
        $this->cadeau_date_used    = $array->dateUsed;
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
}
