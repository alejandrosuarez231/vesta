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
            $table->string('sku',80)->nullable();
            $table->integer('tipo_id');
            $table->integer('subtipo_id')->nullable();
            $table->string('nombre',100);
            $table->string('descripcion',191)->nullable();
            $table->integer('marca_id')->nullable();
            $table->integer('unidad_id')->nullable();
            $table->string('largo',20)->nullable();
            $table->string('ancho',20)->nullable();
            $table->string('profundidad',20)->nullable();
            $table->integer('color_id')->nullable();
            $table->boolean('importado');
            $table->integer('minimo')->default(0);
            $table->integer('maximo')->default(0);
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
