<?php

use Illuminate\Database\Seeder;

class PiezasModulosSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('piezas_modulos')->insert([
      ['materiale_id'=>1,'tipo_pieza'=>'Piso','acronimo'=>'PI','formula_area'=>'A*P','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Techo','acronimo'=>'TE','formula_area'=>'A*P','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Lateral Derecho','acronimo'=>'LD','formula_area'=>'H*P','formula_canto'=>'H','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Lateral Izquierdo','acronimo'=>'LI','formula_area'=>'H*P','formula_canto'=>'H','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Repisa Movil','acronimo'=>'RM','formula_area'=>'A*P','formula_canto'=>'A+2*P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'1'],
      ['materiale_id'=>1,'tipo_pieza'=>'Repisa Fija','acronimo'=>'RF','formula_area'=>'A*P','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Division Vertical','acronimo'=>'DI','formula_area'=>'H*P','formula_canto'=>'H','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Piso Externo','acronimo'=>'PX','formula_area'=>'A*P','formula_canto'=>'A+2*P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'1'],
      ['materiale_id'=>1,'tipo_pieza'=>'Techo Externo','acronimo'=>'TX','formula_area'=>'A*P','formula_canto'=>'A+2*P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'1'],
      ['materiale_id'=>1,'tipo_pieza'=>'Refuerzo','acronimo'=>'RF','formula_area'=>'A*128','formula_canto'=>'A','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>2,'tipo_pieza'=>'Frente Falso','acronimo'=>'FR','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
      ['materiale_id'=>2,'tipo_pieza'=>'Puerta','acronimo'=>'PT','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
      ['materiale_id'=>2,'tipo_pieza'=>'Puerta Doble','acronimo'=>'PT','formula_area'=>'A*H','formula_canto'=>'2*A+4*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
      ['materiale_id'=>2,'tipo_pieza'=>'Panel','acronimo'=>'PN','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
      ['materiale_id'=>2,'tipo_pieza'=>'Panel Sin Canto','acronimo'=>'PS','formula_area'=>'A*H','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>2,'tipo_pieza'=>'Jamba','acronimo'=>'JB','formula_area'=>'A*H+H*128','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
      ['materiale_id'=>4,'tipo_pieza'=>'Gaveta 96','acronimo'=>'G9','formula_area'=>'NULL','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>4,'tipo_pieza'=>'Gaveta 256','acronimo'=>'G9','formula_area'=>'NULL','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>2,'tipo_pieza'=>'Frente Gaveta','acronimo'=>'FR','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
      ['materiale_id'=>4,'tipo_pieza'=>'Gaveta Frente Interno','acronimo'=>'GF','formula_area'=>'A*128','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>4,'tipo_pieza'=>'Gaveta Lateral ','acronimo'=>'GL','formula_area'=>'P*128','formula_canto'=>'P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>4,'tipo_pieza'=>'Gaveta Trasera','acronimo'=>'GT','formula_area'=>'A*128','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>4,'tipo_pieza'=>'Gaveta Piso','acronimo'=>'GP','formula_area'=>'A*P','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Zocalo Trasero','acronimo'=>'ZT','formula_area'=>'A*H','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Zocalo Frente','acronimo'=>'ZF','formula_area'=>'A*H','formula_canto'=>'A+2*H','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'1'],
      ['materiale_id'=>1,'tipo_pieza'=>'Zocalo Lateral','acronimo'=>'ZL','formula_area'=>'P*H','formula_canto'=>'A','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>2,'tipo_pieza'=>'Cenefa','acronimo'=>'CN','formula_area'=>'A*H+A*128','formula_canto'=>'2*A+2*H','canto_largo1'=>'1','canto_largo2'=>'1','canto_ancho1'=>'1','canto_ancho2'=>'1'],
      ['materiale_id'=>1,'tipo_pieza'=>'Lateral Aereo Derecho','acronimo'=>'LD','formula_area'=>'H*P','formula_canto'=>'H+P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'NULL'],
      ['materiale_id'=>1,'tipo_pieza'=>'Lateral Aereo Izquierdo','acronimo'=>'LI','formula_area'=>'H*P','formula_canto'=>'H+P','canto_largo1'=>'1','canto_largo2'=>'NULL','canto_ancho1'=>'1','canto_ancho2'=>'NULL'],
      ['materiale_id'=>6,'tipo_pieza'=>'Sobre','acronimo'=>'SO','formula_area'=>'A*P','formula_canto'=>'2*A+2*H','canto_largo1'=>'1','canto_largo2'=>'1','canto_ancho1'=>'1','canto_ancho2'=>'1'],
      ['materiale_id'=>1,'tipo_pieza'=>'Refuerzo Colgador','acronimo'=>'RC','formula_area'=>'A*128','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>3,'tipo_pieza'=>'Fondo','acronimo'=>'FG','formula_area'=>'A*H','formula_canto'=>'NULL','canto_largo1'=>'NULL','canto_largo2'=>'NULL','canto_ancho1'=>'NULL','canto_ancho2'=>'NULL'],
      ['materiale_id'=>2,'tipo_pieza'=>'Lama','acronimo'=>'LM','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'2','canto_largo2'=>'2','canto_ancho1'=>'2','canto_ancho2'=>'2'],
      ['materiale_id'=>1,'tipo_pieza'=>'Soporte Vertical','acronimo'=>'SV','formula_area'=>'H*P','formula_canto'=>'2*A+2*H','canto_largo1'=>'1','canto_largo2'=>'1','canto_ancho1'=>'1','canto_ancho2'=>'1'],
      ['materiale_id'=>1,'tipo_pieza'=>'Soporte Horizontal','acronimo'=>'SH','formula_area'=>'A*H','formula_canto'=>'2*A+2*H','canto_largo1'=>'1','canto_largo2'=>'1','canto_ancho1'=>'1','canto_ancho2'=>'1']
    ]);
}
}
