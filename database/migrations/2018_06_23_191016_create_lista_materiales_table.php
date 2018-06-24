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
            $table->string('sku',20);
            $table->integer('producto_id');
            $table->integer('material_id');
            $table->string('nombre');
            $table->integer('propiedad_id');
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
