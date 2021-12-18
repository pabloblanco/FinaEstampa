<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable

//use Illuminate\Database\Eloquent\Model;
//class User extends Model

{
    protected $table = "usuario";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario', 'apellido', 'fechaDeNacimiento', 'sexo', 'email', 'contrasena', 'inscritoABoletin', 'recibeNotificacionesYPromos', 'imgUsuario', 'facturacionElectronica', 'razonSocial', 'RFC', 'user_type'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasena',
    ];
    
    public function master()
    {
        return $this->hasMany('App\Master');
    }
    
}