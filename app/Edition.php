<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Edition extends Authenticatable
{
    protected $table = "valoresEstatus";
    
    protected $fillable = ['id', 'estatus', 'orden', 'descripcion'];  

    public function details()
    {
        return $this->belongsTo('App\Details');
    }
}