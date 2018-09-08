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
        ['id' => 1, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => 'Jamba 140mm', 'numerologia' => 1],
        ['id' => 2, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => 'Panel Cierre A Borde de Modulo' , 'numerologia' => 2],
        ['id' => 3, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => 'Panel Cierre A Piso Con Zocalo de 15cm', 'numerologia' => 3],
        ['id' => 4, 'tipos' => '14', 'subtipos' => '42', 'sar' => '1,2,3,4', 'nombre' => 'Cenefa 140mm', 'numerologia' => 4],
        ['id' => 5, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => 'Modulo Abierto', 'numerologia' => 5],
        ['id' => 6, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => 'Abierto 1 Division y 4 Repisas', 'numerologia' => 6],
        ['id' => 7, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => 'Abierto 2 Divisiones y 6 Repisas', 'numerologia' => 7],
        ['id' => 8, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => '1 Puerta Izquierdo', 'numerologia' => 8],
        ['id' => 9, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => '1 Puerta Derecho', 'numerologia' => 9],
        ['id' => 10, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => '1 Puerta de Esquina Izquierdo', 'numerologia' => 10],
        ['id' => 11, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => '1 Puerta de Esquina Derecho', 'numerologia' => 11],
        ['id' => 12, 'tipos' => '14', 'subtipos' => '41,42,43', 'sar' => '1,2,3,4', 'nombre' => '2 Puertas', 'numerologia' => 12],
        ['id' => 13, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => 'Fregador 1 Puerta Izquierdo', 'numerologia' => 13],
        ['id' => 14, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => 'Fregador 1 Puerta Derecho', 'numerologia' => 14],
        ['id' => 15, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => 'Fregador 2 Puertas', 'numerologia' => 15],
        ['id' => 16, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => 'Horno Empotrado', 'numerologia' => 16],
        ['id' => 17, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => '2 Gavetas', 'numerologia' => 17],
        ['id' => 18, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => '3 Gavetas', 'numerologia' => 18],
        ['id' => 19, 'tipos' => '14', 'subtipos' => '41', 'sar' => '2,3,4', 'nombre' => '4 Gavetas', 'numerologia' => 19],
        ['id' => 20, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => 'Condimentero', 'numerologia' => 20],
        ['id' => 21, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => 'Papelera', 'numerologia' => 21],
        ['id' => 22, 'tipos' => '14', 'subtipos' => '41,42', 'sar' => '1,2,3,4', 'nombre' => 'Vinera 7  Espacios', 'numerologia' => 22],
        ['id' => 23, 'tipos' => '14', 'subtipos' => '41,42', 'sar' => '1,2,3,4', 'nombre' => 'Vinera 14 Espacios', 'numerologia' => 23],
        ['id' => 24, 'tipos' => '14', 'subtipos' => '41,42', 'sar' => '1,2,3,4', 'nombre' => 'Vinera 21 Espacios', 'numerologia' => 24],
        ['id' => 25, 'tipos' => '14', 'subtipos' => '41', 'sar' => '1,2,3,4', 'nombre' => 'Lavaplato Automatico', 'numerologia' => 25],
        ['id' => 26, 'tipos' => '14', 'subtipos' => '42', 'sar' => '1,2,3,4', 'nombre' => '1 Puerta Horizontal', 'numerologia' => 26],
        ['id' => 27, 'tipos' => '14', 'subtipos' => '42', 'sar' => '1,2,3,4', 'nombre' => '2 Puertas Horizontal', 'numerologia' => 27],
        ['id' => 28, 'tipos' => '14', 'subtipos' => '42', 'sar' => '1,2,3,4', 'nombre' => 'Esquina Abierto', 'numerologia' => 28],
        ['id' => 29, 'tipos' => '14', 'subtipos' => '42', 'sar' => '1,2,3,4', 'nombre' => 'Una Puerta con Escurreplato', 'numerologia' => 29],
        ['id' => 30, 'tipos' => '14', 'subtipos' => '42', 'sar' => '1,2,3,4', 'nombre' => '2 Puertas con Escurreplato', 'numerologia' => 30],
        ['id' => 31, 'tipos' => '14', 'subtipos' => '42', 'sar' => '1,2,3,4', 'nombre' => '2 Puertas con Modulo Abierto Abajo', 'numerologia' => 31],
        ['id' => 32, 'tipos' => '14', 'subtipos' => '42', 'sar' => '1,2,3,4', 'nombre' => 'Panel de Nevera', 'numerologia' => 32],
        ['id' => 33, 'tipos' => '14', 'subtipos' => '43', 'sar' => '1,2,3,4', 'nombre' => '2 Puertas División Horizontal Izquierdo', 'numerologia' => 33],
        ['id' => 34, 'tipos' => '14', 'subtipos' => '43', 'sar' => '1,2,3,4', 'nombre' => '2 Puertas División Horizontal Derecho', 'numerologia' => 34],
        ['id' => 35, 'tipos' => '14', 'subtipos' => '43', 'sar' => '1,2,3,4', 'nombre' => '4 Puertas', 'numerologia' => 35],
        ['id' => 36, 'tipos' => '14', 'subtipos' => '43', 'sar' => '1,2,3,4', 'nombre' => 'Horno Empotrado Para Torre', 'numerologia' => 36],
        ['id' => 37, 'tipos' => '14', 'subtipos' => '43', 'sar' => '1,2,3,4', 'nombre' => 'Horno y Microonda Para Torre', 'numerologia' => 37],
        ['id' => 38, 'tipos' => '14', 'subtipos' => '43', 'sar' => '1,2,3,4', 'nombre' => '2 Hornos Para Torre', 'numerologia' => 38],
        ['id' => 39, 'tipos' => '14', 'subtipos' => '42,43', 'sar' => 1, 'nombre' => 'Aereo 1 Puerta Vertical Para Torre', 'numerologia' => 39],
        ['id' => 40, 'tipos' => '14', 'subtipos' => '42,43', 'sar' => 1, 'nombre' => 'Aereo 2 Puertas Vertical Para Torre', 'numerologia' => 40],
        ['id' => 41, 'tipos' => '14', 'subtipos' => '42,43', 'sar' => 1, 'nombre' => 'Aereo 1 Puerta Horizontal Para Torre', 'numerologia' => 41],
        ['id' => 42, 'tipos' => '14', 'subtipos' => '44', 'sar' => '1,2,3,4', 'nombre' => 'Gaveta 96', 'numerologia' => 42],
        ['id' => 43, 'tipos' => '14', 'subtipos' => '44', 'sar' => '1,2,3,4', 'nombre' => 'Gaveta 160', 'numerologia' => 43],
        ['id' => 44, 'tipos' => '14', 'subtipos' => '44', 'sar' => '1,2,3,4', 'nombre' => 'Gaveta 256', 'numerologia' => 44],
        ['id' => 45, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Panel canto Grueso por 4 Lados', 'numerologia' => 45],
        ['id' => 46, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja Sin Fondo', 'numerologia' => 46],
        ['id' => 47, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja Con Fondo sin Puerta', 'numerologia' => 47],
        ['id' => 48, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 1 Puerta Vertical', 'numerologia' => 48],
        ['id' => 49, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 2 Puertas Verticales', 'numerologia' => 49],
        ['id' => 50, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja Aerea con 1 Puerta Batiente', 'numerologia' => 50],
        ['id' => 51, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja Base con 1 Puerta Batiente', 'numerologia' => 51],
        ['id' => 52, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 1 Gaveta 96 Externa', 'numerologia' => 52],
        ['id' => 53, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 1 Gaveta 96 Interna', 'numerologia' => 53],
        ['id' => 54, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 2 Gavetas 96 Externa', 'numerologia' => 54],
        ['id' => 55, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 2 Gavetas 96 Interna', 'numerologia' => 55],
        ['id' => 56, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 3 Gavetas 96 Externa', 'numerologia' => 56],
        ['id' => 57, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 3 Gavetas 96 Interna', 'numerologia' => 57],
        ['id' => 58, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 4 Gavetas 96 Externa', 'numerologia' => 58],
        ['id' => 59, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 4 Gavetas 96 Interna', 'numerologia' => 59],
        ['id' => 60, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 1 Division Vertical', 'numerologia' => 60],
        ['id' => 61, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 2 Divisiones Verticales', 'numerologia' => 61],
        ['id' => 62, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 3 Divisiones Verticales', 'numerologia' => 62],
        ['id' => 63, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 4 Divisiones Verticales', 'numerologia' => 63],
        ['id' => 64, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 5 Divisiones Verticales', 'numerologia' => 64],
        ['id' => 65, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 6 Divisiones Verticales', 'numerologia' => 65],
        ['id' => 66, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 7 Divisiones Verticales', 'numerologia' => 66],
        ['id' => 67, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 8 Divisiones Verticales', 'numerologia' => 67],
        ['id' => 68, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 9 Divisiones Verticales', 'numerologia' => 68],
        ['id' => 69, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con 10 Divisiones Verticales', 'numerologia' => 69],
        ['id' => 70, 'tipos' => '14', 'subtipos' => '45', 'sar' => '1,2,3,4', 'nombre' => 'Caja con Division Horizontal y Vertical', 'numerologia' => 70]
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

