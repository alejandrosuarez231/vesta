<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodigosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(DB::raw('INSERT INTO codigos(tipo_id,subtipo_id,skubase,numeracion)
        SELECT a.id,b.id, CONCAT(a.acronimo, b.acronimo) AS skubase, 1 AS numeracion
        FROM tipos AS a
        JOIN subtipos AS b ON a.id = b.tipo_id'));
  }
}
