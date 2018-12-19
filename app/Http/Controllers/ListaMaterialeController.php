<?php

namespace App\Http\Controllers;

use App\Lista_materiale;
use Illuminate\Http\Request;

class ListaMaterialeController extends Controller
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

    public function getMateriales($producto)
    {
        $materiales = \App\Lista_materiale::where('producto_id','=',$producto)->get();
        $listMateriales = collect();
        foreach ($materiales as $key => $value) {
            $listMateriales->push([
                'id' => $value->id,
                'producto_id' => $value->producto_id,
                'material_id' => $value->material->id,
                'descripcion_id' => $value->descripcion_id,
                'largo' => $value->largo,
                'alto' => $value->alto,
                'profundidad' => $value->profundidad,
                'largo_izq' => $value->largo_izq,
                'largo_der' => $value->largo_der,
                'alto_sup' => $value->alto_sup,
                'alto_inf' => $value->alto_inf,
                'mec1' => $value->mec1,
                'mec2' => $value->mec2,
                'cantidad' => $value->cantidad
            ]);
        }
        return $listMateriales->toJson();
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
     * @param  \App\Lista_materiale  $lista_materiale
     * @return \Illuminate\Http\Response
     */
    public function show(Lista_materiale $lista_materiale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista_materiale  $lista_materiale
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista_materiale $lista_materiale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lista_materiale  $lista_materiale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista_materiale $lista_materiale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista_materiale  $lista_materiale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista_materiale $lista_materiale)
    {
        //
    }
}
