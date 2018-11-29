<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplementoModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('complemento_modulos');
        Schema::create('complemento_modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_id')->nullable();
            $table->integer('subtipo_id')->nullable();
            $table->string('nombre',100);
            $table->double('costo',8,2)->nullable();
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
        Schema::dropIfExists('complemento_modulos');
    }
}
