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
        $table->decimal('veta',10,2)->nullable();
        $table->decimal('material',10,2)->nullable();
        $table->decimal('largo_izq',10,2)->nullable();
        $table->decimal('largo_der',10,2)->nullable();
        $table->decimal('ancho_sup',10,2)->nullable();
        $table->decimal('ancho_inf',10,2)->nullable();
        $table->decimal('mec1',10,2)->nullable();
        $table->decimal('mec2',10,2)->nullable();
        $table->integer('cantidad')->nullable();
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
