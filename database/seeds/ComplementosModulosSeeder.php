<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplementosModulosSeeder extends Seeder
{

	public function run()
	{
		DB::table('complemento_modulos')->insert([
			['nombre'=>'Correderas'],
			['nombre'=>'Bisagras'],
			['nombre'=>'Brazo'],
			['nombre'=>'Tirador'],
			['nombre'=>'Gola'],
			['nombre'=>'TipOn'],
			['nombre'=>'Minifix'],
			['nombre'=>'Patas'],
			['nombre'=>'Cond.'],
			['nombre'=>'Papelera'],
			['nombre'=>'Escurre.'],
			['nombre'=>'Tubo'],
			['nombre'=>'Bisagra Piano'],
			['nombre'=>'Lav Breeze Slim 1221'],
			['nombre'=>'Lav Art Slim 910'],
			['nombre'=>'Lav Art Slim 615'],
			['nombre'=>'Lav Domo Wide  820'],
			['nombre'=>'Lav Domo Wide  615'],
			['nombre'=>'Otros Acc.']

		]);
	}
}
