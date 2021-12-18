<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Emailing extends Authenticatable
{
    protected $table = "emailing";
    
    protected $fillable = ['idUser', 'name', 'content'];  
}