<?php

use Illuminate\Database\Seeder;

class SubcategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('subcategorias')->insert(
      [
        ['id' => 1, 'categoria_id' => 10, 'nombre' => 'Division'],
        ['id' => 2, 'categoria_id' => 11, 'nombre' => 'Fondo'],
        ['id' => 3, 'categoria_id' => 12, 'nombre' => 'Frente'],
        ['id' => 4, 'categoria_id' => 12, 'nombre' => 'Frente Gaveta'],
        ['id' => 5, 'categoria_id' => 13, 'nombre' => 'Gaveta Trasera'],
        ['id' => 6, 'categoria_id' => 13, 'nombre' => 'Gaveta Lateral'],
        ['id' => 7, 'categoria_id' => 13, 'nombre' => 'Gaveta Piso'],
        ['id' => 8, 'categoria_id' => 14, 'nombre' => 'Lateral'],
        ['id' => 9, 'categoria_id' => 14, 'nombre' => 'Lateral Bi'],
        ['id' => 10, 'categoria_id' => 14, 'nombre' => 'Lateral Gav'],
        ['id' => 11, 'categoria_id' => 14, 'nombre' => 'Lateral Der Bi'],
        ['id' => 12, 'categoria_id' => 14, 'nombre' => 'Lateral Izq Bi'],
        ['id' => 13, 'categoria_id' => 15, 'nombre' => 'Piso'],
        ['id' => 14, 'categoria_id' => 16, 'nombre' => 'Repisa Fija'],
        ['id' => 15, 'categoria_id' => 16, 'nombre' => 'Repisa Movil'],
        ['id' => 16, 'categoria_id' => 17, 'nombre' => 'Techo'],
        ['id' => 17, 'categoria_id' => 17, 'nombre' => 'Techo Bi'],
        ['id' => 18, 'categoria_id' => 18, 'nombre' => 'Zoc Fondo'],
        ['id' => 19, 'categoria_id' => 18, 'nombre' => 'Zoc Frente'],
        ['id' => 20, 'categoria_id' => 18, 'nombre' => 'Zoc Lateral'],
        ['id' => 21, 'categoria_id' => 19, 'nombre' => 'Puerta'],
        ['id' => 22, 'categoria_id' => 20, 'nombre' => 'Relleno'],
        ['id' => 23, 'categoria_id' => 21, 'nombre' => 'Refuerzo'],
        ['id' => 24, 'categoria_id' => 22, 'nombre' => 'Panel de cierre'],
        ['id' => 25, 'categoria_id' => 23, 'nombre' => 'Sobre'],
        ['id' => 26, 'categoria_id' => 24, 'nombre' => 'Jamba modulo'],
        ['id' => 27, 'categoria_id' => 24, 'nombre' => 'Jamba modulo aereo'],
        ['id' => 28, 'categoria_id' => 24, 'nombre' => 'Jamba modulo torre'],
        ['id' => 29, 'categoria_id' => 25, 'nombre' => 'Conjunto de módulos Preestablecidos']
      ]
    );
   }
 }
