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
        ['nombre' => 'Amaretto', 'acronimo' => 'AMA'],
        ['nombre' => 'Artico', 'acronimo' => 'ART'],
        ['nombre' => 'Blanco', 'acronimo' => 'BLA'],
        ['nombre' => 'Blanco Brillante', 'acronimo' => 'BBR'],
        ['nombre' => 'Canela', 'acronimo' => 'CAN'],
        ['nombre' => 'Caramelo', 'acronimo' => 'CAR'],
        ['nombre' => 'Cemento Mate', 'acronimo' => 'CEM'],
        ['nombre' => 'Ceniza Mate', 'acronimo' => 'CEN'],
        ['nombre' => 'Espresso', 'acronimo' => 'ESP'],
        ['nombre' => 'Grey Stone', 'acronimo' => 'GRE'],
        ['nombre' => 'Gris Brillante', 'acronimo' => 'GBR'],
        ['nombre' => 'Gris Fantasia', 'acronimo' => 'GFA'],
        ['nombre' => 'Gris Plomo', 'acronimo' => 'GPL'],
        ['nombre' => 'Habano Poro', 'acronimo' => 'HAB'],
        ['nombre' => 'Lino Beige', 'acronimo' => 'LIB'],
        ['nombre' => 'Lino Fantasia', 'acronimo' => 'LIN'],
        ['nombre' => 'Manzano', 'acronimo' => 'MAN'],
        ['nombre' => 'Miel Poro', 'acronimo' => 'MIE'],
        ['nombre' => 'Negro', 'acronimo' => 'NGR'],
        ['nombre' => 'Olivo Mate', 'acronimo' => 'OLI'],
        ['nombre' => 'Roble', 'acronimo' => 'ROB'],
        ['nombre' => 'Roble Ahumado', 'acronimo' => 'ROA'],
        ['nombre' => 'Rovere Mate', 'acronimo' => 'ROV'],
        ['nombre' => 'Sangria', 'acronimo' => 'SAN'],
        ['nombre' => 'Sienna', 'acronimo' => 'SIE'],
        ['nombre' => 'Sombra Poro', 'acronimo' => 'SOM'],
        ['nombre' => 'Tabacco', 'acronimo' => 'TAB'],
        ['nombre' => 'White Chic', 'acronimo' => 'WHI']
    ]);
  }
}
