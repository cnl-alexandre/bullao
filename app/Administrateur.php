<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class Administrateur extends Model
{
    protected $connection = 'mysql';
    protected $table = 'administrateurs';
    protected $primaryKey = 'administrateur_id';

    public function user()
    {
        return $this->belongsTo('App\User', 'administrateur_user_id', 'user_id');
    }
    
    public function create($array)
    {
        $this->administrateur_name          = $array->name;
        $this->administrateur_phone         = $array->phone;
        $this->administrateur_email         = $array->email;
        $this->administrateur_user_id       = $array->user_id;
        $this->save();
    }

    public function createSession()
    {
        Session::forget('Admin');
        Session::pull('Admin');
        Session::put('Admin', $this);
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