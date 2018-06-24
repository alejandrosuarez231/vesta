<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categorias')->insert(
        [['id' => 1,'tipo_id' => 4,'nombre' => 'Tubo Colgador'],
                ['id' => 2,'tipo_id' => 4,'nombre' => 'Zocalo'],
                ['id' => 3,'tipo_id' => 4,'nombre' => 'Perfil Gola'],
                ['id' => 4,'tipo_id' => 4,'nombre' => 'Perifl Gola Base'],
                ['id' => 5,'tipo_id' => 4,'nombre' => 'Tip on'],
                ['id' => 6,'tipo_id' => 4,'nombre' => 'Tirador'],
                ['id' => 7,'tipo_id' => 4,'nombre' => 'Instrucciones'],
                ['id' => 8,'tipo_id' => 4,'nombre' => 'Cajas'],
                ['id' => 9,'tipo_id' => 4,'nombre' => 'Etiquetas'],
                ['id' => 10,'tipo_id' => 9,'nombre' => 'Division'],
                ['id' => 11,'tipo_id' => 9,'nombre' => 'Fondo'],
                ['id' => 12,'tipo_id' => 9,'nombre' => 'Frente'],
                ['id' => 13,'tipo_id' => 9,'nombre' => 'Gaveta'],
                ['id' => 14,'tipo_id' => 9,'nombre' => 'Lateral'],
                ['id' => 15,'tipo_id' => 9,'nombre' => 'Piso'],
                ['id' => 16,'tipo_id' => 9,'nombre' => 'Repisas'],
                ['id' => 17,'tipo_id' => 9,'nombre' => 'Techo'],
                ['id' => 18,'tipo_id' => 9,'nombre' => 'Zócalo'],
                ['id' => 19,'tipo_id' => 9,'nombre' => 'Puerta'],
                ['id' => 20,'tipo_id' => 9,'nombre' => 'Relleno'],
                ['id' => 21,'tipo_id' => 9,'nombre' => 'Refuerzo'],
                ['id' => 22,'tipo_id' => 9,'nombre' => 'Panel de cierre'],
                ['id' => 23,'tipo_id' => 9,'nombre' => 'Sobre'],
                ['id' => 24,'tipo_id' => 10,'nombre' => 'Kit de Jamba'],
                ['id' => 25,'tipo_id' => 10,'nombre' => 'Kit de cocina']]
      );
      // $categorias = collect([

      // ]);
      // foreach ($categorias as $values) {
      //   DB::table('categorias')->insert([
      //     'id' => $values->id,
      //     'tipo_id' => $values->tipo_id,
      //     'nombre' => $values->nombre,
      //   ]);
      // }
    }
}
