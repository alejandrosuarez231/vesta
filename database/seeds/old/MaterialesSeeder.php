<?php

use Illuminate\Database\Seeder;
use App\Materiale;

class MaterialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $materiales = collect([
        'Division',
        'Fondo',
        'Frente',
        'Frente Gaveta',
        'Gav Lateral',
        'Gav Piso',
        'Gav Trasera',
        'Gaveta',
        'Jamba modulo',
        'Jamba modulo aereo',
        'Jamba modulo torre',
        'Kit de cocina',
        'Kit de Jamba',
        'Lateral',
        'Lateral Bi',
        'Lateral Der Bi',
        'Lateral Gav',
        'Lateral Izq Bi',
        'Panel de cierre',
        'Piso',
        'Puerta',
        'Refuerzo',
        'Relleno',
        'Repisa',
        'Repisa Fija',
        'Repisa Movil',
        'Sobre',
        'Techo',
        'Techo Bi',
        'Zoc Fondo',
        'Zoc Frente',
        'Zoc Lateral',
        'Zocalo'
      ]);
      foreach ($materiales as $value) {
        Materiale::create(['nombre' => $value]);
      }

    }
  }
