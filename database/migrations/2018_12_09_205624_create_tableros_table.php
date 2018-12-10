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
        $table->decimal('C4',8,2)->nullable();
        $table->decimal('C15',8,2)->nullable();
        $table->decimal('C16',8,2)->nullable();
        $table->decimal('C18',8,2)->nullable();
        $table->decimal('C19',8,2)->nullable();
        $table->decimal('C25',8,2)->nullable();
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
