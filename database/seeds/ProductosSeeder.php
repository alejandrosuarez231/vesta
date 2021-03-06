<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Producto;

class ProductosSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
       $data = collect(
        [
            [
                "id" => "1",
                "sku" => "BIES-GO-000001",
                "tipo_id" => "1",
                "subtipo_id" => "1",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => "",
                "marca_id" => "6",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "2",
                "sku" => "BICU-GO-000001",
                "tipo_id" => "1",
                "subtipo_id" => "2",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "6",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "3",
                "sku" => "BIRE-GO-000001",
                "tipo_id" => "1",
                "subtipo_id" => "3",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "6",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "4",
                "sku" => "BISC-GO-000001",
                "tipo_id" => "1",
                "subtipo_id" => "4",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "6",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "5",
                "sku" => "BIES-GO-000002",
                "tipo_id" => "1",
                "subtipo_id" => "1",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "6",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "6",
                "sku" => "BICU-GO-000002",
                "tipo_id" => "1",
                "subtipo_id" => "2",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "6",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "7",
                "sku" => "BIRE-GO-000002",
                "tipo_id" => "1",
                "subtipo_id" => "3",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "6",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "8",
                "sku" => "BISC-GO-000002",
                "tipo_id" => "1",
                "subtipo_id" => "4",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "6",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "9",
                "sku" => "BIES-DU-000001",
                "tipo_id" => "1",
                "subtipo_id" => "1",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "10",
                "sku" => "BICU-DU-000001",
                "tipo_id" => "1",
                "subtipo_id" => "2",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "11",
                "sku" => "BIRE-DU-000001",
                "tipo_id" => "1",
                "subtipo_id" => "3",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "12",
                "sku" => "BISC-DU-000001",
                "tipo_id" => "1",
                "subtipo_id" => "4",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "13",
                "sku" => "BIES-DU-000002",
                "tipo_id" => "1",
                "subtipo_id" => "1",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "14",
                "sku" => "BICU-DU-000002",
                "tipo_id" => "1",
                "subtipo_id" => "2",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "15",
                "sku" => "BIRE-DU-000002",
                "tipo_id" => "1",
                "subtipo_id" => "3",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "16",
                "sku" => "BISC-DU-000002",
                "tipo_id" => "1",
                "subtipo_id" => "4",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "17",
                "sku" => "BIES-BL-000001",
                "tipo_id" => "1",
                "subtipo_id" => "1",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "1",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "18",
                "sku" => "BICU-BL-000001",
                "tipo_id" => "1",
                "subtipo_id" => "2",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "1",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "19",
                "sku" => "BIRE-BL-000001",
                "tipo_id" => "1",
                "subtipo_id" => "3",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "1",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "20",
                "sku" => "BISC-BL-000001",
                "tipo_id" => "1",
                "subtipo_id" => "4",
                "nombre" => "Bisagras Con Freno",
                "descripcion" => null,
                "marca_id" => "1",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "1",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "21",
                "sku" => "BIES-BL-000002",
                "tipo_id" => "1",
                "subtipo_id" => "1",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "1",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "22",
                "sku" => "BICU-BL-000002",
                "tipo_id" => "1",
                "subtipo_id" => "2",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "1",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "23",
                "sku" => "BIRE-BL-000002",
                "tipo_id" => "1",
                "subtipo_id" => "3",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "1",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "24",
                "sku" => "BISC-BL-000002",
                "tipo_id" => "1",
                "subtipo_id" => "4",
                "nombre" => "Bisagras Sin Freno",
                "descripcion" => null,
                "marca_id" => "1",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "2",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "50",
                "maximo" => "300"
            ],
            [
                "id" => "25",
                "sku" => "CACD-MA-000001",
                "tipo_id" => "2",
                "subtipo_id" => "5",
                "nombre" => "0.45 mm",
                "descripcion" => null,
                "marca_id" => "12",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "26",
                "sku" => "CACM-MA-000001",
                "tipo_id" => "2",
                "subtipo_id" => "6",
                "nombre" => "1 mm",
                "descripcion" => null,
                "marca_id" => "12",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "27",
                "sku" => "CACG-MA-000001",
                "tipo_id" => "2",
                "subtipo_id" => "7",
                "nombre" => "2mm",
                "descripcion" => null,
                "marca_id" => "12",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "28",
                "sku" => "CACD-RE-000001",
                "tipo_id" => "2",
                "subtipo_id" => "5",
                "nombre" => "0.45 mm",
                "descripcion" => null,
                "marca_id" => "9",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "29",
                "sku" => "CACM-RE-000001",
                "tipo_id" => "2",
                "subtipo_id" => "6",
                "nombre" => "1 mm",
                "descripcion" => null,
                "marca_id" => "9",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "30",
                "sku" => "CACG-RE-000001",
                "tipo_id" => "2",
                "subtipo_id" => "7",
                "nombre" => "2mm",
                "descripcion" => null,
                "marca_id" => "9",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "31",
                "sku" => "CACD-RK-000001",
                "tipo_id" => "2",
                "subtipo_id" => "5",
                "nombre" => "0.45 mm",
                "descripcion" => null,
                "marca_id" => "13",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "32",
                "sku" => "CACM-RK-000001",
                "tipo_id" => "2",
                "subtipo_id" => "6",
                "nombre" => "1 mm",
                "descripcion" => null,
                "marca_id" => "13",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "33",
                "sku" => "CACG-RK-000001",
                "tipo_id" => "2",
                "subtipo_id" => "7",
                "nombre" => "2mm",
                "descripcion" => null,
                "marca_id" => "13",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "34",
                "sku" => "CACD-SM-000001",
                "tipo_id" => "2",
                "subtipo_id" => "5",
                "nombre" => "0.45 mm",
                "descripcion" => null,
                "marca_id" => "17",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "35",
                "sku" => "CACM-SM-000001",
                "tipo_id" => "2",
                "subtipo_id" => "6",
                "nombre" => "1 mm",
                "descripcion" => null,
                "marca_id" => "17",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "36",
                "sku" => "CACG-SM-000001",
                "tipo_id" => "2",
                "subtipo_id" => "7",
                "nombre" => "2mm",
                "descripcion" => null,
                "marca_id" => "17",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "500",
                "maximo" => "2000"
            ],
            [
                "id" => "37",
                "sku" => "TAHR-IC-000001",
                "tipo_id" => "4",
                "subtipo_id" => "12",
                "nombre" => "Aglomerado HR",
                "descripcion" => null,
                "marca_id" => "15",
                "unidad_id" => "4",
                "ancho" => "2100",
                "largo" => "2400",
                "espesor" => "15",
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "1",
                "importado" => "0",
                "minimo" => "200",
                "maximo" => "1600"
            ],
            [
                "id" => "38",
                "sku" => "TAST-IC-000001",
                "tipo_id" => "4",
                "subtipo_id" => "13",
                "nombre" => "Aglomerado",
                "descripcion" => null,
                "marca_id" => "15",
                "unidad_id" => "4",
                "ancho" => "2100",
                "largo" => "2400",
                "espesor" => "15",
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "1",
                "importado" => "0",
                "minimo" => "200",
                "maximo" => "1600"
            ],
            [
                "id" => "39",
                "sku" => "TAMD-IC-000001",
                "tipo_id" => "4",
                "subtipo_id" => "14",
                "nombre" => "MDF",
                "descripcion" => null,
                "marca_id" => "15",
                "unidad_id" => "4",
                "ancho" => "2100",
                "largo" => "2400",
                "espesor" => "15",
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "1",
                "importado" => "0",
                "minimo" => "200",
                "maximo" => "1600"
            ],
            [
                "id" => "40",
                "sku" => "CTCT-HA-000001",
                "tipo_id" => "5",
                "subtipo_id" => "19",
                "nombre" => "Tarugo 8*30",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => NULL,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "41",
                "sku" => "CTCT-HA-000002",
                "tipo_id" => "5",
                "subtipo_id" => "19",
                "nombre" => "Tarugo 8*35",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => NULL,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "42",
                "sku" => "CTCT-HA-000003",
                "tipo_id" => "5",
                "subtipo_id" => "19",
                "nombre" => "Tarugo 8*40",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => NULL,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "43",
                "sku" => "CTCT-HA-000004",
                "tipo_id" => "5",
                "subtipo_id" => "20",
                "nombre" => "Perno Rafix",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "44",
                "sku" => "CTCT-HA-000005",
                "tipo_id" => "5",
                "subtipo_id" => "20",
                "nombre" => "Camara Rafix",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "45",
                "sku" => "CTTA-HA-000001",
                "tipo_id" => "5",
                "subtipo_id" => "21",
                "nombre" => "Tapa mini fix",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "1",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "46",
                "sku" => "CTTA-HA-000002",
                "tipo_id" => "5",
                "subtipo_id" => "21",
                "nombre" => "Tapa mini fix",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "20",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "47",
                "sku" => "CTTA-HA-000003",
                "tipo_id" => "5",
                "subtipo_id" => "21",
                "nombre" => "Tapa mini fix",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "21",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "48",
                "sku" => "CTTA-HA-000004",
                "tipo_id" => "5",
                "subtipo_id" => "21",
                "nombre" => "Tapa mini fix",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "15",
                "importado" => "0",
                "minimo" => "1000",
                "maximo" => "10000"
            ],
            [
                "id" => "49",
                "sku" => "ACAC-DU-000001",
                "tipo_id" => "6",
                "subtipo_id" => "22",
                "nombre" => "Brazo Hidraulico 80N",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "20",
                "maximo" => "50"
            ],
            [
                "id" => "50",
                "sku" => "ACAC-DU-000002",
                "tipo_id" => "6",
                "subtipo_id" => "22",
                "nombre" => "Brazo Hidraulico 100N",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "20",
                "maximo" => "50"
            ],
            [
                "id" => "51",
                "sku" => "ACAC-DU-000003",
                "tipo_id" => "6",
                "subtipo_id" => "22",
                "nombre" => "Brazo Hidraulico 120N",
                "descripcion" => null,
                "marca_id" => "2",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "20",
                "maximo" => "50"
            ],
            [
                "id" => "52",
                "sku" => "ACBM-HA-000001",
                "tipo_id" => "6",
                "subtipo_id" => "57",
                "nombre" => "Brazo Mecanico",
                "descripcion" => null,
                "marca_id" => "7",
                "unidad_id" => "4",
                "ancho" => null,
                "largo" => null,
                "espesor" => null,
                "propiedad_id" => null,
                "extra_id" => "0",
                "color_id" => "0",
                "importado" => "0",
                "minimo" => "10",
                "maximo" => "20"
            ]
        ]);

foreach ($data as $obj) {
    $producto = new Producto;
    $producto->sku = $obj['sku'];
    $producto->tipo_id = $obj['tipo_id'];
    $producto->subtipo_id = $obj['subtipo_id'];
    $producto->nombre = $obj['nombre'];
    $producto->descripcion = $obj['descripcion'];
    $producto->marca_id = $obj['marca_id'];
    $producto->unidad_id = $obj['unidad_id'];
    $producto->ancho = $obj['ancho'];
    $producto->largo = $obj['largo'];
    $producto->espesor = $obj['espesor'];
    $producto->propiedad_id = $obj['propiedad_id'];
    $producto->extra_id = $obj['extra_id'];
    $producto->color_id = $obj['color_id'];
    $producto->importado = $obj['importado'];
    $producto->minimo = $obj['minimo'];
    $producto->maximo = $obj['maximo'];
    $producto->save();
}

}
}
