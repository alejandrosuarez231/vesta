<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('productos')->insert([
        ['sku'=>'MBIFR-HA-000001', 'tipo_id'=>1, 'subtipo_id'=>1, 'nombre'=>'Bisagra 180 con Freno', 'descripcion'=>'S/D', 'marca_id'=>7, 'unidad_id'=>4, 'extra_id'=>1, 'importado'=>0, 'minimo'=>1, 'maximo'=>1],
        ['sku'=>'MBIFR-HA-000002', 'tipo_id'=>1, 'subtipo_id'=>1, 'nombre'=>'Bisagra 180 sin Freno', 'descripcion'=>'S/D', 'marca_id'=>7, 'unidad_id'=>4, 'extra_id'=>2, 'importado'=>0, 'minimo'=>1, 'maximo'=>1],
        ['sku'=>'MBICU-HA-000001', 'tipo_id'=>1, 'subtipo_id'=>2, 'nombre'=>'Bisagra Curva con Freno', 'descripcion'=>'S/D', 'marca_id'=>7, 'unidad_id'=>4, 'extra_id'=>1, 'importado'=>0, 'minimo'=>1, 'maximo'=>1],
        ['sku'=>'MBICU-HA-000002', 'tipo_id'=>1, 'subtipo_id'=>2, 'nombre'=>'Bisagra Curva sin Freno', 'descripcion'=>'S/D', 'marca_id'=>7, 'unidad_id'=>4, 'extra_id'=>2, 'importado'=>0, 'minimo'=>1, 'maximo'=>1]
      ]);
    }
  }
