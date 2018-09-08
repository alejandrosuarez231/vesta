<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['id' => 1, 'materiale_id' => 1, 'descripcion' => 'Division Flush', 'flargo' => 'H-(2*EC)', 'fancho' => 'P-(EC+EF+1)'],
            ['id' => 2, 'materiale_id' => 1, 'descripcion' => 'Division Recedida', 'flargo' => 'H-(2*EC)', 'fancho' => 'P-(EC+EF+1+15)'],
            ['id' => 3, 'materiale_id' => 3, 'descripcion' => 'Fondo', 'flargo' => 'H', 'fancho' => 'A-(2(EC/3)-1)'],
            ['id' => 4, 'materiale_id' => 2, 'descripcion' => 'Puerta Gaveta', 'flargo' => NULL, 'fancho' => 'A-2'],
            ['id' => 5, 'materiale_id' => 2, 'descripcion' => 'Frente Gaveta', 'flargo' => 'A-((2*CR)+(2*EC)+(2*EG))', 'fancho' => NULL],
            ['id' => 6, 'materiale_id' => 4, 'descripcion' => 'Gav Trasera', 'flargo' => 'A-((2*CR)+(2*EC)+(2*EG))', 'fancho' => NULL],
            ['id' => 7, 'materiale_id' => 4, 'descripcion' => 'Gav Lateral', 'flargo' => 'P-(EC+EF)', 'fancho' => NULL],
            ['id' => 8, 'materiale_id' => 4, 'descripcion' => 'Gav Piso', 'flargo' => 'P-(EC+EF)', 'fancho' => 'A-((2*CR)+(2*EC)+2(EG/3))'],
            ['id' => 9, 'materiale_id' => 1, 'descripcion' => 'Lateral', 'flargo' => 'H', 'fancho' => 'A'],
            ['id' => 10, 'materiale_id' => 1, 'descripcion' => 'Lateral Bisagra', 'flargo' => 'H', 'fancho' => 'A'],
            ['id' => 11, 'materiale_id' => 1, 'descripcion' => 'Lateral Gaveta Derecho', 'flargo' => 'H', 'fancho' => 'A'],
            ['id' => 12, 'materiale_id' => 1, 'descripcion' => 'Lateral Der Bi', 'flargo' => 'H', 'fancho' => 'A'],
            ['id' => 13, 'materiale_id' => 1, 'descripcion' => 'Lateral Izq Bi', 'flargo' => 'H', 'fancho' => 'A'],
            ['id' => 14, 'materiale_id' => 1, 'descripcion' => 'Piso', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
            ['id' => 15, 'materiale_id' => 1, 'descripcion' => 'Repisa Fija', 'flargo' => 'A-(2*EC)', 'fancho' => 'P-(EC+EF+1+15)'],
            ['id' => 16, 'materiale_id' => 1, 'descripcion' => 'Repisa Movil', 'flargo' => 'A-((2*EC)+2)', 'fancho' => 'P-(EC+EF+1+15)'],
            ['id' => 17, 'materiale_id' => 1, 'descripcion' => 'Techo', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
            ['id' => 18, 'materiale_id' => 1, 'descripcion' => 'Techo Bi', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
            ['id' => 19, 'materiale_id' => 2, 'descripcion' => 'Puerta Sencilla DER', 'flargo' => 'H-2', 'fancho' => 'A-2'],
            ['id' => 20, 'materiale_id' => 2, 'descripcion' => 'Puerta Sencilla IZQ', 'flargo' => 'H-2', 'fancho' => 'A-2'],
            ['id' => 21, 'materiale_id' => 2, 'descripcion' => 'Puerta Doble DER', 'flargo' => 'H-2', 'fancho' => '(A/2)-2'],
            ['id' => 22, 'materiale_id' => 2, 'descripcion' => 'Puerta Doble IZQ', 'flargo' => 'H-2', 'fancho' => '(A/2)-2'],
            ['id' => 23, 'materiale_id' => 2, 'descripcion' => 'Puerta Gola', 'flargo' => 'H-32', 'fancho' => 'A'],
            ['id' => 24, 'materiale_id' => 1, 'descripcion' => 'Relleno', 'flargo' => 'A-(2*EC)', 'fancho' => '128'],
            ['id' => 25, 'materiale_id' => 1, 'descripcion' => 'Refuerzo', 'flargo' => NULL, 'fancho' => '128'],
            ['id' => 26, 'materiale_id' => 6, 'descripcion' => 'Sobre', 'flargo' => NULL, 'fancho' => NULL],
            ['id' => 27, 'materiale_id' => 7, 'descripcion' => 'Gaveta 96', 'flargo' => 'L', 'fancho' => 'A'],
            ['id' => 28, 'materiale_id' => 7, 'descripcion' => 'Gavetas 160', 'flargo' => NULL, 'fancho' => NULL],
            ['id' => 29, 'materiale_id' => 7, 'descripcion' => 'Gavetas 256', 'flargo' => NULL, 'fancho' => NULL],
            ['id' => 30, 'materiale_id' => 1, 'descripcion' => 'Jamba Lateral', 'flargo' => 'H-100', 'fancho' => '70'],
            ['id' => 31, 'materiale_id' => 2, 'descripcion' => 'Jamba 140mm', 'flargo' => 'H', 'fancho' => '140'],
            ['id' => 32, 'materiale_id' => 2, 'descripcion' => 'Jamba Gola 140mm', 'flargo' => 'H-32', 'fancho' => '140'],
            ['id' => 33, 'materiale_id' => 2, 'descripcion' => 'Panel Cierre a Piso con Zocalo de 15cm', 'flargo' => 'H+150', 'fancho' => 'P+EF+2'],
            ['id' => 34, 'materiale_id' => 2, 'descripcion' => 'Panel Cierre a Borde de Modulo', 'flargo' => 'H', 'fancho' => 'P+EF+2']
        ]);
}
}
