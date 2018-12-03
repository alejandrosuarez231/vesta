<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezasModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('piezas_modulos');
        Schema::create('piezas_modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_pieza',250);
            $table->integer('materiale_id');
            $table->string('acronimo',6);
            $table->string('formula_largo')->nullable();
            $table->string('formula_ancho')->nullable();
            $table->string('formula_canto')->nullable();
            $table->string('canto_largo1')->nullable();
            $table->string('canto_largo2')->nullable();
            $table->string('canto_ancho1')->nullable();
            $table->string('canto_ancho2')->nullable();
            $table->double('costo',8,2)->nullable();
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
        Schema::dropIfExists('piezas_modulos');
    }
}
