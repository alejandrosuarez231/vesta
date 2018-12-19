<?php

use Illuminate\Database\Seeder;
use App\Mtp;

class MtpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $mtps = collect([
        ['id' => 1, 'producto_id' => 1, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 2],
        ['id' => 2, 'producto_id' => 1, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 3],
        ['id' => 3, 'producto_id' => 2, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 2],
        ['id' => 4, 'producto_id' => 2, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 3],
        ['id' => 5, 'producto_id' => 3, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 2],
        ['id' => 6, 'producto_id' => 3, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 3],
        ['id' => 7, 'producto_id' => 4, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 2],
        ['id' => 8, 'producto_id' => 4, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 3],
        ['id' => 9, 'producto_id' => 5, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 17, 'cantidad' => 2],
        ['id' => 10, 'producto_id' => 6, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 17, 'cantidad' => 2],
        ['id' => 11, 'producto_id' => 7, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 17, 'cantidad' => 2],
        ['id' => 12, 'producto_id' => 8, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 17, 'cantidad' => 2],
        ['id' => 13, 'producto_id' => 9, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 17, 'cantidad' => 2],
        ['id' => 14, 'producto_id' => 10, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 17, 'cantidad' => 2],
        ['id' => 15, 'producto_id' => 11, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 17, 'cantidad' => 2],
        ['id' => 16, 'producto_id' => 12, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 17, 'cantidad' => 2],
        ['id' => 17, 'producto_id' => 13, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 8],
        ['id' => 18, 'producto_id' => 13, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 12],
        ['id' => 19, 'producto_id' => 13, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 20, 'cantidad' => 4],
        ['id' => 20, 'producto_id' => 13, 'mtp_tipo_id' => 8, 'mtp_subtipo_id' => 34, 'cantidad' => 4],
        ['id' => 21, 'producto_id' => 14, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 8],
        ['id' => 22, 'producto_id' => 14, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 12],
        ['id' => 23, 'producto_id' => 14, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 20, 'cantidad' => 4],
        ['id' => 24, 'producto_id' => 14, 'mtp_tipo_id' => 8, 'mtp_subtipo_id' => 34, 'cantidad' => 4],
        ['id' => 25, 'producto_id' => 15, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 8],
        ['id' => 26, 'producto_id' => 15, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 12],
        ['id' => 27, 'producto_id' => 15, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 20, 'cantidad' => 4],
        ['id' => 28, 'producto_id' => 15, 'mtp_tipo_id' => 8, 'mtp_subtipo_id' => 34, 'cantidad' => 4],
        ['id' => 29, 'producto_id' => 16, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 8],
        ['id' => 30, 'producto_id' => 16, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 12],
        ['id' => 31, 'producto_id' => 16, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 20, 'cantidad' => 4],
        ['id' => 32, 'producto_id' => 16, 'mtp_tipo_id' => 8, 'mtp_subtipo_id' => 34, 'cantidad' => 4],
        ['id' => 33, 'producto_id' => 17, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 8],
        ['id' => 34, 'producto_id' => 17, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 12],
        ['id' => 35, 'producto_id' => 17, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 20, 'cantidad' => 16],
        ['id' => 36, 'producto_id' => 17, 'mtp_tipo_id' => 8, 'mtp_subtipo_id' => 34, 'cantidad' => 4],
        ['id' => 37, 'producto_id' => 18, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 8],
        ['id' => 38, 'producto_id' => 18, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 12],
        ['id' => 39, 'producto_id' => 18, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 20, 'cantidad' => 16],
        ['id' => 40, 'producto_id' => 18, 'mtp_tipo_id' => 8, 'mtp_subtipo_id' => 34, 'cantidad' => 4],
        ['id' => 41, 'producto_id' => 19, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 8],
        ['id' => 42, 'producto_id' => 19, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 12],
        ['id' => 43, 'producto_id' => 19, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 20, 'cantidad' => 16],
        ['id' => 44, 'producto_id' => 19, 'mtp_tipo_id' => 8, 'mtp_subtipo_id' => 34, 'cantidad' => 4],
        ['id' => 45, 'producto_id' => 20, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 15, 'cantidad' => 8],
        ['id' => 46, 'producto_id' => 20, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 21, 'cantidad' => 12],
        ['id' => 47, 'producto_id' => 20, 'mtp_tipo_id' => 5, 'mtp_subtipo_id' => 20, 'cantidad' => 16],
        ['id' => 48, 'producto_id' => 20, 'mtp_tipo_id' => 8, 'mtp_subtipo_id' => 34, 'cantidad' => 4]
      ]);
foreach ($mtps as $value) {
  Mtp::create($value);
}
}
}
