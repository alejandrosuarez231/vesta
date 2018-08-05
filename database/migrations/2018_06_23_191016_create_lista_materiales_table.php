<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListaMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku',20)->nullable();
            $table->integer('producto_id');
            $table->integer('material_id');
            $table->integer('descripcion_id');
            $table->string('largo')->nullable();
            $table->string('ancho')->nullable();
            $table->string('espesor')->nullable();
            $table->decimal('largo_izq',10,2)->nullable();
            $table->decimal('largo_der',10,2)->nullable();
            $table->decimal('ancho_sup',10,2)->nullable();
            $table->decimal('ancho_inf',10,2)->nullable();
            $table->string('mec1')->nullable();
            $table->string('mec2')->nullable();
            $table->integer('cantidad');
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
        Schema::dropIfExists('lista_materiales');
    }
}
