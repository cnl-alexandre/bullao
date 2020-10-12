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

    public function getDateCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at']);
    }

    public function getDateUpdatedAttribute()
    {
        return Carbon::parse($this->attributes['updated_at']);
    }
}
