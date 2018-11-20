<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku_grupo');
            $table->integer('tipo_id');
            $table->integer('subtipo_id');
            $table->integer('categoria_id');
            $table->string('nombre');
            $table->integer('consecutivo');
            $table->string('descripcion')->nullable();
            $table->integer('variantes')->default(0);
            $table->string('sap',80);
            $table->string('fondo_id',80);
            $table->string('espesor_permitido');
            $table->integer('ancho_minimo')->default(0);
            $table->integer('ancho_maximo')->default(0);
            $table->integer('ancho_var')->default(0);
            $table->integer('alto_minimo')->default(0);
            $table->integer('alto_maximo')->default(0);
            $table->integer('alto_var')->default(0);
            $table->integer('profundidad_minima')->default(0);
            $table->integer('profundidad_maxima')->default(0);
            $table->integer('profundidad_var')->default(0);
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
        Schema::dropIfExists('modulos');
    }
}
