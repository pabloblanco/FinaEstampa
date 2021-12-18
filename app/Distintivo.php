<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Distintivo extends Authenticatable
{
    protected $table = "distintivoOrdenProduccion";
    
    protected $fillable = ['contrastes', 'inserto', 'botones', 'iniciales', 'informacion'];  

    public function details()
    {
        return $this->belongsTo('App\Details');
    }
}