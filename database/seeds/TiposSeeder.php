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
        ['tipologia' => 'MTP', 'padre' =>1, 'acromtip' => 'M', 'nombre' => 'Bisagras', 'acronimo' => 'BI'],
        ['tipologia' => 'MTP', 'padre' =>1, 'acromtip' => 'M', 'nombre' => 'Canto', 'acronimo' => 'CA'],
        ['tipologia' => 'MTP', 'padre' =>1, 'acromtip' => 'M', 'nombre' => 'Correderas', 'acronimo' => 'CR'],
        ['tipologia' => 'MTP', 'padre' =>0, 'acromtip' => 'M', 'nombre' => 'Otros Herrajes', 'acronimo' => 'OH'],
        ['tipologia' => 'MTP', 'padre' =>0, 'acromtip' => 'M', 'nombre' => 'Packing', 'acronimo' => 'PK'],
        ['tipologia' => 'MTP', 'padre' =>1, 'acromtip' => 'M', 'nombre' => 'Sist. Apertura', 'acronimo' => 'SA'],
        ['tipologia' => 'MTP', 'padre' =>1, 'acromtip' => 'M', 'nombre' => 'Tableros', 'acronimo' => 'TA'],
        ['tipologia' => 'PSE', 'padre' =>1, 'acromtip' => 'S', 'nombre' => 'Kits', 'acronimo' => 'KI'],
        ['tipologia' => 'PSE', 'padre' =>1, 'acromtip' => 'S', 'nombre' => 'Modulos', 'acronimo' => 'MO'],
        ['tipologia' => 'PSE', 'padre' =>1, 'acromtip' => 'S', 'nombre' => 'Piezas', 'acronimo' => 'PI'],
        ['tipologia' => 'PTO', 'padre' =>1, 'acromtip' => 'T', 'nombre' => 'Cocina', 'acronimo' => 'C'],
        ['tipologia' => 'PTO', 'padre' =>1, 'acromtip' => 'T', 'nombre' => 'LifeVesta', 'acronimo' => 'L'],
        ['tipologia' => 'PTO', 'padre' =>0, 'acromtip' => 'T', 'nombre' => 'Muebles de Baño', 'acronimo' => 'B'],
        ['tipologia' => 'PTO', 'padre' =>1, 'acromtip' => 'T', 'nombre' => 'Vestier', 'acronimo' => 'V'],
      ]);

      foreach ($tipos as $values) {
        Tipo::create($values);
      }
    }
  }
