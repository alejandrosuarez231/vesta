<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCostosToCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('categorias', function (Blueprint $table) {
        $table->decimal('costo',8,2)->nullable()->after('acronimo');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('categorias', function (Blueprint $table) {
        $table->dropColumn('costo');
      });
    }
  }
