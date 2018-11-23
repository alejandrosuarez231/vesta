<?php

namespace App\Http\Controllers;

use App\Skulistado;
use App\Modulo;
use Illuminate\Http\Request;

class SkulistadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulo = Modulo::findOrFail(1);

        $data01 = collect();

        /* Sistemas de Apertura */
        $saps = explode(",",$modulo->saps);
        for ($i=0; $i <= count($saps) - 1 ; $i++) { 
            $data01->push([
                'modulo_id' => $modulo->id,
                'sku_grupo' => $modulo->sku_grupo,
                'sku_padre' => $modulo->sku_grupo,
                'tipo_id' => $modulo->tipo_id,
                'subtipo_id' => $modulo->subtipo_id,
                'categoria_id' => $modulo->categoria_id,
                'descripcion' => $modulo->descripcion,
                'sap_id' => $saps[$i],
                'fondo_id' => NULL
            ]);
        }

        /* Fondos */
        $data02 = collect();
        $fondos = explode(",",$modulo->fondos);
        for ($i=0; $i <= count($fondos) - 1 ; $i++) { 
            $data02->push([
                'modulo_id' => $modulo->id,
                'sku_grupo' => $modulo->sku_grupo,
                'sku_padre' => $modulo->sku_grupo,
                'tipo_id' => $modulo->tipo_id,
                'subtipo_id' => $modulo->subtipo_id,
                'categoria_id' => $modulo->categoria_id,
                'descripcion' => $modulo->descripcion,
                'sap_id' => NULL,
                'fondo_id' => $fondos[$i]
            ]);
        }
        
        dd($data01,$data02);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skulistado  $skulistado
     * @return \Illuminate\Http\Response
     */
    public function show(Skulistado $skulistado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skulistado  $skulistado
     * @return \Illuminate\Http\Response
     */
    public function edit(Skulistado $skulistado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skulistado  $skulistado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skulistado $skulistado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skulistado  $skulistado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skulistado $skulistado)
    {
        //
    }
}
