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
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Bisagras', 'acronimo' => 'BI'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Canto', 'acronimo' => 'CA'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Correderas', 'acronimo' => 'CR'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Tableros', 'acronimo' => 'TA'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Conectores', 'acronimo' => 'CT'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Accesorios', 'acronimo' => 'AC'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Perfiles y Tubos', 'acronimo' => 'PE'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Patas', 'acronimo' => 'PA'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Sist. Apertura', 'acronimo' => 'SA'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Packing', 'acronimo' => 'PK'],
        ['tipologia' => 'PSE', 'acromtip' => 'S', 'padre' =>  0, 'nombre' => 'Piezas', 'acronimo' => 'PI'],
        ['tipologia' => 'PSE', 'acromtip' => 'S', 'padre' =>  0, 'nombre' => 'Modulos', 'acronimo' => 'MO'],
        ['tipologia' => 'PSE', 'acromtip' => 'S', 'padre' =>  0, 'nombre' => 'Kits', 'acronimo' => 'KI'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Cocina', 'acronimo' => 'C'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Vestier', 'acronimo' => 'V'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Muebles de Baño', 'acronimo' => 'B'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'LifeVesta', 'acronimo' => 'L']
      ]);

      foreach ($tipos as $values) {
        Tipo::create($values);
      }
    }
  }
