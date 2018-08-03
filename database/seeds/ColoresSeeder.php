<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('colores')->insert([
        ['nombre' => 'Blanco'],
        ['nombre' => 'Blanco brillante'],
        ['nombre' => 'Canela'],
        ['nombre' => 'Ceniza'],
        ['nombre' => 'Espresso'],
        ['nombre' => 'Gris'],
        ['nombre' => 'Gris claro'],
        ['nombre' => 'Gris Plomo'],
        ['nombre' => 'inoxidable'],
        ['nombre' => 'Lino'],
        ['nombre' => 'Madera'],
        ['nombre' => 'Manzano'],
        ['nombre' => 'Marrón'],
        ['nombre' => 'Mate'],
        ['nombre' => 'Negro'],
        ['nombre' => 'Roble'],
        ['nombre' => 'Rovere mate'],
        ['nombre' => 'Tabaco'],
        ['nombre' => 'Plata'],
        ['nombre' => 'Crema'],
        ['nombre' => 'Chocolate'],
        ['nombre' => 'Metal Brushed'],
        ['nombre' => 'Aluminio'],
        ['nombre' => 'Cromo']
      ]);

    }
}
