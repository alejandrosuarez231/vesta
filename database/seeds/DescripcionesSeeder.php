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
            ['materiale_id' => 1, 'descripcion' => 'Division Flush', 'flargo' => 'H-(2*EC)', 'fancho' => 'P-(EC+EF+1)'],
            ['materiale_id' => 1, 'descripcion' => 'Division Recedida', 'flargo' => 'H-(2*EC)', 'fancho' => 'P-(EC+EF+1+15)'],
            ['materiale_id' => 3, 'descripcion' => 'Fondo', 'flargo' => 'H-(EC/3)', 'fancho' => 'A-(2(EC/3)-1)'],
            ['materiale_id' => 2, 'descripcion' => 'Puerta Gaveta', 'flargo' => 'Fijo', 'fancho' => 'A-2'],
            ['materiale_id' => 2, 'descripcion' => 'Frente Gaveta', 'flargo' => 'A-((2*CR)+(2*EC)+(2*EG))', 'fancho' => 'Fijo'],
            ['materiale_id' => 4, 'descripcion' => 'Gav Trasera', 'flargo' => 'A-((2*CR)+(2*EC)+(2*EG))', 'fancho' => 'Fijo'],
            ['materiale_id' => 4, 'descripcion' => 'Gav Lateral', 'flargo' => 'P-(EC+EF)', 'fancho' => 'Fijo'],
            ['materiale_id' => 4, 'descripcion' => 'Gav Piso', 'flargo' => 'P-(EC+EF)', 'fancho' => 'A-((2*CR)+(2*EC)+2(EG/3))'],
            ['materiale_id' => 1, 'descripcion' => 'Lateral', 'flargo' => 'H', 'fancho' => 'A'],
            ['materiale_id' => 1, 'descripcion' => 'Lateral Bi', 'flargo' => 'H', 'fancho' => 'A'],
            ['materiale_id' => 1, 'descripcion' => 'Lateral Gav', 'flargo' => 'H', 'fancho' => 'A'],
            ['materiale_id' => 1, 'descripcion' => 'Lateral Der Bi', 'flargo' => 'H', 'fancho' => 'A'],
            ['materiale_id' => 1, 'descripcion' => 'Lateral Izq Bi', 'flargo' => 'H', 'fancho' => 'A'],
            ['materiale_id' => 1, 'descripcion' => 'Piso', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
            ['materiale_id' => 1, 'descripcion' => 'Repisa Fija ', 'flargo' => 'A-(2*EC)', 'fancho' => 'P-(EC+EF+1+15)'],
            ['materiale_id' => 1, 'descripcion' => 'Repisa Movil', 'flargo' => 'A-((2*EC)+2)', 'fancho' => 'P-(EC+EF+1+15)'],
            ['materiale_id' => 1, 'descripcion' => 'Techo', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
            ['materiale_id' => 1, 'descripcion' => 'Techo Bi', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
            ['materiale_id' => 2, 'descripcion' => 'Puerta Sencilla DER', 'flargo' => 'H-2', 'fancho' => 'A-2'],
            ['materiale_id' => 2, 'descripcion' => 'Puerta Sencilla IZQ', 'flargo' => 'H-2', 'fancho' => 'A-2'],
            ['materiale_id' => 2, 'descripcion' => 'Puerta Doble DER', 'flargo' => 'H-2', 'fancho' => '(A/2)-2'],
            ['materiale_id' => 2, 'descripcion' => 'Puerta Doble IZQ', 'flargo' => 'H-2', 'fancho' => '(A/2)-2'],
            ['materiale_id' => 2, 'descripcion' => 'Puerta Gola', 'flargo' => 'H-32', 'fancho' => 'A'],
            ['materiale_id' => 1, 'descripcion' => 'Relleno', 'flargo' => 'A-(2*EC)', 'fancho' => '128'],
            ['materiale_id' => 1, 'descripcion' => 'Refuerzo', 'flargo' => NULL, 'fancho' => '128'],
            ['materiale_id' => 6, 'descripcion' => 'Sobre', 'flargo' => '$var', 'fancho' => '$var'],

        ]);
    }
}
