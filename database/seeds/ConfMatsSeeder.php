<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfMatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('confmats')->insert([
        ['id' => 1, 'materiale_id' => 1, 'productos' => '37,38,39'],
        ['id' => 2, 'materiale_id' => 2, 'productos' => '37,38,39'],
        ['id' => 3, 'materiale_id' => 3, 'productos' => '37,38,39'],
        ['id' => 4, 'materiale_id' => 7, 'productos' => '37,38,39']
      ]);
    }
  }
