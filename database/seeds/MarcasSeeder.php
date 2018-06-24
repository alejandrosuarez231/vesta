<?php

use Illuminate\Database\Seeder;
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
        ['nombre' => 'Blum', 'importada' => 0],
        ['nombre' => 'Ducasse', 'importada' => 0],
        ['nombre' => 'Egger', 'importada' => 0],
        ['nombre' => 'Finsa', 'importada' => 0],
        ['nombre' => 'Fundermax', 'importada' => 0],
        ['nombre' => 'Gogem', 'importada' => 0],
        ['nombre' => 'Hafele', 'importada' => 0],
        ['nombre' => 'Pelikano', 'importada' => 0],
        ['nombre' => 'Rehau', 'importada' => 0],
        ['nombre' => 'Tablemac', 'importada' => 0],
        ['nombre' => 'Tableros Hispano', 'importada' => 0]
      ]);
      foreach ($marcas as $values) {
        Marca::create($values);
      }
    }
}
