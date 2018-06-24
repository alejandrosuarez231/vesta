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
        ['tipologia' => 'MTP', 'nombre' => 'Bisagras', 'acronimo' => 'BI'],
        ['tipologia' => 'MTP', 'nombre' => 'Canto', 'acronimo' => 'CA'],
        ['tipologia' => 'MTP', 'nombre' => 'Correderas', 'acronimo' => 'CR'],
        ['tipologia' => 'MTP', 'nombre' => 'Materia Prima', 'acronimo' => 'MP'],
        ['tipologia' => 'MTP', 'nombre' => 'Otros Herrajes', 'acronimo' => 'OH'],
        ['tipologia' => 'MTP', 'nombre' => 'Sist. Apertura', 'acronimo' => 'SA'],
        ['tipologia' => 'MTP', 'nombre' => 'Packing', 'acronimo' => 'PK'],
        ['tipologia' => 'PSE', 'nombre' => 'Piezas', 'acronimo' => 'PI'],
        ['tipologia' => 'PSE', 'nombre' => 'Modulos', 'acronimo' => 'MO'],
        ['tipologia' => 'PSE', 'nombre' => 'Kits', 'acronimo' => 'KI'],
        ['tipologia' => 'PTO', 'nombre' => 'Vesta Projects', 'acronimo' => 'VP'],
        ['tipologia' => 'PTO', 'nombre' => 'LifeVesta', 'acronimo' => 'LV']
      ]);

      foreach ($tipos as $values) {
        Tipo::create($values);
      }
    }
}
