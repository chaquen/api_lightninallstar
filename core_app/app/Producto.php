<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    
    protected $fillable=['codigo_producto','nombre_producto',"descripcion_producto","talla","color","material","tipo_productos","tipo_recurso","url_recurso"];
}
