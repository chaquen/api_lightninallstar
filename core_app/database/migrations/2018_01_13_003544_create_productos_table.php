<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombre_producto");
            $table->string("descripcion_producto");
            $table->enum("tipo_recurso",["video","imagen"]);
            $table->string("url_recurso");
            $table->string("talla");
            $table->string("color");
            $table->string("material");
            $table->enum("tipo_producto",["uniformes","busos","tops","short","bows","personalizados","varios"]);
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
        Schema::drop('productos');
    }
}
