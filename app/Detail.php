<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Detail extends Authenticatable
{
    protected $table = "ordenDetalle";
    
    protected $fillable = ['idOrdenMaestra', 'idProductoCarrito', 'idUsuario', 'categoriaProducto', 'urlAmigable', 'esPersonalizado', 'nombreProducto', 'medidaProducto', 'tejidoProducto', 'estiloProducto', 'distintivoProducto', 'precioProducto', 'imagenProducto', 'cantidadProducto', 'fechaExpress', 'fechaPlancha', 'fechaSalida'];  

    public function master()
    {
        return $this->belongsTo('App\Master');
    }
}