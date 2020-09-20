<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rank extends Model
{
    protected $connection = 'mysql';
    protected $table = 'ranks';
    protected $primaryKey = 'rank_id';
    
    public function users()
    {
        return $this->hasMany('App\User', 'user_rank_id');
    }
    
    public function afficherLibelle()
    {
        return '<span class="badge badge-info">'.$this->rank_libelle.'</span>';
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