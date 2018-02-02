<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_cobros', function (Blueprint $table) {           
            $table->increments('id');
            $table->integer("fk_id_cobro")->unsigned();
            $table->foreign('fk_id_cobro')->references('id')->on('cobros')->onDelete('cascade');
            $table->integer("fk_id_deportista")->unsigned();
            $table->foreign('fk_id_deportista')->references('id')->on('deportistas')->onDelete('cascade');
            $table->integer("numero_cuotas");
            $table->decimal("total_a_pagar",10,2);
            $table->decimal("pago_hasta_la_fecha",10,2);
            $table->decimal("saldo_pendiente",10,2);
            $table->decimal("saldo_a_favor",10,2);
            $table->date('desde');
            $table->date('hasta');
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
        Schema::drop('detalle_cobros');
    }
}
