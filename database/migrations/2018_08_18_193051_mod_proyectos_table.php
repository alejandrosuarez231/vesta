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
            $table->renameColumn('ancho','alto');
        });

        Schema::table('lista_materiales', function (Blueprint $table) {
            $table->renameColumn('espesor','profundidad');
            $table->renameColumn('ancho','alto');
            $table->renameColumn('ancho_sup','alto_sup');
            $table->renameColumn('ancho_inf','alto_inf');
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
            $table->renameColumn('alto','ancho');
        });

        Schema::table('lista_materiales', function (Blueprint $table) {
            $table->renameColumn('profundidad','espesor');
            $table->renameColumn('alto','ancho');
            $table->renameColumn('alto_sup','ancho_sup');
            $table->renameColumn('alto_inf','ancho_inf');
        });
    }
}
