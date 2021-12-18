<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Delivery extends Authenticatable
{
    protected $table = "direcciondeenvio";
    
    protected $fillable = ['idDireccionDeEnvio', 'idUsuario', 'nombrePersonaDireccionDeEnvio', 'apellidosPersonaDireccionDeEnvio', 'calleDireccionDeEnvio', 'numeroExteriorDireccionDeEnvio', 'numeroInteriorDireccionDeEnvio', 'coloniaDireccionDeEnvio', 'ciudadDireccionDeEnvio', 'codigoPostalDireccionDeEnvio', 'paisDireccionDeEnvio', 'estadoDireccionDeEnvio', 'numeroTelefonoDireccionDeEnvio'];  
 
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    
}