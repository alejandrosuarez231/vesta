<?php

use Illuminate\Database\Seeder;

class DescripcionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descripciones')->insert([
        ['descripcion' => 'Division Flush'],
        ['descripcion' => 'Division Recedida'],
        ['descripcion' => 'Fondo'],
        ['descripcion' => 'Frente Gaveta GDE'],
        ['descripcion' => 'Frente Gaveta PEQ'],
        ['descripcion' => 'Gav Lateral GDE'],
        ['descripcion' => 'Gav Lateral PEQ'],
        ['descripcion' => 'Gav Piso'],
        ['descripcion' => 'Gav Trasera GDE'],
        ['descripcion' => 'Gav Trasera PEQ'],
        ['descripcion' => 'Lateral'],
        ['descripcion' => 'Lateral Bi'],
        ['descripcion' => 'Lateral Der Bi'],
        ['descripcion' => 'Lateral Gav'],
        ['descripcion' => 'Lateral Izq Bi'],
        ['descripcion' => 'Piso'],
        ['descripcion' => 'Puerta Doble DER'],
        ['descripcion' => 'Puerta Doble IZQ'],
        ['descripcion' => 'Puerta Gaveta GDE GOLA'],
        ['descripcion' => 'Puerta Gaveta GDE TIR'],
        ['descripcion' => 'Puerta Gaveta PEQ GOLA'],
        ['descripcion' => 'Puerta Gaveta PEQ TIR'],
        ['descripcion' => 'Puerta Gola DER'],
        ['descripcion' => 'Puerta Gola IZQ'],
        ['descripcion' => 'Puerta Sencilla DER'],
        ['descripcion' => 'Puerta Sencilla IZQ'],
        ['descripcion' => 'Refuerzo'],
        ['descripcion' => 'Relleno'],
        ['descripcion' => 'Repisa Fija '],
        ['descripcion' => 'Repisa Movil'],
        ['descripcion' => 'Sobre'],
        ['descripcion' => 'Techo'],
        ['descripcion' => 'Techo Bi'],
        ['descripcion' => 'Zoc Fondo'],
        ['descripcion' => 'Zoc Frente'],
        ['descripcion' => 'Zoc Lateral']
      ]);
    }
}
