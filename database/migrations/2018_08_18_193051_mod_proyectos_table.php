<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->renameColumn('espesor','profundidad');
        });

        Schema::table('lista_materiales', function (Blueprint $table) {
            $table->renameColumn('espesor','profundidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->renameColumn('profundidad','espesor');
        });

        Schema::table('lista_materiales', function (Blueprint $table) {
            $table->renameColumn('profundidad','espesor');
        });
    }
}
