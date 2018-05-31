<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productos = Producto::with('categoria:id,nombre','subcategoria:id,nombre','unidad:id,nombre','proveedor:id,nombre')->paginate();
      return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('productos.create');
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
      $validatedData = $request->validate([
        'sku' => 'required|unique:productos|max:20',
        'categoria_id' => 'required',
        'subcategoria_id' => 'required',
        'nombre' => 'required',
        'descripcion' => 'required',
        'unidad_id' => 'required',
        'importado' => 'required',
        'min' => 'required|min:1',
        'max' => 'required|min:1'
      ]);

      $producto = Producto::create($request->all());

      $propiedades = \App\Propiedade::create([
        'producto_id' => $producto->id,
        'largo' => $request->largo,
        'largo_izq' => $request->largoizq,
        'largo_der' => $request->largoder,
        'ancho' => $request->ancho,
        'anchosup' => $request->anchosup,
        'anchoinf' => $request->anchoinf,
        'mec1' => $request->mec1,
        'mec2' => $request->mec2
      ]);

      $setPropiedades = Producto::findOrFail($producto->id);
      $setPropiedades->update(['propiedades' => $propiedades->id]);

      alert()->success('Registro creado','Nuevo Producto Registrado');
      return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('productos.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('productos.edit');
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
