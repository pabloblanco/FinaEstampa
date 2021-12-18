<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Medida extends Authenticatable
{
    protected $table = "medidasusuario";
    
    protected $fillable = ['idUsuario', 'nombrePerfilDeMedida', 'medidaCuello', 'medidaPecho', 'medidaAbdomen', 'medidaCadera', 'medidaMangaLongitud', 'medidaEspalda', 'medidaTronco', 'medidaPuno', 'medidaSisa', 'medidaBicep'];  

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}