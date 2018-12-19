<?php

use Illuminate\Database\Seeder;
use App\Lista_materiale;

class ListaMaterialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $materiales = collect([
        ['id' => 1, 'producto_id' => 1, 'material_id' => 2, 'descripcion_id' => 32, 'largo' => 'H-32', 'alto' => '140', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'PRUEBA01', 'cantidad' => 1],
        ['id' => 2, 'producto_id' => 1, 'material_id' => 2, 'descripcion_id' => 30, 'largo' => 'H-100', 'alto' => '70', 'largo_izq' => NULL, 'largo_der' => NULL, 'alto_sup' => NULL, 'alto_inf' => NULL, 'mec1' => 'PRUEBA02', 'cantidad' => 1],
        ['id' => 3, 'producto_id' => 2, 'material_id' => 2, 'descripcion_id' => 31, 'largo' => 'H', 'alto' => '140', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'PRUEBA03', 'cantidad' => 1],
        ['id' => 4, 'producto_id' => 2, 'material_id' => 2, 'descripcion_id' => 30, 'largo' => 'H-100', 'alto' => '70', 'largo_izq' => NULL, 'largo_der' => NULL, 'alto_sup' => NULL, 'alto_inf' => NULL, 'mec1' => 'PRUEBA04', 'cantidad' => 1],
        ['id' => 5, 'producto_id' => 3, 'material_id' => 2, 'descripcion_id' => 31, 'largo' => 'H', 'alto' => '140', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'PRUEBA05', 'cantidad' => 1],
        ['id' => 6, 'producto_id' => 3, 'material_id' => 2, 'descripcion_id' => 30, 'largo' => 'H-100', 'alto' => '70', 'largo_izq' => NULL, 'largo_der' => NULL, 'alto_sup' => NULL, 'alto_inf' => NULL, 'mec1' => 'PRUEBA06', 'cantidad' => 1],
        ['id' => 7, 'producto_id' => 4, 'material_id' => 2, 'descripcion_id' => 32, 'largo' => 'H-32', 'alto' => '140', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'PRUEBA07', 'cantidad' => 1],
        ['id' => 8, 'producto_id' => 4, 'material_id' => 2, 'descripcion_id' => 30, 'largo' => 'H-100', 'alto' => '70', 'largo_izq' => NULL, 'largo_der' => NULL, 'alto_sup' => NULL, 'alto_inf' => NULL, 'mec1' => 'PRUEBA08', 'cantidad' => 1],
        ['id' => 9, 'producto_id' => 5, 'material_id' => 2, 'descripcion_id' => 33, 'largo' => 'H+150', 'alto' => 'P+EF+2', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'NA', 'cantidad' => 1],
        ['id' => 10, 'producto_id' => 6, 'material_id' => 2, 'descripcion_id' => 33, 'largo' => 'H+150', 'alto' => 'P+EF+2', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'NA', 'cantidad' => 1],
        ['id' => 11, 'producto_id' => 7, 'material_id' => 2, 'descripcion_id' => 33, 'largo' => 'H+150', 'alto' => 'P+EF+2', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'NA', 'cantidad' => 1],
        ['id' => 12, 'producto_id' => 8, 'material_id' => 2, 'descripcion_id' => 33, 'largo' => 'H+150', 'alto' => 'P+EF+2', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'NA', 'cantidad' => 1],
        ['id' => 13, 'producto_id' => 9, 'material_id' => 2, 'descripcion_id' => 34, 'largo' => 'H', 'alto' => 'P+EF+2', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'NA', 'cantidad' => 1],
        ['id' => 14, 'producto_id' => 10, 'material_id' => 2, 'descripcion_id' => 34, 'largo' => 'H', 'alto' => 'P+EF+2', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'NA', 'cantidad' => 1],
        ['id' => 15, 'producto_id' => 11, 'material_id' => 2, 'descripcion_id' => 34, 'largo' => 'H', 'alto' => 'P+EF+2', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'NA', 'cantidad' => 1],
        ['id' => 16, 'producto_id' => 12, 'material_id' => 2, 'descripcion_id' => 34, 'largo' => 'H', 'alto' => 'P+EF+2', 'largo_izq' => 2, 'largo_der' => 2, 'alto_sup' => 2, 'alto_inf' => 2, 'mec1' => 'NA', 'cantidad' => 1]
      ]);
      foreach ($materiales as $value) {
        Lista_materiale::create($value);
      }
    }
  }
