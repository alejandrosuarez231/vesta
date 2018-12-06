<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezaSkusTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('pieza_skus', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('modulo_id')->index();
      $table->string('skulistado_id')->index()->nullable();
      $table->integer('piezas_modulo_id')->index();
      $table->integer('materiale_id');
      $table->string('descripcion')->nullable();
      $table->integer('cantidad');
      $table->string('largo')->nullable();
      $table->string('largo_sup')->nullable();
      $table->string('largo_inf')->nullable();
      $table->string('ancho')->nullable();
      $table->string('ancho_izq')->nullable();
      $table->string('ancho_der')->nullable();
      $table->string('mecanizado1')->nullable();
      $table->string('mecanizado2')->nullable();
      $table->integer('created_by')->index()->nullable();
      $table->integer('updated_by')->index()->nullable();
      $table->integer('approved_by')->index()->nullable();
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
      Schema::dropIfExists('pieza_skus');
    }
  }
