<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    //
     protected $fillable = [
        'nombre_competencia','descripcion_competencia','posicion_competencia','lugar_competencia','fecha_competencia','tipo_competencia','tipo_recurso','url_recurso'
    ];
}
