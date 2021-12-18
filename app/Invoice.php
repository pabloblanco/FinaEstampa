<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Invoice extends Authenticatable
{
    protected $table = "direcciondefacturacion";
    
    protected $fillable = ['idDireccionFacturacion', 'idUsuario', 'nombredireccionDeFacturacion', 'apellidosdireccionDeFacturacion', 'calleDireccionDeFacturacion', 'numeroExteriorDireccionDeFacturacion', 'numeroInteriorDireccionDeFacturacion', 'coloniaDireccionDeFacturacion', 'ciudadDireccionDeFacturacion', 'codigoPostalDireccionDeFacturacion', 'paisDireccionDeFacturacion', 'estadoDireccionDeFacturacion', 'numeroTelefonoDireccionDeFacturacion', 'correoElectronicodireccionDeFacturacion', 'RFCdireccionDeFacturacion', 'RazonSocialdireccionDeFacturacion', 'domicilioFiscaldireccionDeFacturacion'];  
 
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    
}