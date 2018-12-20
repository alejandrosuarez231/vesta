<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplementosModulosSeeder extends Seeder
{

	public function run()
	{
		DB::table('complemento_modulos')->insert([
			['nombre'=>'Canto', 'costo' => 0.6],
			['nombre'=>'Correderas', 'costo' => 0],
			['nombre'=>'Bisagras', 'costo' => 0],
			['nombre'=>'Brazo', 'costo' => 0],
			['nombre'=>'Tirador', 'costo' => 0],
			['nombre'=>'Gola', 'costo' => 14],
			['nombre'=>'TipOn', 'costo' => 6.8],
			['nombre'=>'Minifix', 'costo' => 0.25],
			['nombre'=>'Patas', 'costo' => 1],
			['nombre'=>'Cond.', 'costo' => 50],
			['nombre'=>'Papelera', 'costo' => 40],
			['nombre'=>'Escurre.', 'costo' => 60],
			['nombre'=>'Tubo', 'costo' => 4],
			['nombre'=>'Bisagra Piano', 'costo' => 9.5],
			['nombre'=>'Lav Breeze Slim 1221', 'costo' => 166.66],
			['nombre'=>'Lav Art Slim 910', 'costo' => 85.2],
			['nombre'=>'Lav Art Slim 615', 'costo' => 48.82],
			['nombre'=>'Lav Domo Wide  820', 'costo' => 88.6],
			['nombre'=>'Lav Domo Wide  615', 'costo' => 62.9],
			['nombre'=>'Otros Acc.', 'costo' => 0]

		]);
	}
}
