<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pack extends Model
{
    protected $connection = 'mysql';
    protected $table = 'packs';
    protected $primaryKey = 'pack_id';
    
    public function create($array)
    {
        $this->pack_libelle         = $array->libelle;
        $this->pack_description     = $array->description;
        $this->pack_stock           = $array->stock;
        $this->pack_prix            = $array->prix;
        $this->save();
    }

    public function stock()
    {
        if($this->pack_stock == 0)
        {
            echo '<span class="text-danger">';
                echo 'Victime de son succès';
            echo '</span>';
        }
        else
        {
            echo "<span><br></span>";
        }
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