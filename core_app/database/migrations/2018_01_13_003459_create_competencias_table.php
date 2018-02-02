<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombre_competencia");
            $table->string("descripcion_competencia");
            $table->string("posicion_competencia");
            $table->string("lugar_competencia");            
            $table->date("fecha_competencia");
            $table->enum("tipo_competencia",["locales","distritales","nacionales","internacionales","eventos"]);
            $table->enum("tipo_recurso",["video","imagen"]);
            $table->string("url_recurso");
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
        Schema::drop('competencias');
    }
}
