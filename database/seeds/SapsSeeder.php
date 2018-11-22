<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SapsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('saps')->insert([
        ['valor' => 'No Aplica'],
        ['valor' => 'Gola'],
        ['valor' => 'Tirador'],
        ['valor' => 'Tip On'],
        ['valor' => 'Riel']
      ]);
    }
  }
