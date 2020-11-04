<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $table = 'personas';
    public function comentarios()
    {
        return $this->hasMany('App\Modelos\Comentario');
    }
    
}
