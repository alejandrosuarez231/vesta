<?php

namespace App\Http\Controllers;

use App\Fondo;
use Illuminate\Http\Request;

class FondoController extends Controller
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
     * @param  \App\Fondo  $fondo
     * @return \Illuminate\Http\Response
     */
    public function show(Fondo $fondo)
    {
        //
    }

    public function fondoList()
    {
      $fondo_list = Fondo::all();
      $lists = collect();
      foreach ($fondo_list as $key => $value) {
        $lists->push(['value'=>$value->id,'label'=>$value->valor]);
      }
      return $lists->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fondo  $fondo
     * @return \Illuminate\Http\Response
     */
    public function edit(Fondo $fondo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fondo  $fondo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fondo $fondo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fondo  $fondo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fondo $fondo)
    {
        //
    }
}
