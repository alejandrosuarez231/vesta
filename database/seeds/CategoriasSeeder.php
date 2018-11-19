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
        ['nombre' => 'Mini Fix 15', 'acronimo' => '1FX'],
        ['nombre' => 'Mini Fix 25', 'acronimo' => '2FX'],
        ['nombre' => 'Pines 5mm', 'acronimo' => 'TAR'],
        ['nombre' => 'RaFix', 'acronimo' => 'RFX'],
        ['nombre' => 'Tapa Mini Fix', 'acronimo' => 'TFX'],
        ['nombre' => 'Tarugos Madera', 'acronimo' => 'TAR'],
        ['nombre' => 'Tornillo 6x1"', 'acronimo' => 'TO1'],
        ['nombre' => 'Tornillo 6x1-1/8"', 'acronimo' => 'TO9'],
        ['nombre' => 'Tornillo 6x2"', 'acronimo' => 'TO2'],
        ['nombre' => 'Tornillo 6x5/8"', 'acronimo' => 'TO5'],
        ['nombre' => 'Cemento de Contacto', 'acronimo' => 'CEM'],
        ['nombre' => 'Cola Blanca', 'acronimo' => 'COL'],
        ['nombre' => 'Aguarras', 'acronimo' => 'AGU'],
        ['nombre' => 'Celulon', 'acronimo' => 'CEL'],
        ['nombre' => 'High Tack', 'acronimo' => 'HIG'],
        ['nombre' => 'Polvos', 'acronimo' => 'POL'],
        ['nombre' => 'Silicone ', 'acronimo' => 'SIL'],
        ['nombre' => 'Thinner', 'acronimo' => 'THI'],
        ['nombre' => 'Tape Azul', 'acronimo' => 'TAA'],
        ['nombre' => 'Tape Blanco', 'acronimo' => 'TAB'],
        ['nombre' => 'Brazo Aventos HF', 'acronimo' => 'HAA'],
        ['nombre' => 'Brazo Hafele DUO', 'acronimo' => 'HAD'],
        ['nombre' => 'Bisagras Aventos HF', 'acronimo' => 'HAB'],
        ['nombre' => 'Bisagras Curvas', 'acronimo' => 'CUR'],
        ['nombre' => 'Bisagras Rectas', 'acronimo' => 'REC'],
        ['nombre' => 'Bisagras Semicurvas', 'acronimo' => 'SCU'],
        ['nombre' => 'Correderas Full Extension', 'acronimo' => 'FEX'],
        ['nombre' => 'Correderas Sencillas', 'acronimo' => 'SEN'],
        ['nombre' => 'Correderas Undermount', 'acronimo' => 'UND'],
        ['nombre' => 'Correderas Undermount & TipOn', 'acronimo' => 'UTI'],
        ['nombre' => 'Base Patas', 'acronimo' => 'BPA'],
        ['nombre' => 'Patas 100mm', 'acronimo' => 'P10'],
        ['nombre' => 'Patas 150mm', 'acronimo' => 'P15'],
        ['nombre' => 'Clip Zocalo', 'acronimo' => 'ZOP'],
        ['nombre' => 'Perfil Gola', 'acronimo' => 'GOL'],
        ['nombre' => 'Perfil Gola Clip', 'acronimo' => 'GOP'],
        ['nombre' => 'Perfil Gola Tipo "C"', 'acronimo' => 'GOC'],
        ['nombre' => 'Perfil Gola Tipo "L"', 'acronimo' => 'GOL'],
        ['nombre' => 'Soporte Lateral Tubo Guindador', 'acronimo' => 'TUB'],
        ['nombre' => 'Tubo Guindador', 'acronimo' => 'TUB'],
        ['nombre' => 'Zocalo PVC', 'acronimo' => 'ZOC'],
        ['nombre' => 'Rieles', 'acronimo' => 'RIE'],
        ['nombre' => 'TipOn', 'acronimo' => 'TIP'],
        ['nombre' => 'Tirador', 'acronimo' => 'TIR'],
        ['nombre' => 'Hielo Seco', 'acronimo' => 'HIE'],
        ['nombre' => 'Stretch Film', 'acronimo' => 'STR'],
        ['nombre' => 'Canto Delgado', 'acronimo' => 'DEL'],
        ['nombre' => 'Canto Grueso', 'acronimo' => 'GRU'],
        ['nombre' => 'Canto Medio', 'acronimo' => 'MED'],
        ['nombre' => 'Pinotea', 'acronimo' => 'PIN'],
        ['nombre' => 'Aglomerado Hidrofugo', 'acronimo' => 'AHR'],
        ['nombre' => 'Abierto', 'acronimo' => 'AB'],
        ['nombre' => 'Gavetas', 'acronimo' => 'GV'],
        ['nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['nombre' => 'Puerta', 'acronimo' => 'PT'],
        ['nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['nombre' => 'Especiales', 'acronimo' => 'ES'],
        ['nombre' => 'Esquina', 'acronimo' => 'EQ'],
        ['nombre' => 'Nevera', 'acronimo' => 'NV'],
        ['nombre' => 'Vinera', 'acronimo' => 'VI'],
        ['nombre' => 'Gaveta 96', 'acronimo' => 'GP'],
        ['nombre' => 'Gaveta 256', 'acronimo' => 'GG'],
        ['nombre' => 'Fregador', 'acronimo' => 'FR'],
        ['nombre' => 'Superiores', 'acronimo' => 'SP'],
        ['nombre' => 'Plywood', 'acronimo' => 'PLY'],
        ['nombre' => 'Estandarizado', 'acronimo' => 'ST'],
        ['nombre' => 'Grande', 'acronimo' => 'GD'],
        ['nombre' => 'Mediano', 'acronimo' => 'MD'],
        ['nombre' => 'Pequeño', 'acronimo' => 'PQ'],
        ['nombre' => 'Piso', 'acronimo' => 'PI'],
        ['nombre' => 'Copete', 'acronimo' => 'CP'],
        ['nombre' => 'Horizontal', 'acronimo' => 'HR'],
        ['nombre' => 'Vertical', 'acronimo' => 'VT'],
        ['nombre' => 'Puertas', 'acronimo' => 'PT'],
        ['nombre' => 'Tubo', 'acronimo' => 'TB']
    ]);
}
}
