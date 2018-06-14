<?php

use Illuminate\Database\Seeder;
use App\Tipo;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tipos = collect([
        ['tipo' => 'MTP', 'nombre' => 'Bisagras', 'acronimo' => 'BI'],
        ['tipo' => 'MTP', 'nombre' => 'Canto', 'acronimo' => 'CA'],
        ['tipo' => 'MTP', 'nombre' => 'Correderas', 'acronimo' => 'CR'],
        ['tipo' => 'MTP', 'nombre' => 'Materia Prima', 'acronimo' => 'MP'],
        ['tipo' => 'MTP', 'nombre' => 'Otros Herrajes', 'acronimo' => 'OH'],
        ['tipo' => 'MTP', 'nombre' => 'Sist. Apertura', 'acronimo' => 'SA'],
        ['tipo' => 'MTP', 'nombre' => 'Packing', 'acronimo' => 'PK'],
        ['tipo' => 'PSE', 'nombre' => 'Piezas', 'acronimo' => 'PI'],
        ['tipo' => 'PSE', 'nombre' => 'Modulos', 'acronimo' => 'MO'],
        ['tipo' => 'PSE', 'nombre' => 'Kits', 'acronimo' => 'KI'],
        ['tipo' => 'PTO', 'nombre' => 'Vesta Projects', 'acronimo' => 'VP'],
        ['tipo' => 'PTO', 'nombre' => 'LifeVesta', 'acronimo' => 'LV']
      ]);

      foreach ($tipos as $values) {
        Tipo::create($values);
      }
    }
}
