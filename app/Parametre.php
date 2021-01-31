<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Parametre extends Model
{
    protected $connection = 'mysql';
    protected $table = 'parametres';
    protected $primaryKey = 'parametre_id';

    public function create($array)
    {
        $this->parametre_libelle        = $array->libelle;
        $this->parametre_value          = $array->value;
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