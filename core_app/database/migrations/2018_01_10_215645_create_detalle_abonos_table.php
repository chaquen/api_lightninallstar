<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_abonos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("fk_id_detalle_cobro")->unsigned();
            $table->foreign('fk_id_detalle_cobro')->references('id')->on('detalle_cobros')->onDelete('cascade');
            $table->integer("fk_id_deportista")->unsigned();
            $table->foreign('fk_id_deportista')->references('id')->on('deportistas')->onDelete('cascade');
            $table->integer("fk_id_usuario_registro_pago")->unsigned();
            $table->foreign('fk_id_usuario_registro_pago')->references('id')->on('profesores')->onDelete('cascade');
            $table->decimal("saldo_anterior",10,2);
            $table->decimal("valor_abonado",10,2);
            $table->decimal("nuevo_saldo",10,2);
            $table->datetime("fecha_abono");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_abonos');
    }
}
