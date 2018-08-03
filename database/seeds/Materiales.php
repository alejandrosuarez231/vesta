<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Materiales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materiales')->insert([
        ['nombre' => 'Caja'],
        ['nombre' => 'Frente'],
        ['nombre' => 'Fondo'],
        ['nombre' => 'Gaveta'],
        ['nombre' => 'Hielo Seco'],
        ['nombre' => 'Sobre']
      ]);
    }
}