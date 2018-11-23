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
        $modulo = Modulo::all()->take(1);
        // $modulo = Modulo::findOrFail(1);
        
        $id = NULL;
        $consecutivo = NULL;
        $sap = NULL;
        $fondo = NULL;
        $NewSKUs = collect();

        foreach ($modulo as $key => $value) {
            $id = $value->id;
            $saps = count(explode(",",$value->saps));
            $fondos = count(explode(",",$value->fondos));

            $sap = explode(",",$value->saps);
            $fondo = explode(",",$value->fondos);
            
            if($saps > $fondos){
                $consecutivo = $saps;
                for ($i=0; $i <= $consecutivo -1 ; $i++) { 
                    $NewSKUs->push([
                        'modulo_id' => $value->id,
                        'sku_grupo' => $value->sku_grupo,
                        'sku_padre' => $value->sku_grupo,
                        'tipo_id' => $value->tipo_id,
                        'subtipo_id' => $value->subtipo_id,
                        'categoria_id' => $value->categoria_id,
                        'descripcion' => $value->descripcion,
                        'sap_id' => NULL,
                        'fondo_id' => $sap[$i]
                    ]);
                }
            }else{
                $consecutivo = $fondos;
                for ($i=0; $i <= $consecutivo -1 ; $i++) { 
                    $NewSKUs->push([
                        'modulo_id' => $value->id,
                        'sku_grupo' => $value->sku_grupo,
                        'sku_padre' => $value->sku_grupo . str_pad($i+1, 2, '0', STR_PAD_LEFT),
                        'tipo_id' => $value->tipo_id,
                        'subtipo_id' => $value->subtipo_id,
                        'categoria_id' => $value->categoria_id,
                        'descripcion' => $value->descripcion,
                        'sap_id' => NULL,
                        'fondo_id' => $fondo[$i]
                    ]);
                }
            }
        }
        
        dd($consecutivo,$modulo,$NewSKUs);
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
