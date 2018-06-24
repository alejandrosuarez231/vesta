<?php

use Illuminate\Database\Seeder;
use App\Unidad;

class MedidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $medidas = collect([
        ['acronimo' => 'mm' , 'nombre' => 'Milimetros' ],
        ['acronimo' => 'mm2' , 'nombre' => 'Milimetros cuadrado' ],
        ['acronimo' => 'gal' , 'nombre' => 'Galones' ],
        ['acronimo' => 'Und' , 'nombre' => 'Unidad' ],
      ]);

      foreach ($medidas as $values) {
        Unidad::create($values);
      }
    }
}
