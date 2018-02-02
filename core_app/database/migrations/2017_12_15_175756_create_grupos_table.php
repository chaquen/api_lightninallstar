<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_grupo');
            $table->integer("fk_id_profesor")->unsigned();
            $table->foreign('fk_id_profesor')->references('id')->on('profesors')->onDelete("cascade");
            $table->enum('estado_grupo',["0","1"]);
            $table->integer("fk_id_nivel")->unsigned();
            $table->foreign('fk_id_nivel')->references('id')->on('nivels')->onDelete("cascade");
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grupos');
    }
}
