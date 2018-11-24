<?php

namespace App\Http\Controllers;

use App\Skulistado;
use App\Modulo;
use App\Sap;
use App\Fondo;
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
      //
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
    public function show(Skulistado $skulistado, $id)
    {
      $modulo = Modulo::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre')->findOrFail($id);
      $saps = Sap::whereIn('id',explode(",",$modulo->saps))->get();
      // dd($saps);
      $fondos = Fondo::whereIn('id',explode(",",$modulo->fondos))->get();
      $data = collect();

      if( count($saps) > count($fondos)){
        /* mayor sistema de apertura */
      }else {
        /* mayor fondos */
        for ($i=0; $i <= count($fondos) -1 ; $i++) {
          for ($e=0; $e <= count($saps) -1 ; $e++) {
            $data->push([
              'modulo_id' => $modulo->id,
              'sku_grupo' => $modulo->sku_grupo,
              'sku_padre' => $modulo->sku_grupo . $saps[$e]->acronimo . $fondos[$i]->acronimo,
              'tipo_id' => $modulo->tipo->nombre,
              'subtipo_id' => $modulo->subtipo->nombre,
              'categoria_id' => $modulo->categoria->nombre,
              'descripcion' => $modulo->descripcion,
              'sap_id' => $saps[$e]->valor,
              'fondo_id' => $fondos[$i]->valor
            ]);
          }
        }
      }

      return view('backend.skus.index', compact('data'));
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
