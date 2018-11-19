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
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Herrajes y Accesorios', 'acronimo' => 'HA'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Consumibles', 'acronimo' => 'CO'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Materia Prima', 'acronimo' => 'MP'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Packing', 'acronimo' => 'PA'],
        ['tipologia' => 'MTP', 'acromtip' => 'M', 'padre' =>  1, 'nombre' => 'Cajas', 'acronimo' => 'A'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Cocina', 'acronimo' => 'C'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Mueble de Oficina', 'acronimo' => 'O'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Muebles de Baño', 'acronimo' => 'B'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Muebles de Cuarto', 'acronimo' => 'M'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Muebles de Sala', 'acronimo' => 'S'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Multifuncionales', 'acronimo' => 'F'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Producto Arquitectonico', 'acronimo' => 'Q'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Ropero', 'acronimo' => 'R'],
        ['tipologia' => 'PTO', 'acromtip' => 'T', 'padre' =>  1, 'nombre' => 'Stands', 'acronimo' => 'E']
      ]);

      foreach ($tipos as $values) {
        Tipo::create($values);
      }
    }
  }
