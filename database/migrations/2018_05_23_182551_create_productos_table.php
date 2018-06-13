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
        $table->string('sku');
        $table->integer('categoria_id');
        $table->integer('subcategoria_id');
        $table->string('nombre',191);
        $table->string('descripcion',191);
        $table->integer('marca_id');
        $table->integer('unidad_id');
        $table->decimal('largo',10,2)->nullable();
        $table->decimal('ancho',10,2)->nullable();
        $table->decimal('area',10,2)->nullable();
        $table->decimal('espesor',10,2)->nullable();
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
