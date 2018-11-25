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
      $skulists = Skulistado::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre','sap:id,valor','fondo:id,valor')->get();
      return view('backend.skus.index', compact('skulists'));
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
    public function show($id)
    {

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
