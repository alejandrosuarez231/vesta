<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use Alert;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::with('proveedore:id,nombre')->paginate();
        return view('compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'fecha' => 'required',
            'proveedore_id' => 'required',
            'prioridad' => 'required',
            'productos_id.*' => 'required|distinct',
            'cantidad.*' => 'required|min:1',
            'precio.*' => 'required|min:1'
        ]);

        $compra = new Compra;
        $compra->fecha = $request->fecha;
        $compra->ordendecompra_id = $request->ordendecompra_id;
        $compra->proveedore_id = $request->proveedore_id;
        $compra->prioridad = $request->prioridad;
        $compra->save();

        if( $compra->ordendecompra_id > 0 ){
            /* Buscar la compra y marcar como procesada */
            \App\Ordendecompra::findOrFail($compra->ordendecompra_id)->update(['procesada' => 1]);
        }

        $detalles = collect();
        for ($i=0; $i <=count($request->producto_id) -1 ; $i++) {
            $detalles->push(['compra_id' => $compra->id, 'producto_id' => $request->producto_id[$i], 'cantidad' => $request->cantidad[$i], 'precio' => $request->precio[$i]]);
        }
        // dd($detalles);
        for ($i=0; $i <=count($detalles) -1 ; $i++) {
            \App\Compradetalle::create($detalles[$i]);
        }
        alert()->success('Registro creado','compra procesada');
        return redirect('/compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
