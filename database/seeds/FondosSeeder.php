<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FondosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('fondos')->insert([
        ['valor' => 'No Aplica','acronimo' => '0'],
        ['valor' => 'Sin Fondo','acronimo' => '1'],
        ['valor' => 'Fondo Delgado','acronimo' => '2'],
        ['valor' => 'Fondo Grueso','acronimo' => '3']
      ]);
    }
  }
