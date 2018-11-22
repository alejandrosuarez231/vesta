<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FondosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('fondos')->insert([
        ['valor' => 'No Aplica'],
        ['valor' => 'Sin Fondo'],
        ['valor' => 'Fondo Delgado'],
        ['valor' => 'Fondo Grueso']
      ]);
    }
  }
