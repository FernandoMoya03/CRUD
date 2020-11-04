<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $table = 'comentarios';
    public function personas()
    {
        return $this->belongsTo('App\Modelos\Persona');
    }
    public function productos()
    {
        return $this->belongsTo('App\Modelos\Producto');
    }
}