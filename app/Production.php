<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = "ordenDetalle";
    
    protected $fillable = ['idOrdenProduccion', 'idOrdenMaestra', 'idOrdenDetalle', 'idMedidas', 'idUsuario', 'idProceso', 'idTela', 'estiloPatron', 'bordado', 'segundoOjal', 'otrosOjales', 'Comentarios', 'fechaPedido', 'entradaMaxima'];  

    public function master()
    {
        return $this->hasOne('App\Detail');
    }
        
}