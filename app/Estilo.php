<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Estilo extends Authenticatable
{
    protected $table = "estiloOrdenProduccion";
    
    protected $fillable = ['cuello', 'puño', 'aletilla', 'corte', 'bolsillo'];  

    public function details()
    {
        return $this->belongsTo('App\Details');
    }
}