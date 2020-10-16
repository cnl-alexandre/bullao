<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Adresse extends Model
{
    protected $connection = 'mysql';
    protected $table = 'adresses';
    protected $primaryKey = 'adresse_id';

    public function client()
    {
        return $this->belongsTo('App\Client', 'adresse_client_id', 'client_id');
    }

    public function create($clientId, $array)
    {
        $this->adresse_name         = "Principale";
        $this->adresse_client_id    = $clientId;
        $this->adresse_rue          = $array->adresse1;
        $this->adresse_cp           = $array->cp;
        $this->adresse_ville        = $array->ville;
        $this->adresse_complement   = $array->adresse2;
        $this->adresse_departement  = $array->departement;
        $this->save();

        return $this->adresse_id;
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
