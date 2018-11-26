<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku',20)->nullable();
            $table->integer('materiale_id');
            $table->string('descripcion');
            $table->string('acronimo',6);
            $table->string('formula_area')->nullable();
            $table->string('formula_canto')->nullable();
            $table->string('canto_largo1')->nullable();
            $table->string('canto_largo2')->nullable();
            $table->string('canto_ancho1')->nullable();
            $table->string('canto_ancho2')->nullable();
            $table->string('flargo')->nullable();
            $table->string('fancho')->nullable();
            $table->string('espesor')->nullable();
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
        Schema::dropIfExists('descripciones');
    }
}
