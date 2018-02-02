<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaEntrenadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_entrenadors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("fk_id_profesor")->unsigned ();
            $table->foreign('fk_id_profesor')->references('id')->on('profesors')->onDelete('cascade');;
            $table->enum("tipo",["curso","exp_laboral"]);
            $table->string('nombre');
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
        Schema::drop('experiencia_entrenadors');
    }
}
