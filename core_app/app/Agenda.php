<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
    protected $fillable=['fk_id_grupo','fecha_evento','hora_evento','nombre_evento','lugar'];
}
