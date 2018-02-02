<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    //
    /*
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'nombres', 'apellidos', 'fecha_nacimiento','foto_perfil','edad','rh','fk_id_usuario','documento_identidad','expedicion_di','genero','direccion_vivienda','telefono','celular','eps','cotizante_eps','toma_medicamentos','medicamentos','alergia_medicamentos','ale_medicamentos','emfermedades','lesiones','en_caso_emergencia_nombre_uno','en_caso_emergencia_telefono_uno','en_caso_emergencia_parentezco_uno','en_caso_emergencia_nombre_dos','en_caso_emergencia_telefono_dos','en_caso_emergencia_parentezco_dos','fk_id_grupo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at','deleted_at'
    ];

}
