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
