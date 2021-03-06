<?php

namespace App\Http\Controllers;

use App\Pieza_sku;
use Illuminate\Http\Request;

class PiezaSkuController extends Controller
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
     * @param  \App\Pieza_sku  $pieza_sku
     * @return \Illuminate\Http\Response
     */
    public function show(Pieza_sku $pieza_sku)
    {
        //
    }

    public function getPiezas($skulistado_id)
    {
        $piezas = Pieza_sku::with('pieza:id,tipo_pieza','materiale:id,nombre')
        ->where('skulistado_id',$skulistado_id)->get();
        return $piezas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pieza_sku  $pieza_sku
     * @return \Illuminate\Http\Response
     */
    public function edit(Pieza_sku $pieza_sku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pieza_sku  $pieza_sku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pieza_sku $pieza_sku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pieza_sku  $pieza_sku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pieza_sku $pieza_sku)
    {
        //
    }
}
