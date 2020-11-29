<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Adresse;
use App\User;
use App\Client;

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

    public function create($array, $code)
    {
        $c = Client::where('client_email', 'LIKE', $array->email)->get();

        Session::put('clientEmail', $array->email);

        if(count($c) == 0)
        {
            $client = new Client;
            $client->create($array);
            $idClient = $client->client_id;
        }
        else
        {
            $idClient = $c[0]->client_id;
        }

        if(isset($array->adresse1) && $array->adresse1 != "")
        {
            $a = Adresse::where('adresse_rue', 'LIKE', $array->adresse1)
                        ->where('adresse_client_id', '=', $idClient)
                        ->get();

            if(count($a) == 0)
            {
                $address = new Adresse;
                $address->create($idClient, $array);
            }
        }

        $this->cadeau_client_id   = $idClient;
        $this->cadeau_montant     = $array->montant;
        $this->cadeau_offre       = $array->offre;
        $this->cadeau_code        = $code;
        //$this->cadeau_date_paie   = $array->datePaie;
        //$this->cadeau_date_fin    = $array->dateFin;
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
