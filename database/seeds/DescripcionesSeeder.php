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
        // ['id' => 1, 'materiale_id' => 1, 'descripcion' => 'Division Flush', 'flargo' => 'H-(2*EC)', 'fancho' => 'P-(EC+EF+1)'],
        // ['id' => 2, 'materiale_id' => 1, 'descripcion' => 'Division Recedida', 'flargo' => 'H-(2*EC)', 'fancho' => 'P-(EC+EF+1+15)'],
        // ['id' => 3, 'materiale_id' => 3, 'descripcion' => 'Fondo', 'flargo' => 'H', 'fancho' => 'A-(2(EC/3)-1)'],
        // ['id' => 4, 'materiale_id' => 2, 'descripcion' => 'Puerta Gaveta', 'flargo' => NULL, 'fancho' => 'A-2'],
        // ['id' => 5, 'materiale_id' => 2, 'descripcion' => 'Frente Gaveta', 'flargo' => 'A-((2*CR)+(2*EC)+(2*EG))', 'fancho' => NULL],
        // ['id' => 6, 'materiale_id' => 4, 'descripcion' => 'Gav Trasera', 'flargo' => 'A-((2*CR)+(2*EC)+(2*EG))', 'fancho' => NULL],
        // ['id' => 7, 'materiale_id' => 4, 'descripcion' => 'Gav Lateral', 'flargo' => 'P-(EC+EF)', 'fancho' => NULL],
        // ['id' => 8, 'materiale_id' => 4, 'descripcion' => 'Gav Piso', 'flargo' => 'P-(EC+EF)', 'fancho' => 'A-((2*CR)+(2*EC)+2(EG/3))'],
        // ['id' => 9, 'materiale_id' => 1, 'descripcion' => 'Lateral', 'flargo' => 'H', 'fancho' => 'A'],
        // ['id' => 10, 'materiale_id' => 1, 'descripcion' => 'Lateral Bisagra', 'flargo' => 'H', 'fancho' => 'A'],
        // ['id' => 11, 'materiale_id' => 1, 'descripcion' => 'Lateral Gaveta Derecho', 'flargo' => 'H', 'fancho' => 'A'],
        // ['id' => 12, 'materiale_id' => 1, 'descripcion' => 'Lateral Der Bi', 'flargo' => 'H', 'fancho' => 'A'],
        // ['id' => 13, 'materiale_id' => 1, 'descripcion' => 'Lateral Izq Bi', 'flargo' => 'H', 'fancho' => 'A'],
        // ['id' => 14, 'materiale_id' => 1, 'descripcion' => 'Piso', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
        // ['id' => 15, 'materiale_id' => 1, 'descripcion' => 'Repisa Fija', 'flargo' => 'A-(2*EC)', 'fancho' => 'P-(EC+EF+1+15)'],
        // ['id' => 16, 'materiale_id' => 1, 'descripcion' => 'Repisa Movil', 'flargo' => 'A-((2*EC)+2)', 'fancho' => 'P-(EC+EF+1+15)'],
        // ['id' => 17, 'materiale_id' => 1, 'descripcion' => 'Techo', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
        // ['id' => 18, 'materiale_id' => 1, 'descripcion' => 'Techo Bi', 'flargo' => 'A-(2*EC)', 'fancho' => 'P'],
        // ['id' => 19, 'materiale_id' => 2, 'descripcion' => 'Puerta Sencilla DER', 'flargo' => 'H-2', 'fancho' => 'A-2'],
        // ['id' => 20, 'materiale_id' => 2, 'descripcion' => 'Puerta Sencilla IZQ', 'flargo' => 'H-2', 'fancho' => 'A-2'],
        // ['id' => 21, 'materiale_id' => 2, 'descripcion' => 'Puerta Doble DER', 'flargo' => 'H-2', 'fancho' => '(A/2)-2'],
        // ['id' => 22, 'materiale_id' => 2, 'descripcion' => 'Puerta Doble IZQ', 'flargo' => 'H-2', 'fancho' => '(A/2)-2'],
        // ['id' => 23, 'materiale_id' => 2, 'descripcion' => 'Puerta Gola', 'flargo' => 'H-32', 'fancho' => 'A'],
        // ['id' => 24, 'materiale_id' => 1, 'descripcion' => 'Relleno', 'flargo' => 'A-(2*EC)', 'fancho' => '128'],
        // ['id' => 25, 'materiale_id' => 1, 'descripcion' => 'Refuerzo', 'flargo' => NULL, 'fancho' => '128'],
        // ['id' => 26, 'materiale_id' => 6, 'descripcion' => 'Sobre', 'flargo' => NULL, 'fancho' => NULL],
        // ['id' => 27, 'materiale_id' => 7, 'descripcion' => 'Gaveta 96', 'flargo' => 'L', 'fancho' => 'A'],
        // ['id' => 28, 'materiale_id' => 7, 'descripcion' => 'Gavetas 160', 'flargo' => NULL, 'fancho' => NULL],
        // ['id' => 29, 'materiale_id' => 7, 'descripcion' => 'Gavetas 256', 'flargo' => NULL, 'fancho' => NULL],
        // ['id' => 30, 'materiale_id' => 2, 'descripcion' => 'Jamba Lateral', 'flargo' => 'H-100', 'fancho' => '70'],
        // ['id' => 31, 'materiale_id' => 2, 'descripcion' => 'Jamba 140mm', 'flargo' => 'H', 'fancho' => '140'],
        // ['id' => 32, 'materiale_id' => 2, 'descripcion' => 'Jamba Gola 140mm', 'flargo' => 'H-32', 'fancho' => '140'],
        // ['id' => 33, 'materiale_id' => 2, 'descripcion' => 'Panel Cierre a Piso con Zocalo de 15cm', 'flargo' => 'H+150', 'fancho' => 'P+EF+2'],
        // ['id' => 34, 'materiale_id' => 2, 'descripcion' => 'Panel Cierre a Borde de Modulo', 'flargo' => 'H', 'fancho' => 'P+EF+2']
        ['materiale_id'=>1,'descripcion'=>'Piso','acronimo'=>'PI','formula_area'=>'A*P','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Techo','acronimo'=>'TE','formula_area'=>'A*P','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Lateral Derecho','acronimo'=>'LD','formula_area'=>'H*P','formula_canto'=>'H','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Lateral Izquierdo','acronimo'=>'LI','formula_area'=>'H*P','formula_canto'=>'H','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Repisa Movil','acronimo'=>'RM','formula_area'=>'A*P','formula_canto'=>'A+2*P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'1'],
        ['materiale_id'=>1,'descripcion'=>'Repisa Fija','acronimo'=>'RF','formula_area'=>'A*P','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Division Vertical','acronimo'=>'DI','formula_area'=>'H*P','formula_canto'=>'H','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Piso Externo','acronimo'=>'PX','formula_area'=>'A*P','formula_canto'=>'A+2*P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'1'],
        ['materiale_id'=>1,'descripcion'=>'Techo Externo','acronimo'=>'TX','formula_area'=>'A*P','formula_canto'=>'A+2*P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'1'],
        ['materiale_id'=>1,'descripcion'=>'Refuerzo','acronimo'=>'RF','formula_area'=>'A*128','formula_canto'=>'A','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>2,'descripcion'=>'Frente Falso','acronimo'=>'FR','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
        ['materiale_id'=>2,'descripcion'=>'Puerta','acronimo'=>'PT','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
        ['materiale_id'=>2,'descripcion'=>'Puerta Doble','acronimo'=>'PT','formula_area'=>'A*H','formula_canto'=>'2*A+4*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
        ['materiale_id'=>2,'descripcion'=>'Panel','acronimo'=>'PN','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
        ['materiale_id'=>2,'descripcion'=>'Panel Sin Canto','acronimo'=>'PS','formula_area'=>'A*H','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>2,'descripcion'=>'Jamba','acronimo'=>'JB','formula_area'=>'A*H+H*128','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
        ['materiale_id'=>4,'descripcion'=>'Gaveta 96','acronimo'=>'G9','formula_area'=>'NULL','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>4,'descripcion'=>'Gaveta 256','acronimo'=>'G9','formula_area'=>'NULL','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>2,'descripcion'=>'Frente Gaveta','acronimo'=>'FR','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
        ['materiale_id'=>4,'descripcion'=>'Gaveta Frente Interno','acronimo'=>'GF','formula_area'=>'A*128','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>4,'descripcion'=>'Gaveta Lateral ','acronimo'=>'GL','formula_area'=>'P*128','formula_canto'=>'P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>4,'descripcion'=>'Gaveta Trasera','acronimo'=>'GT','formula_area'=>'A*128','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>4,'descripcion'=>'Gaveta Piso','acronimo'=>'GP','formula_area'=>'A*P','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Zocalo Trasero','acronimo'=>'ZT','formula_area'=>'A*H','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Zocalo Frente','acronimo'=>'ZF','formula_area'=>'A*H','formula_canto'=>'A+2*H','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'1'],
        ['materiale_id'=>1,'descripcion'=>'Zocalo Lateral','acronimo'=>'ZL','formula_area'=>'P*H','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>2,'descripcion'=>'Cenefa','acronimo'=>'CN','formula_area'=>'A*H+A*128','formula_canto'=>'2*A+2*H','canto_largo1'=>'1','canto_largo2'=>'1','canto_ancho1'=>'1','canto_ancho2'=>'1'],
        ['materiale_id'=>1,'descripcion'=>'Lateral Aereo Derecho','acronimo'=>'LD','formula_area'=>'H*P','formula_canto'=>'H+P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'NULL'],
        ['materiale_id'=>1,'descripcion'=>'Lateral Aereo Izquierdo','acronimo'=>'LI','formula_area'=>'H*P','formula_canto'=>'H+P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'NULL'],
        ['materiale_id'=>6,'descripcion'=>'Sobre','acronimo'=>'SO','formula_area'=>'A*P','formula_canto'=>'2*A+2*H','canto_largo1'=>'1','canto_largo2'=>'1','canto_ancho1'=>'1','canto_ancho2'=>'1'],
        ['materiale_id'=>1,'descripcion'=>'Refuerzo Colgador','acronimo'=>'RC','formula_area'=>'A*128','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>3,'descripcion'=>'Fondo','acronimo'=>'FG','formula_area'=>'A*H','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
        ['materiale_id'=>2,'descripcion'=>'Lama','acronimo'=>'LM','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
        ['materiale_id'=>1,'descripcion'=>'Soporte Vertical','acronimo'=>'SV','formula_area'=>'H*P','formula_canto'=>'2*A+2*H','canto_largo1'=>'1','canto_largo2'=>'1','canto_ancho1'=>'1','canto_ancho2'=>'1'],
        ['materiale_id'=>1,'descripcion'=>'Soporte Horizontal','acronimo'=>'SH','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'1','canto_largo2'=>'1','canto_ancho1'=>'1','canto_ancho2'=>'1']
      ]);
}
}
