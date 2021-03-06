<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categorias')->insert([
        ['subtipo_id' => 10, 'nombre' => 'Mini Fix 15', 'acronimo' => '1FX'],
        ['subtipo_id' => 10, 'nombre' => 'Mini Fix 25', 'acronimo' => '2FX'],
        ['subtipo_id' => 10, 'nombre' => 'Pines 5mm', 'acronimo' => 'TAR'],
        ['subtipo_id' => 10, 'nombre' => 'RaFix', 'acronimo' => 'RFX'],
        ['subtipo_id' => 10, 'nombre' => 'Tapa Mini Fix', 'acronimo' => 'TFX'],
        ['subtipo_id' => 10, 'nombre' => 'Tarugos Madera', 'acronimo' => 'TAR'],
        ['subtipo_id' => 10, 'nombre' => 'Tornillo 6x1"', 'acronimo' => 'TO1'],
        ['subtipo_id' => 10, 'nombre' => 'Tornillo 6x1-1/8"', 'acronimo' => 'TO9'],
        ['subtipo_id' => 10, 'nombre' => 'Tornillo 6x2"', 'acronimo' => 'TO2'],
        ['subtipo_id' => 10, 'nombre' => 'Tornillo 6x5/8"', 'acronimo' => 'TO5'],
        ['subtipo_id' => 7, 'nombre' => 'Cemento de Contacto', 'acronimo' => 'CEM'],
        ['subtipo_id' => 7, 'nombre' => 'Cola Blanca', 'acronimo' => 'COL'],
        ['subtipo_id' => 4, 'nombre' => 'Aguarras', 'acronimo' => 'AGU'],
        ['subtipo_id' => 4, 'nombre' => 'Celulon', 'acronimo' => 'CEL'],
        ['subtipo_id' => 4, 'nombre' => 'High Tack', 'acronimo' => 'HIG'],
        ['subtipo_id' => 4, 'nombre' => 'Polvos', 'acronimo' => 'POL'],
        ['subtipo_id' => 4, 'nombre' => 'Silicone ', 'acronimo' => 'SIL'],
        ['subtipo_id' => 4, 'nombre' => 'Thinner', 'acronimo' => 'THI'],
        ['subtipo_id' => 14, 'nombre' => 'Tape Azul', 'acronimo' => 'TAA'],
        ['subtipo_id' => 14, 'nombre' => 'Tape Blanco', 'acronimo' => 'TAB'],
        ['subtipo_id' => 5, 'nombre' => 'Brazo Aventos HF', 'acronimo' => 'HAA'],
        ['subtipo_id' => 5, 'nombre' => 'Brazo Hafele DUO', 'acronimo' => 'HAD'],
        ['subtipo_id' => 3, 'nombre' => 'Bisagras Aventos HF', 'acronimo' => 'HAB'],
        ['subtipo_id' => 3, 'nombre' => 'Bisagras Curvas', 'acronimo' => 'CUR'],
        ['subtipo_id' => 3, 'nombre' => 'Bisagras Rectas', 'acronimo' => 'REC'],
        ['subtipo_id' => 3, 'nombre' => 'Bisagras Semicurvas', 'acronimo' => 'SCU'],
        ['subtipo_id' => 8, 'nombre' => 'Correderas Full Extension', 'acronimo' => 'FEX'],
        ['subtipo_id' => 8, 'nombre' => 'Correderas Sencillas', 'acronimo' => 'SEN'],
        ['subtipo_id' => 8, 'nombre' => 'Correderas Undermount', 'acronimo' => 'UND'],
        ['subtipo_id' => 8, 'nombre' => 'Correderas Undermount & TipOn', 'acronimo' => 'UTI'],
        ['subtipo_id' => 11, 'nombre' => 'Base Patas', 'acronimo' => 'BPA'],
        ['subtipo_id' => 11, 'nombre' => 'Patas 100mm', 'acronimo' => 'P10'],
        ['subtipo_id' => 11, 'nombre' => 'Patas 150mm', 'acronimo' => 'P15'],
        ['subtipo_id' => 2, 'nombre' => 'Clip Zocalo', 'acronimo' => 'ZOP'],
        ['subtipo_id' => 2, 'nombre' => 'Perfil Gola', 'acronimo' => 'GOL'],
        ['subtipo_id' => 2, 'nombre' => 'Perfil Gola Clip', 'acronimo' => 'GOP'],
        ['subtipo_id' => 2, 'nombre' => 'Perfil Gola Tipo "C"', 'acronimo' => 'GOC'],
        ['subtipo_id' => 2, 'nombre' => 'Perfil Gola Tipo "L"', 'acronimo' => 'GOL'],
        ['subtipo_id' => 2, 'nombre' => 'Soporte Lateral Tubo Guindador', 'acronimo' => 'TUB'],
        ['subtipo_id' => 2, 'nombre' => 'Tubo Guindador', 'acronimo' => 'TUB'],
        ['subtipo_id' => 2, 'nombre' => 'Zocalo PVC', 'acronimo' => 'ZOC'],
        ['subtipo_id' => 1, 'nombre' => 'Rieles', 'acronimo' => 'RIE'],
        ['subtipo_id' => 1, 'nombre' => 'TipOn', 'acronimo' => 'TIP'],
        ['subtipo_id' => 1, 'nombre' => 'Tirador', 'acronimo' => 'TIR'],
        ['subtipo_id' => 9, 'nombre' => 'Hielo Seco', 'acronimo' => 'HIE'],
        ['subtipo_id' => 9, 'nombre' => 'Stretch Film', 'acronimo' => 'STR'],
        ['subtipo_id' => 6, 'nombre' => 'Canto Delgado', 'acronimo' => 'DEL'],
        ['subtipo_id' => 6, 'nombre' => 'Canto Grueso', 'acronimo' => 'GRU'],
        ['subtipo_id' => 6, 'nombre' => 'Canto Medio', 'acronimo' => 'MED'],
        ['subtipo_id' => 12, 'nombre' => 'Pinotea', 'acronimo' => 'PIN'],
        ['subtipo_id' => 13, 'nombre' => 'Aglomerado Hidrofugo', 'acronimo' => 'AHR'],
        ['subtipo_id' => 15, 'nombre' => 'Abierto', 'acronimo' => 'AB'],
        ['subtipo_id' => 15, 'nombre' => 'Gavetas', 'acronimo' => 'GV'],
        ['subtipo_id' => 15, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 15, 'nombre' => 'Puerta', 'acronimo' => 'PT'],
        ['subtipo_id' => 16, 'nombre' => 'Abierto', 'acronimo' => 'AB'],
        ['subtipo_id' => 16, 'nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['subtipo_id' => 16, 'nombre' => 'Especiales', 'acronimo' => 'ES'],
        ['subtipo_id' => 16, 'nombre' => 'Esquina', 'acronimo' => 'EQ'],
        ['subtipo_id' => 16, 'nombre' => 'Nevera', 'acronimo' => 'NV'],
        ['subtipo_id' => 16, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 16, 'nombre' => 'Puerta', 'acronimo' => 'PT'],
        ['subtipo_id' => 16, 'nombre' => 'Vinera', 'acronimo' => 'VI'],
        ['subtipo_id' => 19, 'nombre' => 'Gaveta 96', 'acronimo' => 'GP'],
        ['subtipo_id' => 19, 'nombre' => 'Gaveta 256', 'acronimo' => 'GG'],
        ['subtipo_id' => 17, 'nombre' => 'Abierto', 'acronimo' => 'AB'],
        ['subtipo_id' => 17, 'nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['subtipo_id' => 17, 'nombre' => 'Especiales', 'acronimo' => 'ES'],
        ['subtipo_id' => 17, 'nombre' => 'Fregador', 'acronimo' => 'FR'],
        ['subtipo_id' => 17, 'nombre' => 'Gavetas', 'acronimo' => 'GV'],
        ['subtipo_id' => 17, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 17, 'nombre' => 'Puerta', 'acronimo' => 'PT'],
        ['subtipo_id' => 17, 'nombre' => 'Vinera', 'acronimo' => 'VI'],
        ['subtipo_id' => 20, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 18, 'nombre' => 'Abierto', 'acronimo' => 'AB'],
        ['subtipo_id' => 18, 'nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['subtipo_id' => 18, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 18, 'nombre' => 'Puerta', 'acronimo' => 'PT'],
        ['subtipo_id' => 18, 'nombre' => 'Superiores', 'acronimo' => 'SP'],
        ['subtipo_id' => 13, 'nombre' => 'Plywood', 'acronimo' => 'PLY'],
        ['subtipo_id' => 21, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 22, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 23, 'nombre' => 'Grande', 'acronimo' => 'GD'],
        ['subtipo_id' => 23, 'nombre' => 'Mediano', 'acronimo' => 'MD'],
        ['subtipo_id' => 23, 'nombre' => 'Pequeño', 'acronimo' => 'PQ'],
        ['subtipo_id' => 24, 'nombre' => 'Mediano', 'acronimo' => 'MD'],
        ['subtipo_id' => 24, 'nombre' => 'Pequeño', 'acronimo' => 'PQ'],
        ['subtipo_id' => 25, 'nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['subtipo_id' => 25, 'nombre' => 'Gavetas', 'acronimo' => 'GV'],
        ['subtipo_id' => 25, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 25, 'nombre' => 'Puerta', 'acronimo' => 'PT'],
        ['subtipo_id' => 26, 'nombre' => 'Piso', 'acronimo' => 'PI'],
        ['subtipo_id' => 26, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 29, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 27, 'nombre' => 'Gavetas', 'acronimo' => 'GV'],
        ['subtipo_id' => 27, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 28, 'nombre' => 'Copete', 'acronimo' => 'CP'],
        ['subtipo_id' => 28, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 32, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 33, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 30, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 34, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 31, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 35, 'nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['subtipo_id' => 37, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 36 , 'nombre' => 'Horizontal', 'acronimo' => 'HR'],
        ['subtipo_id' => 36 , 'nombre' => 'Vertical', 'acronimo' => 'VT'],
        ['subtipo_id' => 38, 'nombre' => 'Abierto', 'acronimo' => 'AB'],
        ['subtipo_id' => 38, 'nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['subtipo_id' => 38, 'nombre' => 'Gavetas', 'acronimo' => 'GV'],
        ['subtipo_id' => 38, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 38, 'nombre' => 'Puerta', 'acronimo' => 'PT'],
        ['subtipo_id' => 38, 'nombre' => 'Tubo', 'acronimo' => 'TB'],
        ['subtipo_id' => 39, 'nombre' => 'Abierto', 'acronimo' => 'AB'],
        ['subtipo_id' => 39, 'nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['subtipo_id' => 39, 'nombre' => 'Gavetas', 'acronimo' => 'GV'],
        ['subtipo_id' => 39, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 39, 'nombre' => 'Tubo', 'acronimo' => 'TB'],
        ['subtipo_id' => 40, 'nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['subtipo_id' => 30, 'nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['subtipo_id' => 15, 'nombre' => 'Complementos', 'acronimo' => 'CM']
    ]);
}
}
