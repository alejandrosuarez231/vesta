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
        ['valor' => 'No Aplica', 'acronimo' => '0'],
        ['valor' => 'Tirador', 'acronimo' => '1'],
        ['valor' => 'Gola', 'acronimo' => '2'],
        ['valor' => 'Tip On', 'acronimo' => '3']
      ]);
    }
  }
