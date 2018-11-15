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
        ['nombre' => 'Espresso', 'acronimo' => 'ESP'],
        ['nombre' => 'Rovere Mate', 'acronimo' => 'ROV'],
        ['nombre' => 'Amaretto', 'acronimo' => 'AMA'],
        ['nombre' => 'Sombra Poro', 'acronimo' => 'SOM'],
        ['nombre' => 'Roble Ahumado', 'acronimo' => 'ROB'],
        ['nombre' => 'Olivo Mate', 'acronimo' => 'OLI'],
        ['nombre' => 'Miel Poro', 'acronimo' => 'MIE'],
        ['nombre' => 'Manzano', 'acronimo' => 'MAN'],
        ['nombre' => 'Sangria', 'acronimo' => 'SAN'],
        ['nombre' => 'Ceniza Mate', 'acronimo' => 'CEN'],
        ['nombre' => 'Caramelo', 'acronimo' => 'CAR'],
        ['nombre' => 'Artico', 'acronimo' => 'ART'],
        ['nombre' => 'Blanco Brillante', 'acronimo' => 'BBR'],
        ['nombre' => 'Grey Stone', 'acronimo' => 'GRE'],
        ['nombre' => 'Blanco', 'acronimo' => 'BLA'],
        ['nombre' => 'Negro', 'acronimo' => 'NGR'],
        ['nombre' => 'Gris Fantasia', 'acronimo' => 'GFA'],
        ['nombre' => 'Gris Plomo', 'acronimo' => 'GPL'],
        ['nombre' => 'Lino Fantasia', 'acronimo' => 'LIN'],
        ['nombre' => 'Cemento Mate', 'acronimo' => 'CEM'],
        ['nombre' => 'White Chic', 'acronimo' => 'WHI'],
        ['nombre' => 'Habano Poro', 'acronimo' => 'HAB'],
        ['nombre' => 'Lino Beige', 'acronimo' => 'LIB'],
        ['nombre' => 'Sienna', 'acronimo' => 'SIE']
      ]);
    }
  }
