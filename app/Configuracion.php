<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Configuracion extends Authenticatable
{
    protected $table = "configuracion";
    
    protected $fillable = ['campo', 'valor', 'archivo', 'idUser'];  
}