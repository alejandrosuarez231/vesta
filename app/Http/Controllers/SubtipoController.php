<?php

namespace App\Http\Controllers;
use App\Subtipo;
use Illuminate\Http\Request;

class SubtipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtipos = Subtipo::with('tipo:id,nombre,acronimo')->orderBy('nombre')->paginate();
        return view('backend.subtipos.index', compact('subtipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subtipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_id' => 'required',
            'nombre' => 'required|unique:subtipos',
            'acronimo' => 'required'
        ]);

        $subtipos = new Subtipo;
        $subtipos->tipo_id = $request->tipo_id;
        $subtipos->nombre = $request->nombre;
        $subtipos->acronimo = $request->acronimo;
        $subtipos->save();
        alert()->success('Registro Creado','Sub-tipo Nueva');
        return redirect('/backend/subtipos');
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
        $subtipo = Subtipo::findOrFail($id);
        return view('backend.subtipos.edit', compact('subtipo'));
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
        $request->validate([
            'tipo_id' => 'required',
            'nombre' => 'required|unique:subtipos',
            'acronimo' => 'required'
        ]);

        $subtipo = Subtipo::findOrFail($id);
        $subtipo->tipo_id = $request->tipo_id;
        $subtipo->nombre = $request->nombre;
        $subtipo->acronimo = $request->acronimo;
        $subtipo->save();
        alert()->success('Registro Actualizado','Sub-tipo Actualizada');
        return redirect('/backend/subtipos');
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
