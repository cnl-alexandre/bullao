<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Indisponibilite extends Model
{
    protected $connection = 'mysql';
    protected $table = 'indisponibilites';
    protected $primaryKey = 'indisponibilite_id';
    
    public function create($array)
    {
        $this->indisponibilite_date     = $array->date;
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