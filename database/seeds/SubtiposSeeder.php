<?php

use Illuminate\Database\Seeder;
use App\Subtipo;

class SubtiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subtipos = collect([
        ['tipo_id' => 1, 'nombre' => 'Bisagras Con Freno', 'acronimo' => 'BF'],
        ['tipo_id' => 1, 'nombre' => 'Bisagras Sin Freno', 'acronimo' => 'BS'],
        ['tipo_id' => 2, 'nombre' => 'Canto Delgado', 'acronimo' => 'CD'],
        ['tipo_id' => 2, 'nombre' => 'Canto Medio', 'acronimo' => 'CM'],
        ['tipo_id' => 2, 'nombre' => 'Canto Grueso', 'acronimo' => 'CG'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Undermount', 'acronimo' => 'CU'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Full Extension', 'acronimo' => 'CF'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Simples', 'acronimo' => 'CS'],
        ['tipo_id' => 4, 'nombre' => 'Tableros', 'acronimo' => 'TA'],
        ['tipo_id' => 5, 'nombre' => 'Conectores', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Accesorios', 'acronimo' => 'AC'],
        ['tipo_id' => 5, 'nombre' => 'Perfiles y Tubos', 'acronimo' => 'PE'],
        ['tipo_id' => 5, 'nombre' => 'Tapas', 'acronimo' => 'TA'],
        ['tipo_id' => 5, 'nombre' => 'Patas', 'acronimo' => 'PA'],
        ['tipo_id' => 6, 'nombre' => 'Gola', 'acronimo' => 'GO'],
        ['tipo_id' => 6, 'nombre' => 'Tirador', 'acronimo' => 'TI'],
        ['tipo_id' => 7, 'nombre' => 'Instrucciones', 'acronimo' => 'IN'],
        ['tipo_id' => 7, 'nombre' => 'Cajas', 'acronimo' => 'CJ'],
        ['tipo_id' => 7, 'nombre' => 'Etiquetas', 'acronimo' => 'ET'],
        ['tipo_id' => 11, 'nombre' => 'Cocina', 'acronimo' => 'CO'],
        ['tipo_id' => 11, 'nombre' => 'Closets', 'acronimo' => 'CL'],
        ['tipo_id' => 11, 'nombre' => 'Muebles de Baño', 'acronimo' => 'MB'],
        ['tipo_id' => 12, 'nombre' => 'Muebles Auxiliares', 'acronimo' => 'AU'],
        ['tipo_id' => 12, 'nombre' => 'Mesas de Noche', 'acronimo' => 'MN'],
        ['tipo_id' => 12, 'nombre' => 'Bufetera', 'acronimo' => 'BU'],
        ['tipo_id' => 12, 'nombre' => 'Muebles de TV', 'acronimo' => 'TV'],
        ['tipo_id' => 12, 'nombre' => 'Mesas de Centro', 'acronimo' => 'MC'],
        ['tipo_id' => 12, 'nombre' => 'Gaveteros', 'acronimo' => 'GA'],
        ['tipo_id' => 12, 'nombre' => 'Bibliotecas', 'acronimo' => 'BL']
      ]);

      foreach ($subtipos as $values) {
        Subtipo::create($values);
      }
    }
}
