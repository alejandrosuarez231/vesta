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
        ['id' => 1, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'No Aplica'],
        ['id' => 2, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'Gola'],
        ['id' => 3, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'Tirador'],
        ['id' => 4, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'Tip On'],
        ['id' => 5, 'nombre' => 'Sist. de Apertura', 'acronimo' => 'sap', 'valor' => 'Riel'],
        ['id' => 6, 'nombre' => 'Tipo Fondo', 'acronimo' => 'tf', 'valor' => 'No Aplica'],
        ['id' => 7, 'nombre' => 'Tipo Fondo', 'acronimo' => 'tf', 'valor' => 'Sin Fondo'],
        ['id' => 8, 'nombre' => 'Tipo Fondo', 'acronimo' => 'tf', 'valor' => 'Fondo Delgado'],
        ['id' => 9, 'nombre' => 'Tipo Fondo', 'acronimo' => 'tf', 'valor' => 'Fondo Grueso']
      ]);
    }
  }
