<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesors', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('foto_perfil');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->char('rh',2);
            $table->string('documento_identidad')->unique();
            $table->string('expedicion_di');
            $table->enum('genero',["M","F"]);
            $table->string('direccion_vivienda');
            $table->string('telefono');
            $table->string('celular');
            $table->string('eps');
            $table->string('cotizante_eps');
            $table->enum('toma_medicamentos',["SI","NO"]);
            $table->string('medicamentos')->nullable();
            $table->enum('alergia_medicamentos',["SI","NO"]);
            $table->string('ale_medicamentos')->nullable();
            $table->string('enfermedades')->nullable();
            $table->string('en_caso_emergencia_nombre_uno')->nullable();
            $table->string('en_caso_emergencia_telefono_uno')->nullable();
            $table->string('en_caso_emergencia_parentezco_uno')->nullable();
            $table->string('en_caso_emergencia_nombre_dos')->nullable();
            $table->string('en_caso_emergencia_telefono_dos')->nullable();
            $table->string('en_caso_emergencia_parentezco_dos')->nullable();
            $table->integer("fk_id_usuario")->unsigned();
            $table->foreign('fk_id_usuario')->references('id')->on('users')->onDelete('cascade');;
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
        Schema::drop('profesors');
    }
}
