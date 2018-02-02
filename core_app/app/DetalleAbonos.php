<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleAbonos extends Model
{
    //
    protected $fillable=['fk_id_detalle_cobro','fk_id_deportista','fk_id_usuario_registro_pago','saldo_anterior','valor_abonado','nuevo_saldo',"fecha_abono"];
}
