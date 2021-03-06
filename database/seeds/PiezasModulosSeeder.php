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
      [
        "id" => 1,
        "tipo_pieza" => "Piso ",
        "materiale_id" => 1,
        "acronimo" => "PI",
        "formula_largo" => "A",
        "formula_ancho" => "P",
        "formula_canto" => "A",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 2,
        "tipo_pieza" => "Techo",
        "materiale_id" => 1,
        "acronimo" => "TE",
        "formula_largo" => "A",
        "formula_ancho" => "P",
        "formula_canto" => "A",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 3,
        "tipo_pieza" => "Lateral",
        "materiale_id" => 1,
        "acronimo" => "LA",
        "formula_largo" => "H",
        "formula_ancho" => "P",
        "formula_canto" => "H",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 4,
        "tipo_pieza" => "Lateral Derecho",
        "materiale_id" => 1,
        "acronimo" => "LD",
        "formula_largo" => "H",
        "formula_ancho" => "P",
        "formula_canto" => "H",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 5,
        "tipo_pieza" => "Lateral Izquierdo",
        "materiale_id" => 1,
        "acronimo" => "LI",
        "formula_largo" => "H",
        "formula_ancho" => "P",
        "formula_canto" => "H",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 6,
        "tipo_pieza" => "Repisa Movil",
        "materiale_id" => 1,
        "acronimo" => "RM",
        "formula_largo" => "A",
        "formula_ancho" => "P",
        "formula_canto" => "A+2*P",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 7,
        "tipo_pieza" => "Repisa Fija",
        "materiale_id" => 1,
        "acronimo" => "RF",
        "formula_largo" => "A",
        "formula_ancho" => "P",
        "formula_canto" => "A",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 8,
        "tipo_pieza" => "Division Vertical",
        "materiale_id" => 1,
        "acronimo" => "DI",
        "formula_largo" => "H",
        "formula_ancho" => "P",
        "formula_canto" => "H",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 9,
        "tipo_pieza" => "Piso Externo",
        "materiale_id" => 1,
        "acronimo" => "PX",
        "formula_largo" => "A",
        "formula_ancho" => "P",
        "formula_canto" => "A+2*P",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 10,
        "tipo_pieza" => "Techo Externo",
        "materiale_id" => 1,
        "acronimo" => "TX",
        "formula_largo" => "A",
        "formula_ancho" => "P",
        "formula_canto" => "A+2*P",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 11,
        "tipo_pieza" => "Refuerzo",
        "materiale_id" => 2,
        "acronimo" => "RE",
        "formula_largo" => "A",
        "formula_ancho" => "128",
        "formula_canto" => "2*A",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 12,
        "tipo_pieza" => "Frente Falso",
        "materiale_id" => 2,
        "acronimo" => "FR",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 13,
        "tipo_pieza" => "Puerta",
        "materiale_id" => 2,
        "acronimo" => "PT",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 14,
        "tipo_pieza" => "Puerta Doble",
        "materiale_id" => 2,
        "acronimo" => "PD",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => "2*A+4*H",
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 15,
        "tipo_pieza" => "Panel ",
        "materiale_id" => 2,
        "acronimo" => "PN",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 16,
        "tipo_pieza" => "Panel Sin Canto",
        "materiale_id" => 2,
        "acronimo" => "PS",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => NULL,
        "canto_largo1" => NULL,
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 17,
        "tipo_pieza" => "Jamba",
        "materiale_id" => 2,
        "acronimo" => "JB",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => "A+H",
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 18,
        "tipo_pieza" => "Base Jamba",
        "materiale_id" => 1,
        "acronimo" => "BJ",
        "formula_largo" => "H",
        "formula_ancho" => "140",
        "formula_canto" => NULL,
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 19,
        "tipo_pieza" => "Piso Jamba",
        "materiale_id" => 1,
        "acronimo" => "PJ",
        "formula_largo" => "P",
        "formula_ancho" => "A",
        "formula_canto" => NULL,
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 20,
        "tipo_pieza" => "Gaveta 96",
        "materiale_id" => 7,
        "acronimo" => "GP",
        "formula_largo" => NULL,
        "formula_ancho" => NULL,
        "formula_canto" => NULL,
        "canto_largo1" => NULL,
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 21,
        "tipo_pieza" => "Gaveta 256",
        "materiale_id" => 7,
        "acronimo" => "GG",
        "formula_largo" => NULL,
        "formula_ancho" => NULL,
        "formula_canto" => NULL,
        "canto_largo1" => NULL,
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 22,
        "tipo_pieza" => "Frente Gaveta",
        "materiale_id" => 2,
        "acronimo" => "FG",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 23,
        "tipo_pieza" => "Gaveta Frente Interno",
        "materiale_id" => 4,
        "acronimo" => "GF",
        "formula_largo" => "A",
        "formula_ancho" => "160",
        "formula_canto" => "A",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 24,
        "tipo_pieza" => "Gaveta Lateral ",
        "materiale_id" => 4,
        "acronimo" => "GL",
        "formula_largo" => "P",
        "formula_ancho" => "160",
        "formula_canto" => "P",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 25,
        "tipo_pieza" => "Gaveta Trasera",
        "materiale_id" => 4,
        "acronimo" => "GT",
        "formula_largo" => "A",
        "formula_ancho" => "160",
        "formula_canto" => "A",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 26,
        "tipo_pieza" => "Gaveta Piso",
        "materiale_id" => 4,
        "acronimo" => "GI",
        "formula_largo" => "A",
        "formula_ancho" => "P",
        "formula_canto" => NULL,
        "canto_largo1" => NULL,
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 27,
        "tipo_pieza" => "Zocalo Trasero",
        "materiale_id" => 2,
        "acronimo" => "ZT",
        "formula_largo" => "A",
        "formula_ancho" => "H",
        "formula_canto" => "A",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 28,
        "tipo_pieza" => "Zocalo Frente",
        "materiale_id" => 2,
        "acronimo" => "ZF",
        "formula_largo" => "A",
        "formula_ancho" => "H",
        "formula_canto" => "A+2*H",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 29,
        "tipo_pieza" => "Zocalo Lateral",
        "materiale_id" => 2,
        "acronimo" => "ZL",
        "formula_largo" => "P",
        "formula_ancho" => "H",
        "formula_canto" => "A",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 30,
        "tipo_pieza" => "Cenefa",
        "materiale_id" => 2,
        "acronimo" => "CN",
        "formula_largo" => "A",
        "formula_ancho" => "H",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "X",
        "canto_largo2" => "X",
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 31,
        "tipo_pieza" => "Base Cenefa",
        "materiale_id" => 1,
        "acronimo" => "BC",
        "formula_largo" => "A",
        "formula_ancho" => "140",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "X",
        "canto_largo2" => "X",
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 32,
        "tipo_pieza" => "Lateral Aereo Derecho",
        "materiale_id" => 1,
        "acronimo" => "LE",
        "formula_largo" => "H",
        "formula_ancho" => "P",
        "formula_canto" => "H+P",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => "X",
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 33,
        "tipo_pieza" => "Lateral Aereo Izquierdo",
        "materiale_id" => 1,
        "acronimo" => "LZ",
        "formula_largo" => "H",
        "formula_ancho" => "P",
        "formula_canto" => "H+P",
        "canto_largo1" => "X",
        "canto_largo2" => NULL,
        "canto_ancho1" => "X",
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 34,
        "tipo_pieza" => "Sobre",
        "materiale_id" => 6,
        "acronimo" => "SO",
        "formula_largo" => "A",
        "formula_ancho" => "P",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "X",
        "canto_largo2" => "X",
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 35,
        "tipo_pieza" => "Refuerzo Colgador",
        "materiale_id" => 1,
        "acronimo" => "RC",
        "formula_largo" => "A",
        "formula_ancho" => "128",
        "formula_canto" => NULL,
        "canto_largo1" => NULL,
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 36,
        "tipo_pieza" => "Fondo",
        "materiale_id" => 3,
        "acronimo" => "FO",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => NULL,
        "canto_largo1" => NULL,
        "canto_largo2" => NULL,
        "canto_ancho1" => NULL,
        "canto_ancho2" => NULL,
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 37,
        "tipo_pieza" => "Lama",
        "materiale_id" => 1,
        "acronimo" => "LM",
        "formula_largo" => "H",
        "formula_ancho" => "A",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "Y",
        "canto_largo2" => "Y",
        "canto_ancho1" => "Y",
        "canto_ancho2" => "Y",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 38,
        "tipo_pieza" => "Soporte Vertical",
        "materiale_id" => 1,
        "acronimo" => "SV",
        "formula_largo" => "H",
        "formula_ancho" => "P",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "X",
        "canto_largo2" => "X",
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ],
      [
        "id" => 39,
        "tipo_pieza" => "Soporte Horizontal",
        "materiale_id" => 1,
        "acronimo" => "SH",
        "formula_largo" => "A",
        "formula_ancho" => "4",
        "formula_canto" => "2*A+2*H",
        "canto_largo1" => "X",
        "canto_largo2" => "X",
        "canto_ancho1" => "X",
        "canto_ancho2" => "X",
        "costo" => NULL,
        "created_by" => 2,
        "updated_by" => NULL,
        "approved_by" => NULL,
        "approved_on" => NULL,
        "created_at" => NULL,
        "updated_at" => NULL,
        "deleted_at" => NULL,
      ]
    ]);
}
}
