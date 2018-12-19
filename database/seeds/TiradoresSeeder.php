<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tiradores')->insert([
        ['tipo' => 'Tirador 1', 'acronimo' => 'T01'],
        ['tipo' => 'Tirador 2', 'acronimo' => 'T02'],
        ['tipo' => 'Tirador 3', 'acronimo' => 'T03'],
        ['tipo' => 'Tirador 4', 'acronimo' => 'T04'],
        ['tipo' => 'Tirador 5', 'acronimo' => 'T05'],
        ['tipo' => 'Tirador 6', 'acronimo' => 'T06'],
        ['tipo' => 'Tirador 7', 'acronimo' => 'T07'],
        ['tipo' => 'Tirador 8', 'acronimo' => 'T08'],
        ['tipo' => 'Tirador 9', 'acronimo' => 'T09'],
        ['tipo' => 'Tirador 10', 'acronimo' => 'T10']
      ]);
    }
  }
