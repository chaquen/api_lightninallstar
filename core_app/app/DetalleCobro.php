<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCobro extends Model
{
    //
    protected $fillable=['fk_id_cobro','fk_id_deportista','numero_cuotas','total_a_pagar','pago_hasta_la_fecha','saldo_pendiente','saldo_a_favor',"desde","hasta"];
}
