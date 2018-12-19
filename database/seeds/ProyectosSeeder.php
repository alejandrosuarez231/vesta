<?php

use Illuminate\Database\Seeder;
use App\Proyecto;

class ProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $proyectos = collect([
        ['id' => 1, 'sku' => 'CB0101', 'codigo' => 'CB010101', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 1, 'sap' => 1, 'sar' => 6, 'descripcion' => 'Jamba Gola Tornillo', 'importado' => 0],
        ['id' => 2, 'sku' => 'CB0201', 'codigo' => 'CB020102', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 1, 'sap' => 2, 'sar' => 6, 'descripcion' => 'Jamba Tirador Tornillo', 'importado' => 0],
        ['id' => 3, 'sku' => 'CB0301', 'codigo' => 'CB030103', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 1, 'sap' => 3, 'sar' => 6, 'descripcion' => 'Jamba Tip On Tornillo', 'importado' => 0],
        ['id' => 4, 'sku' => 'CB0401', 'codigo' => 'CB040104', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 1, 'sap' => 4, 'sar' => 6, 'descripcion' => 'Jamba Riel Tornillo', 'importado' => 0],
        ['id' => 5, 'sku' => 'CB0102', 'codigo' => 'CB010205', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 3, 'sap' => 1, 'sar' => 6, 'descripcion' => 'Panel Cierre A Piso Con Zocalo de 15cm Gola Tornillo', 'importado' => 0],
        ['id' => 6, 'sku' => 'CB0202', 'codigo' => 'CB020206', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 3, 'sap' => 2, 'sar' => 6, 'descripcion' => 'Panel Cierre A Piso Con Zocalo de 15cm Tirador Tornillo', 'importado' => 0],
        ['id' => 7, 'sku' => 'CB0302', 'codigo' => 'CB030207', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 3, 'sap' => 3, 'sar' => 6, 'descripcion' => 'Panel Cierre A Piso Con Zocalo de 15cm Tip On Tornillo', 'importado' => 0],
        ['id' => 8, 'sku' => 'CB0402', 'codigo' => 'CB040208', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 3, 'sap' => 4, 'sar' => 6, 'descripcion' => 'Panel Cierre A Piso Con Zocalo de 15cm Riel Tornillo', 'importado' => 0],
        ['id' => 9, 'sku' => 'CB0103', 'codigo' => 'CB010309', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 2, 'sap' => 1, 'sar' => 6, 'descripcion' => 'Panel Cierre A Borde de Modulo  Gola Tornillo', 'importado' => 0],
        ['id' => 10, 'sku' => 'CB0203', 'codigo' => 'CB020310', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 2, 'sap' => 2, 'sar' => 6, 'descripcion' => 'Panel Cierre A Borde de Modulo  Tirador Tornillo', 'importado' => 0],
        ['id' => 11, 'sku' => 'CB0303', 'codigo' => 'CB030311', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 2, 'sap' => 3, 'sar' => 6, 'descripcion' => 'Panel Cierre A Borde de Modulo  Tip On Tornillo', 'importado' => 0],
        ['id' => 12, 'sku' => 'CB0304', 'codigo' => 'CB030412', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 2, 'sap' => 4, 'sar' => 6, 'descripcion' => 'Panel Cierre A Borde de Modulo  Riel Tornillo', 'importado' => 0],
        ['id' => 13, 'sku' => 'CB0401', 'codigo' => 'CB040113', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 5, 'sap' => 1, 'sar' => 6, 'descripcion' => 'Modulo Abierto Gola Tornillo', 'importado' => 0],
        ['id' => 14, 'sku' => 'CB0402', 'codigo' => 'CB040214', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 5, 'sap' => 2, 'sar' => 6, 'descripcion' => 'Modulo Abierto Tirador Tornillo', 'importado' => 0],
        ['id' => 15, 'sku' => 'CB0403', 'codigo' => 'CB040315', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 5, 'sap' => 3, 'sar' => 6, 'descripcion' => 'Modulo Abierto Tip On Tornillo', 'importado' => 0],
        ['id' => 16, 'sku' => 'CB0404', 'codigo' => 'CB040416', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 5, 'sap' => 4, 'sar' => 6, 'descripcion' => 'Modulo Abierto Riel Tornillo', 'importado' => 0],
        ['id' => 17, 'sku' => 'CB0105', 'codigo' => 'CB010517', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 6, 'sap' => 1, 'sar' => 6, 'descripcion' => 'Abierto 1 Division y 4 Repisas Gola Tornillo', 'importado' => 0],
        ['id' => 18, 'sku' => 'CB0205', 'codigo' => 'CB020518', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 6, 'sap' => 2, 'sar' => 6, 'descripcion' => 'Abierto 1 Division y 4 Repisas Tirador Tornillo', 'importado' => 0],
        ['id' => 19, 'sku' => 'CB0305', 'codigo' => 'CB030519', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 6, 'sap' => 3, 'sar' => 6, 'descripcion' => 'Abierto 1 Division y 4 Repisas Tip On Tornillo', 'importado' => 0],
        ['id' => 20, 'sku' => 'CB0405', 'codigo' => 'CB040520', 'tipo_id' => 14, 'subtipo_id' => 43, 'nombre' => 6, 'sap' => 4, 'sar' => 6, 'descripcion' => 'Abierto 1 Division y 4 Repisas Riel Tornillo', 'importado' => 0]
      ]);
foreach ($proyectos as $value) {
  Proyecto::create($value);
}
}
}
