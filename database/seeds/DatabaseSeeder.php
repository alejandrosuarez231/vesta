<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          UsersSeeder::class,
          TiposSeeder::class,
          SubtiposSeeder::class,
          // ProveedoresSeeder::class,
          MarcasSeeder::class,
          ColoresSeeder::class,
          Unidades::class,
          Materiales::class,
          DescripcionesSeeder::class,
          CodigosSeeder::class,
          ExtrasSeeder::class,
          PropsextrasSeeder::class,
          ProductosSeeder::class,
          ConfpartSeed::class,
        ]);
    }
}
