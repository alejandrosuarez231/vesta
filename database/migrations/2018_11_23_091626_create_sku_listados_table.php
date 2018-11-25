<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkuListadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skulistados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modulo_id');
            $table->string('sku_grupo');
            $table->string('sku_padre')->unique();
            $table->integer('tipo_id');
            $table->integer('subtipo_id');
            $table->integer('categoria_id');
            $table->string('descripcion')->nullable();
            $table->integer('sap_id');
            $table->integer('fondo_id');
            $table->boolean('activo');
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
        Schema::dropIfExists('skulistados');
    }
}
