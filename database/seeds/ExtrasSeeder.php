<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('extras')->insert([
        ['propiedad' => 'Freno'],
        ['propiedad' => 'sin Freno'],
        ['propiedad' => 'Circular'],
        ['propiedad' => 'Tipo L'],
        ['propiedad' => 'Aluminio'],
        ['propiedad' => 'Cromado'],
        ['propiedad' => 'Oval Aluminio'],
        ['propiedad' => 'Circular Cromado']
      ]);
    }
  }
