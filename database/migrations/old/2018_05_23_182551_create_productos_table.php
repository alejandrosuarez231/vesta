<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('productos', function (Blueprint $table) {
        $table->increments('id');
        $table->string('sku',191)->nullable();
        $table->integer('tipo_id');
        $table->integer('subtipo_id')->nullable();
        $table->string('nombre',191);
        $table->string('descripcion',191)->nullable();
        $table->integer('marca_id')->nullable();
        $table->integer('unidad_id')->nullable();
        $table->integer('color_id')->nullable();
        $table->string('largo',191)->nullable();
        $table->string('ancho',191)->nullable();
        $table->string('area',191)->nullable();
        $table->string('espesor',191)->nullable();
        $table->integer('propiedades')->default(0);
        $table->enum('importado',[0,1])->default(0);
        $table->integer('min')->default(1);
        $table->integer('max')->default(1);
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
      Schema::dropIfExists('productos');
    }
  }