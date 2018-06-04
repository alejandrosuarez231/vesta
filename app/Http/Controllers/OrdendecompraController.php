<?php

namespace App\Http\Controllers;

use App\Ordendecompra;
use Illuminate\Http\Request;

class OrdendecompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Ordendecompra::with('proveedor:id,nombre')->paginate();
        return view('ordendecompras.index', compact('ordenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orden = Ordendecompra::orderByDesc('id')->first();
        $ordenNumero = (int) $orden->id + 1;
        return view('ordendecompras.create', compact('ordenNumero'));
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
            'codigo' => 'required|unique:ordendecompras|max:8',
            'fecha' => 'required|date',
            'proveedor_id' => 'required',
            'prioridad' => 'required'
        ]);

        $orden = new Ordendecompra;
        $orden->codigo = $request->codigo;
        $orden->fecha = $request->fecha;
        $orden->prioridad = $request->prioridad;
        $orden->aprobada = 0;
        $orden->save();

        // dd(count($request->productos));

        for ($i=0; $i < count($request->productos) ; $i++) {
            $detalles = new \App\Ordendecompradetalle;
            $detalles->ordendecompra_id = $orden->id;
            $detalles->tipo = '1';
            $detalles->producto_id = $request->productos[$i];
            $detalles->cantidad = $request->cantidad[$i];
            $detalles->save();
        }

        alert()->success('Registro Creado','Orden de compra registrada');
        return redirect('ordendecompras');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ordendecompra  $ordendecompra
     * @return \Illuminate\Http\Response
     */
    public function show(Ordendecompra $ordendecompra)
    {
        return view('ordendecompras.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ordendecompra  $ordendecompra
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordendecompra $ordendecompra)
    {
        return view('ordendecompras.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ordendecompra  $ordendecompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordendecompra $ordendecompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ordendecompra  $ordendecompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordendecompra $ordendecompra)
    {
        //
    }
}
