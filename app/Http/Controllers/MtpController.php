<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mtp;
use Alert;

class MtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mtps = Mtp::with('categoria:id,nombre','subcategoria:id,nombre','unidad:id,nombre','proveedor:id,nombre')->paginate();
        return view('mtps.index', compact('mtps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mtps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sku' => 'required|unique:mtps|max:20',
            'categoria_id' => 'required',
            'subcategoria_id' => 'required',
            'tipo' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidad_id' => 'required',
            'proveedor_id' => 'required',
            'largo' => 'required|numeric',
            'ancho' => 'required|numeric',
            'area' => 'nullable|numeric',
            'espesor' => 'nullable|numeric',
            'importado' => 'required',
            'min' => 'required|min:1',
            'max' => 'required|min:1'
        ]);
        Mtp::create($request->all());
        alert()->success('Registro creado','Materia prima nueva');
        return redirect('mtps');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mtps.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('mtps.edit');
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
