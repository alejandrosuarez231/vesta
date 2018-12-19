<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('tableros');

      Schema::create('tableros', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('categoria_id')->index();
        $table->integer('colore_id')->index();
        $table->string('espesor')->nullable();
        $table->decimal('costo',8,2)->nullable();
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
      Schema::dropIfExists('tableros');
  }
}
