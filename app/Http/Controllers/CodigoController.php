<?php

namespace App\Http\Controllers;

use App\Codigo;
use App\Tipo;
use App\Subtipo;
use Illuminate\Http\Request;

class CodigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codigos = Codigo::with('tipo:id,nombre,acromtip,acronimo','subtipo:id,nombre')->get();
        // dd($codigos);
        // $base = Subtipo::with('tipo:id,nombre,acromtip,acronimo')->get();
        return view('backend.codigos.index',compact('codigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.codigos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tipo' => 'required',
            'categoria_id' => 'required',
            'subcategoria_id' => 'nullable',
            'acronimo' => 'required',
            'tipologia' => 'required'
        ]);

        Codigo::create($request->all());

        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function show(Codigo $codigo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function edit(Codigo $codigo)
    {
        return view('backend.codigos.edit', compact('codigo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codigo $codigo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Codigo  $codigo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codigo $codigo)
    {
        //
    }
}
