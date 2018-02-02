<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mensaje');
            $table->integer("fk_id_deportista")->unsigned();
            $table->foreign('fk_id_deportista')->references('id')->on('deportistas')->onDelete('cascade');
            $table->integer("fk_id_entrenador")->unsigned();
            $table->foreign('fk_id_entrenador')->references('id')->on('profesors')->onDelete('cascade');
            $table->date("fecha_entraga");
            $table->enum("estado_noti",["pendiente","enviado","leido"]);
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
        Schema::drop('notificacions');
    }
}
