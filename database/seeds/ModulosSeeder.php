<?php

use Illuminate\Database\Seeder;
use App\Modulo;

class ModulosSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $modulos = collect(
      [
        ["id" => 1, "tipos" => "14", "subtipos" => "41,42,43", "sar" => "1,2,3", "nombre" => "Jamba", "numerologia" => 1],
        ["id" => 2, "tipos" => "14", "subtipos" => "41,42,43", "sar" => "1,2,3", "nombre" => "Panel Cierre", "numerologia" => 2],
        ["id" => 3, "tipos" => "14", "subtipos" => "41,42,43", "sar" => "1,2,3", "nombre" => "Modulo Abierto", "numerologia" => 3],
        ["id" => 4, "tipos" => "14", "subtipos" => "41,43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta Izquierda", "numerologia" => 4],
        ["id" => 5, "tipos" => "14", "subtipos" => "41,43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta Derecha", "numerologia" => 5],
        ["id" => 6, "tipos" => "14", "subtipos" => "41", "sar" => "2,3,4", "nombre" => "Modulo 2 Puertas", "numerologia" => 6],
        ["id" => 7, "tipos" => "14", "subtipos" => "41", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta de Esquina", "numerologia" => 7],
        ["id" => 8, "tipos" => "14", "subtipos" => "41", "sar" => "1,2,3", "nombre" => "Modulo Fregador 1 Puerta Izquierdo", "numerologia" => 8],
        ["id" => 9, "tipos" => "14", "subtipos" => "41", "sar" => "1,2,3", "nombre" => "Modulo Fregador 1 Puerta Derecha", "numerologia" => 9],
        ["id" => 10, "tipos" => "14", "subtipos" => "41", "sar" => "1,2,3", "nombre" => "Modulo Fregador 2 Puertas", "numerologia" => 10],
        ["id" => 11, "tipos" => "14", "subtipos" => "41", "sar" => "1,2,3", "nombre" => "Modulo Horno", "numerologia" => 11],
        ["id" => 12, "tipos" => "14", "subtipos" => "41", "sar" => "1,2,3", "nombre" => "Modulo 2 Gavetas", "numerologia" => 12],
        ["id" => 13, "tipos" => "14", "subtipos" => "41", "sar" => "1,2,3", "nombre" => "Modulo 3 Gavetas", "numerologia" => 13],
        ["id" => 14, "tipos" => "14", "subtipos" => "41", "sar" => "2,3", "nombre" => "Modulo 4 Gavetas", "numerologia" => 14],
        ["id" => 15, "tipos" => "14", "subtipos" => "42", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta Izquierda Vertical", "numerologia" => 4],
        ["id" => 16, "tipos" => "14", "subtipos" => "42", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta Derecha Vertical", "numerologia" => 5],
        ["id" => 17, "tipos" => "14", "subtipos" => "42,43", "sar" => "1,2,3", "nombre" => "Modulo 2 Puertas Verticales", "numerologia" => 6],
        ["id" => 18, "tipos" => "14", "subtipos" => "42", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta Horizontal", "numerologia" => 7],
        ["id" => 19, "tipos" => "14", "subtipos" => "42", "sar" => "1,2,3", "nombre" => "Modulo 2 Puerta Horizontal", "numerologia" => 8],
        ["id" => 20, "tipos" => "14", "subtipos" => "42", "sar" => "1,2,3", "nombre" => "Modulo Extractor 1 Puerta Vertical", "numerologia" => 9],
        ["id" => 21, "tipos" => "14", "subtipos" => "42", "sar" => "1,2,3", "nombre" => "Modulo Extractor 2 Puerta Vertical", "numerologia" => 10],
        ["id" => 22, "tipos" => "14", "subtipos" => "42", "sar" => "1,2,3", "nombre" => "Modulo Extractor 1 Puerta Horizontal", "numerologia" => 11],
        ["id" => 23, "tipos" => "14", "subtipos" => "41,43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta Izquierda", "numerologia" => 4],
        ["id" => 24, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 2 Puertas en sentido horizontal ( apertura izquierda ]", "numerologia" => 7],
        ["id" => 25, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 2 Puertas en sentido horizontal ( apertura derecha ]", "numerologia" => 8],
        ["id" => 26, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 4 Puertas en sentido horizontal", "numerologia" => 9],
        ["id" => 27, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 2 Puertas en sentido horizontal, 1 espacio horno ( apertura izquierda ]", "numerologia" => 10,  ],
        ["id" => 28, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 2 Puertas en sentido horizontal, 1 espacio horno ( apertura derecha ]", "numerologia" => 11],
        ["id" => 29, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 4 Puertas en sentido horizontal, 1 espacio horno", "numerologia" => 12,],
        ["id" => 30, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta horizontal , 1 espacio microhonda, 1 espacio horno, 1 puerta vertical ( apertura izquierda ]", "numerologia" => 13],
        ["id" => 31, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta horizontal , 1 espacio microhonda, 1 espacio horno, 1 puerta vertical ( apertura derecha ]", "numerologia" => 14],
        ["id" => 32, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta horizontal , 1 espacio microhonda, 1 espacio horno, 2 puerta vertical", "numerologia" => 15],
        ["id" => 33, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta ( apertura izquierda ] , 2 gaveta", "numerologia" => 16],
        ["id" => 34, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta ( apertura derecha ] , 2 gaveta", "numerologia" => 17],
        ["id" => 35, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta ( apertura izquierda ] , 3 gaveta", "numerologia" => 18],
        ["id" => 36, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta ( apertura derecha ] , 3 gaveta", "numerologia" => 19],
        ["id" => 37, "tipos" => "14", "subtipos" => "43", "sar" => "1,2,3", "nombre" => "Modulo 1 Puerta ( apertura izquierda ] , 4 gaveta", "numerologia" => 20],
        ["id" => 38, "tipos" => "14", "subtipos" => "43", "sar" => "2,3", "nombre" => "Modulo 1 Puerta ( apertura derecha ] , 4 gaveta", "numerologia" => 21],
        ["id" => 39, "tipos" => "14", "subtipos" => "43", "sar" => "2,3", "nombre" => "Modulo 2 Puertas, 2 gavetas", "numerologia" => 22],
        ["id" => 40, "tipos" => "14", "subtipos" => "43", "sar" => "2,3", "nombre" => "Modulo 2 Puertas , 3 gavetas", "numerologia" => 23],
        ["id" => 41, "tipos" => "14", "subtipos" => "43", "sar" => "2,3", "nombre" => "Modulo 2 Puertas  , 4 gavetas", "numerologia" => 24],
        ["id" => 42, "tipos" => "14", "subtipos" => "43", "sar" => "2,3", "nombre" => "Modulo Nevera, 1 Puerta horizontal", "numerologia" => 25],
        ["id" => 43, "tipos" => "14", "subtipos" => "43", "sar" => "1", "nombre" => "Modulo 2 Puertas, 2 gavetas", "numerologia" => 21],
        ["id" => 44, "tipos" => "14", "subtipos" => "43", "sar" => "1", "nombre" => "Modulo 2 Puertas , 3 gavetas", "numerologia" => 22],
        ["id" => 45, "tipos" => "14", "subtipos" => "43", "sar" => "1", "nombre" => "Modulo Nevera, 1 Puerta horizontal", "numerologia" => 23]
      ]
    );

foreach ( $modulos as $obj) {
  $modulo = new Modulo;
  $modulo->id = $obj['id'];
  $modulo->tipos = $obj['tipos'];
  $modulo->subtipos = $obj['subtipos'];
  $modulo->sar = $obj['sar'];
  $modulo->nombre = $obj['nombre'];
  $modulo->numerologia = $obj['numerologia'];
  $modulo->save();
}

}

}

