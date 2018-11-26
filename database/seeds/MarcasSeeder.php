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
        ['nombre' => 'Ducasse', 'acronimo' => 'DUC', 'importada' => 0],
        ['nombre' => 'Blum', 'acronimo' => 'BLU', 'importada' => 0],
        ['nombre' => 'Gogem', 'acronimo' => 'GOG', 'importada' => 0],
        ['nombre' => 'Hafele', 'acronimo' => 'HAF', 'importada' => 0],
        ['nombre' => 'Losan', 'acronimo' => 'LOS', 'importada' => 0],
        ['nombre' => 'Imeca', 'acronimo' => 'IME', 'importada' => 0],
        ['nombre' => 'Pelikano', 'acronimo' => 'PEL', 'importada' => 0]

      ]);
      foreach ($marcas as $values) {
        Marca::create($values);
      }
    }
  }
