<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdendecomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordendecompras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->date('fecha');
            $table->enum('prioridad',[0,1,2])->default(0);
            $table->boolean('aprobada');
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
        Schema::dropIfExists('ordendecompras');
    }
}
