<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use Alert;
use Yajra\DataTables\DataTables;

class CotizacioneController extends Controller
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
        return view('cotizaciones.create');
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
     * @param      int   $id
     * @return     \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getMateriales($id)
    {
        $proyecto = Proyecto::with('tipo:id,nombre','subtipo:id,nombre','nombres:id,nombre','saps:id,valor','sars:id,valor')->where('id',$id)->get();
        $data = collect();

        foreach ($proyecto as $key => $value) {
            $data->push([
                'id' => $value->id,
                'sku' => $value->sku,
                'skucomercial' => $value->codigo,
                'tipo' => $value->tipo->nombre,
                'subtipo' => $value->subtipo->nombre,
                'nombre' => $value->nombres->nombre,
                'sap' => $value->saps->valor,
                'sar' => $value->sars->valor
            ]);
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
