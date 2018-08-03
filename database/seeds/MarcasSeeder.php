<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Marca;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $marcas =collect([
        ['nombre' => 'Blum', 'acronimo' => 'BL', 'importada' => 0],
        ['nombre' => 'Ducasse', 'acronimo' => 'DU', 'importada' => 0],
        ['nombre' => 'Egger', 'acronimo' => 'EG', 'importada' => 0],
        ['nombre' => 'Finsa', 'acronimo' => 'FI', 'importada' => 0],
        ['nombre' => 'Fundermax', 'acronimo' => 'FU', 'importada' => 0],
        ['nombre' => 'Gogem', 'acronimo' => 'GO', 'importada' => 0],
        ['nombre' => 'Hafele', 'acronimo' => 'HA', 'importada' => 0],
        ['nombre' => 'Pelikano', 'acronimo' => 'PE', 'importada' => 0],
        ['nombre' => 'Rehau', 'acronimo' => 'RE', 'importada' => 0],
        ['nombre' => 'Tablemac', 'acronimo' => 'TA', 'importada' => 0],
        ['nombre' => 'Tableros Hispano', 'acronimo' => 'HI', 'importada' => 0],
        ['nombre' => 'Madex', 'acronimo' => 'MA', 'importada' => 0],
        ['nombre' => 'Raukantex', 'acronimo' => 'RK', 'importada' => 0],
        ['nombre' => 'Imex', 'acronimo' => 'IX', 'importada' => 0],
        ['nombre' => 'Imeca', 'acronimo' => 'IC', 'importada' => 0],
        ['nombre' => 'Gypson', 'acronimo' => 'GY', 'importada' => 0],
        ['nombre' => 'SinMarca', 'acronimo' => 'SM', 'importada' => 0]
      ]);
      foreach ($marcas as $values) {
        Marca::create($values);
      }
    }
}
