<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcronimoToConfparts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('confparts', function (Blueprint $table) {
        $table->string('acronimo',6)->after('nombre');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('confparts', function (Blueprint $table) {
        $table->dropColumn('acronimo');
      });
    }
  }
