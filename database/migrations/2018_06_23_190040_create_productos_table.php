<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('sku',80);
            $table->integer('tipo_id');
            $table->integer('subtipo_id');
            $table->string('nombre',100);
            $table->string('descripcion',191);
            $table->integer('marca_id')->nullable();
            $table->integer('unidad_id')->nullable();
            $table->string('largo',20)->nullable();
            $table->string('ancho',20)->nullable();
            $table->string('espesor',20)->nullable();
            $table->string('area',20)->nullable();
            $table->integer('color_id')->nullable();
            $table->boolean('importado');
            $table->integer('minimo');
            $table->integer('maximo');
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
        Schema::dropIfExists('productos');
    }
}
