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
            $table->integer('modulo_id');
            $table->string('producto')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('categoria_id');
            $table->integer('cantidad');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('approved_by')->nullable();
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