<?php

namespace App\Http\Controllers;

use App\Proveedore;
use Illuminate\Http\Request;

class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::orderBy('nombre')->paginate();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedore;
        $proveedor->nombre = $request->nombre;
        $proveedor->save();
        alert()->success('Registro Creado','Proveedor Nuevo');
        return redirect('/proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedore  $proveedore
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedore $proveedore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedore  $proveedore
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedore::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedore  $proveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedore::findOrFail($id);
        $proveedor->nombre = $request->nombre;
        $proveedor->save();
        alert()->success('Registro Actualizado','Proveedor Actualizado');
        return redirect('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedore  $proveedore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedore $proveedore)
    {

    }
}
