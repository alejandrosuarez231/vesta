<?php

namespace App\Http\Controllers;
use App\Tipo;
use Illuminate\Http\Request;
Use Alert;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::orderBy('nombre')->paginate();
        return view('backend.tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tipos.create');
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
            'tipologia' => 'required',
            'nombre' => 'required',
            'acronimo' => 'required',
        ]);
        Tipo::create($request->all());
        alert()->success('Registro Creado','Nuevo Tipo');
        return redirect('/backend/tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = Tipo::findOrFail($id);
        return view('backend.tipos.edit', compact('tipo'));
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
        $tipo = Tipo::findOrFail($id);
        $tipo->tipologia = $request->tipo;
        $tipo->nombre = $request->nombre;
        $tipo->acronimo = $request->acronimo;
        $tipo->save();
        alert()->success('Registro Actualizado','Tipo Actualizada');
        return redirect('/backend/tipos');
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
