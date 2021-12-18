<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Estatus extends Authenticatable
{
    protected $table = "estatusOrdenProduccion";

 //`id`, `idOrdenDetalle`, `idUsuario`, `consecutivo`, `estatus`, `comentarios`, `created_at`, `updated_at`

    protected $fillable = ['idOrdenDetalle', 'idUsuario', 'consecutivo', 'estatus', 'comentarios'];  

    public function details()
    {
        return $this->belongsTo('App\Details');
    }
}