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

    public function create($array)
    {
        $c = Client::where('client_email', 'LIKE', $array->email)->first();

        if($c == NULL)
        {
            $client = new Client;
            $client->create($array);
            $idClient = $client->client_id;
        }
        else
        {
            $idClient = $c->client_id;
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

        $dateDebut = date('Y-m-d');
        $dateFin = date('Y-m-d', strtotime($dateDebut. ' + 1 year'));

        $this->cadeau_client_id   = $idClient;
        $this->cadeau_montant     = $array->montant;
        $this->cadeau_offre       = $array->offre;
        $this->cadeau_code        = $this->generateCode(12);
        $this->cadeau_date_fin    = $dateFin;
        $this->cadeau_date_debut  = $dateDebut;
        $this->save();

        return $this->cadeau_id;
    }

    public function generateCode($nb)
    {
        $caracteres = '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $code = '';
        for ($i = 0; $i < $nb; $i++){
            $code .= $caracteres[rand(0, $longueurMax - 1)];
        }

        return $code;
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
