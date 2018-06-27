<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id');
            $table->string('largo',20)->nullable();
            $table->string('ancho',20)->nullable();
            $table->string('espesor',20)->nullable();
            $table->boolean('veta')->nullable();
            $table->string('largo_izq',20)->nullable();
            $table->string('largo_der',20)->nullable();
            $table->string('ancho_sup',20)->nullable();
            $table->string('ancho_inf',20)->nullable();
            $table->string('mec1',20)->nullable();
            $table->string('mec2',20)->nullable();
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
        Schema::dropIfExists('propiedades');
    }
}
