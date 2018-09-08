<?php

use Illuminate\Database\Seeder;
use App\Materiale;

class Materiales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materiales = collect([
            ['id' => 1, 'tipos' => '14,15,16,17', 'subtipos' =>  '41,42,43,45,46,47,48,49,50,51,52,53,54,55,56', 'sku' => NULL, 'nombre' => 'Caja'],
            ['id' => 2, 'tipos' => '14,15,16,17', 'subtipos' =>  '41,42,43,45,46,47,48,49,50,51,52,53,54,55,56', 'sku' => NULL, 'nombre' => 'Frente'],
            ['id' => 3, 'tipos' => '14,15,16,17', 'subtipos' =>  '41,42,43,45,46,47,48,49,50,51,52,53,54,55,56', 'sku' => NULL, 'nombre' => 'Fondo'],
            ['id' => 4, 'tipos' => '14', 'subtipos' => '44', 'sku' => NULL, 'nombre' => 'Gaveta'],
            ['id' => 5, 'tipos' => '14,15,16,17', 'subtipos' =>  '41,42,43,45,46,47,48,49,50,51,52,53,54,55,56', 'sku' => NULL, 'nombre' => 'Hielo Seco'],
            ['id' => 6, 'tipos' => '14,15,16,17', 'subtipos' => NULL, 'sku' => NULL, 'nombre' => 'Sobre'],
            ['id' => 7, 'tipos' => '14', 'subtipos' => '41,42,43,45', 'sku' => NULL, 'nombre' => 'Gavetas']
        ]);
        foreach ($materiales as $value) {
            Materiale::create($value);
        }
    }
}
