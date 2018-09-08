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
        ['tipo_id' => 1, 'nombre' => 'Bisagras 180', 'acronimo' => 'FR'],
        ['tipo_id' => 1, 'nombre' => 'Bisagras Curvas', 'acronimo' => 'CU'],
        ['tipo_id' => 1, 'nombre' => 'Bisagras Rectas', 'acronimo' => 'RE'],
        ['tipo_id' => 1, 'nombre' => 'Bisagras SemiCurvass', 'acronimo' => 'SC'],
        ['tipo_id' => 2, 'nombre' => 'Canto Delgado', 'acronimo' => 'CD'],
        ['tipo_id' => 2, 'nombre' => 'Canto Medio', 'acronimo' => 'CM'],
        ['tipo_id' => 2, 'nombre' => 'Canto Grueso', 'acronimo' => 'CG'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Cocina', 'acronimo' => 'CC'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Undermount', 'acronimo' => 'CU'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Full Extension', 'acronimo' => 'CF'],
        ['tipo_id' => 3, 'nombre' => 'Correderas Simples', 'acronimo' => 'CS'],
        ['tipo_id' => 4, 'nombre' => 'Aglomerado HR', 'acronimo' => 'HR'],
        ['tipo_id' => 4, 'nombre' => 'Aglomerado', 'acronimo' => 'ST'],
        ['tipo_id' => 4, 'nombre' => 'MDF', 'acronimo' => 'MD'],
        ['tipo_id' => 5, 'nombre' => 'Tornillo 6x2"', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Tornillo 6x5/8"', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Tornillo 6x1"', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Mini Fix 15', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Mini Fix 25', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Pines', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Tarugo', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Rafix', 'acronimo' => 'CT'],
        ['tipo_id' => 5, 'nombre' => 'Tapa', 'acronimo' => 'TA'],
        ['tipo_id' => 6, 'nombre' => 'Brazo Hidraulico', 'acronimo' => 'AC'],
        ['tipo_id' => 7, 'nombre' => 'Zocalo 100', 'acronimo' => 'PE'],
        ['tipo_id' => 7, 'nombre' => 'Zocalo 100 Union', 'acronimo' => 'PE'],
        ['tipo_id' => 7, 'nombre' => 'Zocalo 100 Esquinero', 'acronimo' => 'PE'],
        ['tipo_id' => 7, 'nombre' => 'Zocalo 150', 'acronimo' => 'PE'],
        ['tipo_id' => 7, 'nombre' => 'Zocalo 150 Union', 'acronimo' => 'PE'],
        ['tipo_id' => 7, 'nombre' => 'Zocalo 150 Esquinero', 'acronimo' => 'PE'],
        ['tipo_id' => 7, 'nombre' => 'Tubo Guindador', 'acronimo' => 'PE'],
        ['tipo_id' => 7, 'nombre' => 'Soporte Tubo', 'acronimo' => 'PE'],
        ['tipo_id' => 8, 'nombre' => 'Pata 100', 'acronimo' => 'PA'],
        ['tipo_id' => 8, 'nombre' => 'Pata 150', 'acronimo' => 'PA'],
        ['tipo_id' => 8, 'nombre' => 'Base Pata', 'acronimo' => 'PA'],
        ['tipo_id' => 9, 'nombre' => 'Perfil Gola Clip', 'acronimo' => 'GO'],
        ['tipo_id' => 9, 'nombre' => 'Perfil Gola Tipo "C"', 'acronimo' => 'GO'],
        ['tipo_id' => 9, 'nombre' => 'Perfil Gola Tipo "L"', 'acronimo' => 'GO'],
        ['tipo_id' => 9, 'nombre' => 'Tirador', 'acronimo' => 'TI'],
        ['tipo_id' => 10, 'nombre' => 'Instrucciones', 'acronimo' => 'IN'],
        ['tipo_id' => 10, 'nombre' => 'Cajas', 'acronimo' => 'CJ'],
        ['tipo_id' => 10, 'nombre' => 'Etiquetas', 'acronimo' => 'ET'],
        ['tipo_id' => 14, 'nombre' => 'Base', 'acronimo' => 'B'],
        ['tipo_id' => 14, 'nombre' => 'Aereo', 'acronimo' => 'A'],
        ['tipo_id' => 14, 'nombre' => 'Torre', 'acronimo' => 'T'],
        ['tipo_id' => 14, 'nombre' => 'Gavetas', 'acronimo' => 'G'],
        ['tipo_id' => 14, 'nombre' => 'Extras', 'acronimo' => 'E'],
        ['tipo_id' => 15, 'nombre' => 'Caja 60 C/P', 'acronimo' => '6'],
        ['tipo_id' => 15, 'nombre' => 'Caja 33 S/P', 'acronimo' => '3'],
        ['tipo_id' => 16, 'nombre' => 'Aereo', 'acronimo' => 'A'],
        ['tipo_id' => 16, 'nombre' => 'Piso', 'acronimo' => 'P'],
        ['tipo_id' => 17, 'nombre' => 'Muebles Auxiliares', 'acronimo' => 'AU'],
        ['tipo_id' => 17, 'nombre' => 'Mesas de Noche', 'acronimo' => 'MN'],
        ['tipo_id' => 17, 'nombre' => 'Bufetera', 'acronimo' => 'BU'],
        ['tipo_id' => 17, 'nombre' => 'Muebles de TV', 'acronimo' => 'TV'],
        ['tipo_id' => 17, 'nombre' => 'Mesas de Centro', 'acronimo' => 'MC'],
        ['tipo_id' => 17, 'nombre' => 'Gaveteros', 'acronimo' => 'GA'],
        ['tipo_id' => 17, 'nombre' => 'Bibliotecas', 'acronimo' => 'BL'],
        ['tipo_id' => 6, 'nombre' => 'Brazo Mecanico', 'acronimo' => 'BM']
    ]);

foreach ($subtipos as $values) {
    Subtipo::create($values);
}
}
}
