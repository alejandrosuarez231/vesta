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
        ['nombre' => 'Blum'],
        ['nombre' => 'Ducasse'],
        ['nombre' => 'Egger'],
        ['nombre' => 'Finsa'],
        ['nombre' => 'Fundermax'],
        ['nombre' => 'Gogem'],
        ['nombre' => 'Hafele'],
        ['nombre' => 'Pelikano'],
        ['nombre' => 'Rehau'],
        ['nombre' => 'Tablemac'],
        ['nombre' => 'Tableros Hispano']
      ]);
      foreach ($marcas as $values) {
        Marca::create($values);
      }
    }
}
