<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodigosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('codigos')->insert([
        ['tipo_id' => 1, 'subtipo_id' => 1, 'skubase' => 'MBIBF', 'numeracion' => 1],
        ['tipo_id' => 1, 'subtipo_id' => 2, 'skubase' => 'MBIBS', 'numeracion' => 1],
        ['tipo_id' => 2, 'subtipo_id' => 3, 'skubase' => 'MCACD', 'numeracion' => 1],
        ['tipo_id' => 2, 'subtipo_id' => 4, 'skubase' => 'MCACM', 'numeracion' => 1],
        ['tipo_id' => 2, 'subtipo_id' => 5, 'skubase' => 'MCACG', 'numeracion' => 1],
        ['tipo_id' => 3, 'subtipo_id' => 6, 'skubase' => 'MCRCU', 'numeracion' => 1],
        ['tipo_id' => 3, 'subtipo_id' => 7, 'skubase' => 'MCRCF', 'numeracion' => 1],
        ['tipo_id' => 3, 'subtipo_id' => 8, 'skubase' => 'MCRCS', 'numeracion' => 1],
        ['tipo_id' => 4, 'subtipo_id' => 9, 'skubase' => 'MTAHR', 'numeracion' => 1],
        ['tipo_id' => 4, 'subtipo_id' => 10, 'skubase' => 'MTAST', 'numeracion' => 1],
        ['tipo_id' => 4, 'subtipo_id' => 11, 'skubase' => 'MTAMD', 'numeracion' => 1],
        ['tipo_id' => 5, 'subtipo_id' => 12, 'skubase' => 'MOHCT', 'numeracion' => 1],
        ['tipo_id' => 5, 'subtipo_id' => 13, 'skubase' => 'MOHAC', 'numeracion' => 1],
        ['tipo_id' => 5, 'subtipo_id' => 14, 'skubase' => 'MOHPE', 'numeracion' => 1],
        ['tipo_id' => 5, 'subtipo_id' => 15, 'skubase' => 'MOHTA', 'numeracion' => 1],
        ['tipo_id' => 5, 'subtipo_id' => 16, 'skubase' => 'MOHPA', 'numeracion' => 1],
        ['tipo_id' => 6, 'subtipo_id' => 17, 'skubase' => 'MSAGO', 'numeracion' => 1],
        ['tipo_id' => 6, 'subtipo_id' => 18, 'skubase' => 'MSATI', 'numeracion' => 1],
        ['tipo_id' => 7, 'subtipo_id' => 19, 'skubase' => 'MPKIN', 'numeracion' => 1],
        ['tipo_id' => 7, 'subtipo_id' => 20, 'skubase' => 'MPKCJ', 'numeracion' => 1],
        ['tipo_id' => 7, 'subtipo_id' => 21, 'skubase' => 'MPKET', 'numeracion' => 1],
        ['tipo_id' => 8, 'subtipo_id' => 0, 'skubase' => 'SPI', 'numeracion' => 1],
        ['tipo_id' => 9, 'subtipo_id' => 0, 'skubase' => 'SMO', 'numeracion' => 1],
        ['tipo_id' => 10, 'subtipo_id' => 0, 'skubase' => 'SKI', 'numeracion' => 1],
        ['tipo_id' => 11, 'subtipo_id' => 22, 'skubase' => 'TCB', 'numeracion' => 1],
        ['tipo_id' => 11, 'subtipo_id' => 23, 'skubase' => 'TCA', 'numeracion' => 1],
        ['tipo_id' => 11, 'subtipo_id' => 24, 'skubase' => 'TCT', 'numeracion' => 1],
        ['tipo_id' => 11, 'subtipo_id' => 25, 'skubase' => 'TCG', 'numeracion' => 1],
        ['tipo_id' => 11, 'subtipo_id' => 26, 'skubase' => 'TCE', 'numeracion' => 1],
        ['tipo_id' => 12, 'subtipo_id' => 27, 'skubase' => 'TV6', 'numeracion' => 1],
        ['tipo_id' => 12, 'subtipo_id' => 28, 'skubase' => 'TV3', 'numeracion' => 1],
        ['tipo_id' => 13, 'subtipo_id' => 29, 'skubase' => 'TBA', 'numeracion' => 1],
        ['tipo_id' => 13, 'subtipo_id' => 30, 'skubase' => 'TBP', 'numeracion' => 1],
        ['tipo_id' => 14, 'subtipo_id' => 31, 'skubase' => 'TLAU', 'numeracion' => 1],
        ['tipo_id' => 14, 'subtipo_id' => 32, 'skubase' => 'TLMN', 'numeracion' => 1],
        ['tipo_id' => 14, 'subtipo_id' => 33, 'skubase' => 'TLBU', 'numeracion' => 1],
        ['tipo_id' => 14, 'subtipo_id' => 34, 'skubase' => 'TLTV', 'numeracion' => 1],
        ['tipo_id' => 14, 'subtipo_id' => 35, 'skubase' => 'TLMC', 'numeracion' => 1],
        ['tipo_id' => 14, 'subtipo_id' => 36, 'skubase' => 'TLGA', 'numeracion' => 1],
        ['tipo_id' => 14, 'subtipo_id' => 37, 'skubase' => 'TLBL', 'numeracion' => 1],
      ]);
    }
  }
