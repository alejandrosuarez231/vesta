<?php

namespace App\Http\Controllers;

use App\Descripcione;
use Illuminate\Http\Request;
use Alert;

class DescripcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descripciones = Descripcione::paginate();
        return $descripciones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/materiales/descripciones/create');
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
            'materiale_id' => 'required',
            'descripcion' => 'required'
        ]);

        Descripcione::create($request->all());
        alert()->success('Registro creado','Nuevo Descripcion Registrada');
        return redirect('backend/materiales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Descripcione  $descripcione
     * @return \Illuminate\Http\Response
     */
    public function show(Descripcione $descripcione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Descripcione  $descripcione
     * @return \Illuminate\Http\Response
     */
    public function edit(Descripcione $descripcione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Descripcione  $descripcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descripcione $descripcione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Descripcione  $descripcione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descripcione $descripcione)
    {
        //
    }
}
