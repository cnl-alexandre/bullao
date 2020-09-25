<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class Client extends Model
{
    protected $connection = 'mysql';
    protected $table = 'clients';
    protected $primaryKey = 'client_id';

    public function user()
    {
        return $this->belongsTo('App\User', 'client_user_id', 'user_id');
    }

    public function create($array)
    {
        $this->client_name          = $array->name;
        $this->client_adresse_1     = $array->adresse1;
        $this->client_adresse_2     = $array->adresse2;
        $this->client_cp            = $array->cp;
        $this->client_ville         = $array->ville;
        $this->client_email         = $array->email;
        $this->client_phone         = $array->phone;
        $this->save();
    }

    public function createSession()
    {
        Session::forget('Client');
        Session::pull('Client');
        Session::put('Client', $this);
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
