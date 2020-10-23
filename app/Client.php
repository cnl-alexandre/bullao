<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Adresse;
use App\User;

class Client extends Model
{
    protected $connection = 'mysql';
    protected $table = 'clients';
    protected $primaryKey = 'client_id';

    public function user()
    {
        return $this->belongsTo('App\User', 'client_user_id', 'user_id');
    }

    public function adresses()
    {
        return $this->hasMany('App\Adresse', 'adresse_client_id');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'reservation_client_id');
    }

    public function create($array)
    {
        $this->client_name          = $array->name;
        $this->client_email         = $array->email;
        $this->client_phone         = $array->phone;

        $u = User::where('user_login', 'LIKE', $array->email)->get();
        if(count($u) == 0)
        {
            $user = new User;
            $user->create($array);
            $idUser = $user->user_id;
        }
        else
        {
            $idUser = $u[0]->user_id;
        }
        
        $this->client_user_id       = $idUser;
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
