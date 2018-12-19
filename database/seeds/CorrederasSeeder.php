<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorrederasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('correderas')->insert([
        ['tipo' => 'Generica FE S/F', 'acronimo' => 'GSF'],
        ['tipo' => 'Generica FE C/F', 'acronimo' => 'GCF'],
        ['tipo' => 'Premium UM S/F', 'acronimo' => 'PSF'],
        ['tipo' => 'Premium UM C/F', 'acronimo' => 'PCF'],
        ['tipo' => 'Clasica S/F', 'acronimo' => 'CSF']

      ]);
    }
  }
