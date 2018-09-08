<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfpartSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('confparts')->insert([
        ['id' => 1, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'Gola'],
        ['id' => 2, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'Tirador'],
        ['id' => 3, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'Tip On'],
        ['id' => 4, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'Riel'],
        ['id' => 5, 'nombre' => 'Sist. de Armado', 'acronimo' => 'sar', 'valor' => 'Mini Fix'],
        ['id' => 6, 'nombre' => 'Sist. de Armado', 'acronimo' => 'sar', 'valor' => 'Tornillo']
      ]);
    }
  }
