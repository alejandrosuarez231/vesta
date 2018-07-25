<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        ['name' => 'Laymont Arratia', 'email' => 'laymont@gmail.com', 'password' => bcrypt('12215358')],
        ['name' => 'Eduardo', 'email' => 'eperera@empresasvesta.com', 'password' => '$2y$10$yyVnN79qw8PDNdrg.oDt9u0si2pxEg9eVP/HW/vZ74dJ70sgBKXOC']
      ]);
    }
  }
