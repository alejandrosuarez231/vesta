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
            $table->string('sku_grupo')->unique();
            $table->integer('tipo_id');
            $table->integer('subtipo_id');
            $table->integer('categoria_id');
            $table->string('nombre');
            $table->integer('consecutivo')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('variantes')->nullable();
            $table->string('saps',80);
            $table->string('fondos',80);
            $table->string('espesor_caja_permitido');
            $table->integer('ancho_minimo')->default(0);
            $table->integer('ancho_maximo')->default(0);
            $table->integer('ancho_var')->nullable();
            $table->integer('alto_minimo')->default(0);
            $table->integer('alto_maximo')->default(0);
            $table->integer('alto_var')->nullable();
            $table->integer('profundidad_minima')->default(0);
            $table->integer('profundidad_maxima')->default(0);
            $table->integer('profundidad_var')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('approved_by')->nullable();
            $table->timestamp('approved_on')->nullable();
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
