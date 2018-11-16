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
      DB::table('colores')->insert([
        ['nombre' => 'Rieles', 'acronimo' => 'RIE'],
        ['nombre' => 'Perfil Gola', 'acronimo' => 'GOL'],
        ['nombre' => 'Zocalo', 'acronimo' => 'ZOC'],
        ['nombre' => 'Bisagra Curva', 'acronimo' => 'CUR'],
        ['nombre' => 'Bisagra Recta', 'acronimo' => 'REC'],
        ['nombre' => 'Bisagra Semicurva', 'acronimo' => 'SCU'],
        ['nombre' => 'Polvos', 'acronimo' => 'POL'],
        ['nombre' => 'Brazo Sujeta Puerta', 'acronimo' => 'BRA'],
        ['nombre' => 'Canto Grueso', 'acronimo' => 'GRU'],
        ['nombre' => 'Canto Medio', 'acronimo' => 'MED'],
        ['nombre' => 'Canto Delgado', 'acronimo' => 'DEL'],
        ['nombre' => 'Celulon', 'acronimo' => 'CEL'],
        ['nombre' => 'Cemento de Contacto', 'acronimo' => 'CEM'],
        ['nombre' => 'Cola Blanca', 'acronimo' => 'COL'],
        ['nombre' => 'Sencilla', 'acronimo' => 'SEN'],
        ['nombre' => 'Full Extension', 'acronimo' => 'FEX'],
        ['nombre' => 'Undermount', 'acronimo' => 'UND'],
        ['nombre' => 'Undermount & TipOn', 'acronimo' => 'UTI'],
        ['nombre' => 'Aguarras', 'acronimo' => 'AGU'],
        ['nombre' => 'Thinner', 'acronimo' => 'THI'],
        ['nombre' => 'Hielo Seco', 'acronimo' => 'HIE'],
        ['nombre' => 'High Tack', 'acronimo' => 'HIG'],
        ['nombre' => 'Mini Fix', 'acronimo' => 'MFX'],
        ['nombre' => '100mm', 'acronimo' => '100'],
        ['nombre' => '150mm', 'acronimo' => '150'],
        ['nombre' => 'Pinotea', 'acronimo' => 'PIN'],
        ['nombre' => 'Silicone', 'acronimo' => 'SIL'],
        ['nombre' => 'Stretch Film', 'acronimo' => 'STR'],
        ['nombre' => 'Plywood', 'acronimo' => 'PLY'],
        ['nombre' => 'Aglomerado Hidrofugo', 'acronimo' => 'AHR'],
        ['nombre' => 'Tape Azul', 'acronimo' => 'TAA'],
        ['nombre' => 'Tape Blanco', 'acronimo' => 'TAB'],
        ['nombre' => 'Tarugos Madera', 'acronimo' => 'TAR'],
        ['nombre' => 'TipOn', 'acronimo' => 'TIP'],
        ['nombre' => 'Tubo Guindador', 'acronimo' => 'TUB'],
        ['nombre' => 'Zocalo Inox', 'acronimo' => 'ZOC'],
        ['nombre' => 'Abierto', 'acronimo' => 'AB'],
        ['nombre' => 'Gavetas', 'acronimo' => 'GV'],
        ['nombre' => 'Puerta', 'acronimo' => 'PT'],
        ['nombre' => 'Proyecto', 'acronimo' => 'PY'],
        ['nombre' => 'Complementos', 'acronimo' => 'CM'],
        ['nombre' => 'Especiales', 'acronimo' => 'ES'],
        ['nombre' => 'Esquina', 'acronimo' => 'EQ'],
        ['nombre' => 'Nevera', 'acronimo' => 'NV'],
        ['nombre' => 'Vinera', 'acronimo' => 'VI'],
        ['nombre' => 'Fregador', 'acronimo' => 'FR'],
        ['nombre' => 'Superiores', 'acronimo' => 'SP'],
        ['nombre' => 'RTA', 'acronimo' => 'RT'],
        ['nombre' => 'Grande', 'acronimo' => 'GD'],
        ['nombre' => 'Mediano', 'acronimo' => 'MD'],
        ['nombre' => 'Pequeño', 'acronimo' => 'PQ'],
        ['nombre' => 'Piso', 'acronimo' => 'PI'],
        ['nombre' => 'Copete', 'acronimo' => 'CP'],
        ['nombre' => 'Vertical', 'acronimo' => 'VT'],
        ['nombre' => 'Horizontal', 'acronimo' => 'HR'],
        ['nombre' => 'Puertas', 'acronimo' => 'PT'],
        ['nombre' => 'Tubo', 'acronimo' => 'TB']
      ]);
    }
  }
