<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $fillable=['nombre_grupo','fk_id_profesor',"estado_grupo","fk_id_nivel"];
}
