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
        $table->decimal('largo',10,2);
        $table->decimal('largo_izq',10,2)->nullable();
        $table->decimal('largo_der',10,2)->nullable();
        $table->decimal('ancho',10,2);
        $table->string('ancho_sup',10,2)->nullable();
        $table->decimal('ancho_inf',10,2)->nullable();
        $table->decimal('area',10,2)->nullable();
        $table->decimal('espesor',10,2)->nullable();
        $table->decimal('mec1',10,2)->nullable();
        $table->decimal('mec2',10,2)->nullable();
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
      Schema::dropIfExists('propiedades');
    }
  }
