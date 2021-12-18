<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class MedidasProducto extends Authenticatable
{
    protected $table = "medidasProducto";

    //  'cuello', 'pecho', 'cintura', 'cadera', 'manga', 'muneca', 'espalda', 'sisa', 'bisep', 'deseado'

    protected $fillable = ['cuello', 'pecho', 'cintura', 'cadera', 'manga', 'muneca', 'espalda', 'sisa', 'bicep', 'deseado'];  

    public function customer()
    {
        return $this->belongsTo('App\Detail');
    }
}