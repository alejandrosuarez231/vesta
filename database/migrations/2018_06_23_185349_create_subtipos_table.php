<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('subtipos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('tipo_id');
        $table->string('nombre');
        $table->string('acronimo',6);
        $table->boolean('ancho')->nullable();
        $table->boolean('largo')->nullable();
        $table->boolean('espesor')->nullable();
        $table->boolean('color')->nullable();
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
      Schema::dropIfExists('subtipos');
    }
  }
