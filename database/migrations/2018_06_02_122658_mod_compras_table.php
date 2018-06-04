<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compras', function(Blueprint $table) {
            $table->enum('prioridad',[0,1,2])->default(0)->after('fecha');
            $table->integer('proveedore_id')->after('fecha');
            $table->string('ordendecompra_id')->default(0)->after('fecha');
            // $table->renameColumn('orden_id', 'ordendecompra_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropColumn(['ordendecompra_id', 'proveedore_id', 'prioridad']);
        });
    }
}
