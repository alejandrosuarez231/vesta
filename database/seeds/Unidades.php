<?php

use Illuminate\Database\Seeder;
use App\Unidad;

class Unidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $unidad = collect([
        ['nombre' => 'Milimetro', 'acronimo' => 'mm'],
        ['nombre' => 'Milimmetro cuadrado', 'acronimo' => 'mm2'],
        ['nombre' => 'Galones', 'acronimo' => 'gal'],
        ['nombre' => 'Unidad', 'acronimo' => 'und']
      ]);

      foreach ($unidad as $values) {
        Unidad::create($values);
      }
    }
  }
