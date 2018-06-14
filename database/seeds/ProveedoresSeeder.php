<?php

use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $proveedores = factory(App\Proveedore::class, 25)->make();
      foreach ($proveedores as $value) {
        $proveedor = new \App\Proveedore;
        $proveedor->fiscalid = $value->fiscalid;
        $proveedor->nombre = $value->nombre;
        $proveedor->direccion = $value->direccion;
        $proveedor->telefonos = $value->telefonos;
        $proveedor->email = $value->email;
        $proveedor->website = $value->website;
        $proveedor->credito = $value->credito;
        $proveedor->save();
      }
    }
  }
