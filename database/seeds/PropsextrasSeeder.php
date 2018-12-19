<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropsextrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('propsextras')->insert([
        ['tipo_id' => 1, 'subtipo_id' => 1 , 'extra_id' => 1],
        ['tipo_id' => 1, 'subtipo_id' => 2 , 'extra_id' => 1],
        ['tipo_id' => 1, 'subtipo_id' => 3 , 'extra_id' => 1],
        ['tipo_id' => 1, 'subtipo_id' => 4 , 'extra_id' => 1],
        ['tipo_id' => 1, 'subtipo_id' => 1 , 'extra_id' => 2],
        ['tipo_id' => 1, 'subtipo_id' => 2 , 'extra_id' => 2],
        ['tipo_id' => 1, 'subtipo_id' => 3 , 'extra_id' => 2],
        ['tipo_id' => 1, 'subtipo_id' => 4 , 'extra_id' => 2],
        ['tipo_id' => 3, 'subtipo_id' => 8 , 'extra_id' => 1],
        ['tipo_id' => 3, 'subtipo_id' => 9 , 'extra_id' => 1],
        ['tipo_id' => 3, 'subtipo_id' => 10, 'extra_id' => 1],
        ['tipo_id' => 3, 'subtipo_id' => 11, 'extra_id' => 1],
        ['tipo_id' => 3, 'subtipo_id' => 8 , 'extra_id' => 2],
        ['tipo_id' => 3, 'subtipo_id' => 9 , 'extra_id' => 2],
        ['tipo_id' => 3, 'subtipo_id' => 10, 'extra_id' => 2],
        ['tipo_id' => 3, 'subtipo_id' => 11, 'extra_id' => 2],
        ['tipo_id' => 5, 'subtipo_id' => 18, 'extra_id' => 3],
        ['tipo_id' => 5, 'subtipo_id' => 18, 'extra_id' => 4],
        ['tipo_id' => 7, 'subtipo_id' => 23, 'extra_id' => 5],
        ['tipo_id' => 7, 'subtipo_id' => 24, 'extra_id' => 5],
        ['tipo_id' => 7, 'subtipo_id' => 25, 'extra_id' => 5],
        ['tipo_id' => 7, 'subtipo_id' => 26, 'extra_id' => 5],
        ['tipo_id' => 7, 'subtipo_id' => 27, 'extra_id' => 5],
        ['tipo_id' => 7, 'subtipo_id' => 28, 'extra_id' => 5],
        ['tipo_id' => 7, 'subtipo_id' => 29, 'extra_id' => 7],
        ['tipo_id' => 7, 'subtipo_id' => 29, 'extra_id' => 8],
        ['tipo_id' => 7, 'subtipo_id' => 23, 'extra_id' => 6],
        ['tipo_id' => 7, 'subtipo_id' => 24, 'extra_id' => 6],
        ['tipo_id' => 7, 'subtipo_id' => 25, 'extra_id' => 6],
        ['tipo_id' => 7, 'subtipo_id' => 26, 'extra_id' => 6],
        ['tipo_id' => 7, 'subtipo_id' => 27, 'extra_id' => 6],
        ['tipo_id' => 7, 'subtipo_id' => 28, 'extra_id' => 6]
      ]);
    }
  }
