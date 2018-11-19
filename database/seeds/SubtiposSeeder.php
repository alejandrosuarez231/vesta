<?php

use Illuminate\Database\Seeder;
use App\Subtipo;

class SubtiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subtipos = collect([
        ['tipo_id' => 1, 'nombre' => 'Sist. Apertura', 'acronimo' => 'SAP'],
        ['tipo_id' => 1, 'nombre' => 'Perfiles y Tubos', 'acronimo' => 'PER'],
        ['tipo_id' => 1, 'nombre' => 'Bisagras', 'acronimo' => 'BIS'],
        ['tipo_id' => 2, 'nombre' => 'Silicones y Diluyentes', 'acronimo' => 'SID'],
        ['tipo_id' => 1, 'nombre' => 'Accesorios', 'acronimo' => 'ACC'],
        ['tipo_id' => 3, 'nombre' => 'Canto', 'acronimo' => 'CAN'],
        ['tipo_id' => 2, 'nombre' => 'Pegas', 'acronimo' => 'PEG'],
        ['tipo_id' => 1, 'nombre' => 'Correderas', 'acronimo' => 'COR'],
        ['tipo_id' => 4, 'nombre' => 'Packing', 'acronimo' => 'PAC'],
        ['tipo_id' => 2, 'nombre' => 'Conectores', 'acronimo' => 'CON'],
        ['tipo_id' => 1, 'nombre' => 'Patas', 'acronimo' => 'PAT'],
        ['tipo_id' => 3, 'nombre' => 'Madera', 'acronimo' => 'MAD'],
        ['tipo_id' => 3, 'nombre' => 'Tableros', 'acronimo' => 'TAB'],
        ['tipo_id' => 2, 'nombre' => 'Tapes', 'acronimo' => 'TAP'],
        ['tipo_id' => 5, 'nombre' => 'Cajas', 'acronimo' => 'CJ'],
        ['tipo_id' => 6, 'nombre' => 'Aereo', 'acronimo' => 'AE'],
        ['tipo_id' => 6, 'nombre' => 'Base', 'acronimo' => 'BA'],
        ['tipo_id' => 6, 'nombre' => 'Torre', 'acronimo' => 'TO'],
        ['tipo_id' => 6, 'nombre' => 'Gavetas', 'acronimo' => 'GA'],
        ['tipo_id' => 6, 'nombre' => 'Completa', 'acronimo' => 'CP'],
        ['tipo_id' => 7, 'nombre' => 'Escritorio', 'acronimo' => 'EC'],
        ['tipo_id' => 7, 'nombre' => 'Extension', 'acronimo' => 'EX'],
        ['tipo_id' => 8, 'nombre' => 'ArtSlim', 'acronimo' => 'AS'],
        ['tipo_id' => 8, 'nombre' => 'DomoWide', 'acronimo' => 'DW'],
        ['tipo_id' => 8, 'nombre' => 'Modular', 'acronimo' => 'MD'],
        ['tipo_id' => 9, 'nombre' => 'Camas', 'acronimo' => 'CM'],
        ['tipo_id' => 9, 'nombre' => 'Mesas de Noche', 'acronimo' => 'MN'],
        ['tipo_id' => 9, 'nombre' => 'Respaldos', 'acronimo' => 'RS'],
        ['tipo_id' => 9, 'nombre' => 'Gavetero', 'acronimo' => 'GA'],
        ['tipo_id' => 10, 'nombre' => 'Estante', 'acronimo' => 'ES'],
        ['tipo_id' => 10, 'nombre' => 'Muebles de TV', 'acronimo' => 'TV'],
        ['tipo_id' => 10, 'nombre' => 'Bibliotecas', 'acronimo' => 'BI'],
        ['tipo_id' => 10, 'nombre' => 'Bufetera', 'acronimo' => 'BU'],
        ['tipo_id' => 10, 'nombre' => 'Mesas de Centro', 'acronimo' => 'MC'],
        ['tipo_id' => 11, 'nombre' => 'Multifuncionales', 'acronimo' => 'MF'],
        ['tipo_id' => 12, 'nombre' => 'Techo Flotante', 'acronimo' => 'TF'],
        ['tipo_id' => 12, 'nombre' => 'Puertas', 'acronimo' => 'PT'],
        ['tipo_id' => 13, 'nombre' => 'Closet', 'acronimo' => 'CL'],
        ['tipo_id' => 13, 'nombre' => 'Vestier', 'acronimo' => 'VE'],
        ['tipo_id' => 14, 'nombre' => 'Flotante', 'acronimo' => 'FL']
    ]);

foreach ($subtipos as $values) {
    Subtipo::create($values);
}
}
}
