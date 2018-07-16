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
        ['tipo_id' => 1, 'nombre' => 'Bisagra Sin Freno', 'acronimo' => 'BS'],
        ['tipo_id' => 2, 'nombre' => 'Canto Delgado', 'acronimo' => 'CD'],
        ['tipo_id' => 2, 'nombre' => 'Canto Medio', 'acronimo' => 'CM'],
        ['tipo_id' => 2, 'nombre' => 'Canto Grueso','acronimo' =>  'CG'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Undermount','acronimo' => 'CU'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Full Extension','acronimo' => 'CF'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Simples','acronimo' => 'CS'],
        ['tipo_id' => 4, 'nombre' => 'Aglomerado HR','acronimo' => 'HR'],
        ['tipo_id' => 4, 'nombre' => 'Aglomerado','acronimo' => 'ST'],
        ['tipo_id' => 4, 'nombre' => 'MDF','acronimo' => 'MD'],
        ['tipo_id' => 5, 'nombre' => 'Conectores','acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Accesorios','acronimo' => 'AC'],
        ['tipo_id' => 5, 'nombre' => 'Perfiles y Tubos','acronimo' =>  'PE'],
        ['tipo_id' => 5, 'nombre' => 'Tapas','acronimo' => 'TA'],
        ['tipo_id' => 5, 'nombre' => 'Patas','acronimo' => 'PA'],
        ['tipo_id' => 6, 'nombre' => 'Gola','acronimo' => 'GO'],
        ['tipo_id' => 6, 'nombre' => 'Tirador','acronimo' => 'TI'],
        ['tipo_id' => 7, 'nombre' => 'Instrucciones','acronimo' => 'IN'],
        ['tipo_id' => 7, 'nombre' => 'Cajas','acronimo' => 'CJ'],
        ['tipo_id' => 7, 'nombre' => 'Etiquetas','acronimo' => 'ET'],
        ['tipo_id' => 11, 'nombre' => 'Base','acronimo' =>  'B'],
        ['tipo_id' => 11, 'nombre' => 'Aereo','acronimo' => 'A'],
        ['tipo_id' => 11, 'nombre' => 'Torre','acronimo' => 'T'],
        ['tipo_id' => 11, 'nombre' => 'Gavetas','acronimo' => 'G'],
        ['tipo_id' => 11, 'nombre' => 'Extras','acronimo' => 'E'],
        ['tipo_id' => 12, 'nombre' => 'Caja 60 C/P','acronimo' => '6'],
        ['tipo_id' => 12, 'nombre' => 'Caja 33 C/P','acronimo' => '3'],
        ['tipo_id' => 13, 'nombre' => 'Aereo','acronimo' => 'A'],
        ['tipo_id' => 13, 'nombre' => 'Piso','acronimo' => 'P'],
        ['tipo_id' => 14, 'nombre' => 'Muebles Auxiliares','acronimo' => 'AU'],
        ['tipo_id' => 14, 'nombre' => 'Mesas de Noche','acronimo' => 'MN'],
        ['tipo_id' => 14, 'nombre' => 'Bufetera','acronimo' =>  'BU'],
        ['tipo_id' => 14, 'nombre' => 'Muebles de TV','acronimo' => 'TV'],
        ['tipo_id' => 14, 'nombre' => 'Mesas de Centro','acronimo' => 'MC'],
        ['tipo_id' => 14, 'nombre' => 'Gaveteros','acronimo' => 'GA'],
        ['tipo_id' => 14, 'nombre' => 'Bibliotecas','acronimo' => 'BL']
    ]);

      foreach ($subtipos as $values) {
        Subtipo::create($values);
    }
}
}
