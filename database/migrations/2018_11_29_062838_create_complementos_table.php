<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('complementos');
        Schema::create('complementos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modulo_id')->index();
            $table->string('skulistado_id')->index()->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('categoria_id')->index();
            $table->integer('cantidad');
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
        Schema::dropIfExists('complementos');
    }
}
