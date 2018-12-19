<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BisagrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bisagras')->insert([
        ['tipo' => 'Generica S/F', 'acronimo' => 'GSF'],
        ['tipo' => 'Generica C/F', 'acronimo' => 'GCF'],
        ['tipo' => 'Premium S/F', 'acronimo' => 'PSF'],
        ['tipo' => 'Premium C/F', 'acronimo' => 'PCF']
      ]);
    }
}
