<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrapesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brapes')->insert([
          ['tipo' => 'Brazo Mecanico', 'acronimo' => 'BM'],
          ['tipo' => 'Piston', 'acronimo' => 'PI'],
          ['tipo' => 'Premium con Acero', 'acronimo' => 'PF']
        ]);
    }
}
