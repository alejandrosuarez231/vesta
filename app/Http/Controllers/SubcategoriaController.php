<?php

namespace App\Http\Controllers;
use App\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias = Subcategoria::with('categoria:id,nombre')->orderBy('nombre')->paginate();
        return view('subcategorias.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcategorias.create');
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
            'categoria_id' => 'required',
            'nombre' => 'required|unique:subcategorias',
            'descripcion' => 'nullable'
        ]);

        $subcategorias = new Subcategoria;
        $subcategorias->categoria_id = $request->categoria_id;
        $subcategorias->nombre = $request->nombre;
        $subcategorias->descripcion = $request->descripcion;
        $subcategorias->save();
        alert()->success('Registro Creado','Sub-Categoria Nueva');
        return redirect('/subcategorias');
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
        $subcategoria = Subcategoria::findOrFail($id);
        return view('subcategorias.edit', compact('subcategoria'));
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
            'categoria_id' => 'required',
            'nombre' => 'required|unique:subcategorias',
            'descripcion' => 'nullable'
        ]);

        $subcategoria = Subcategoria::findOrFail($id);
        $subcategoria->categoria_id = $request->categoria_id;
        $subcategoria->nombre = $request->nombre;
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->save();
        alert()->success('Registro Actualizado','Sub-Categoria Actualizada');
        return redirect('/subcategorias');
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
