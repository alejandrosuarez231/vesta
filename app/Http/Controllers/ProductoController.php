<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Mtp;
use App\Lista_materiale;
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
      $productos = Producto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre')->paginate();
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
     if($request->tipo_id > 0 && $request->tipo_id < 8){
      $validatedData = $request->validate([
        'sku' => 'required|unique:productos|max:20',
        'tipo_id' => 'required',
        'subtipo_id' => 'required',
        'nombre' => 'required',
        'descripcion' => 'required',
        'marca_id' => 'required',
        'unidad_id' => 'required',
        'minimo' => 'required|min:1',
        'maximo' => 'required|min:1'
      ]);

      $mtp = new Producto;
      $mtp->sku = $request->sku;
      $mtp->tipo_id = $request->tipo_id;
      $mtp->subtipo_id = $request->subtipo_id;
      $mtp->nombre = $request->nombre;
      $mtp->descripcion = $request->descripcion;
      $mtp->marca_id = $request->marca_id;
      $mtp->unidad_id = $request->unidad_id;
      if(isset($request->extra_id)){
        $mtp->extra_id = $request->extra_id;
      }
      $mtp->minimo = $request->minimo;
      $mtp->maximo = $request->maximo;
      $mtp->save();
      alert()->success('Registro creado','Nuevo Producto Registrado');
      return redirect('frontend/productos');

    }else {
      /* No es Materia Prima */
    }

    // $producto = Producto::create($request->all());
    // $propiedades = \App\Propiedade::create([
    //   'producto_id' => $producto->id,
    //   'largo' => $request->largo,
    //   'largo_izq' => $request->largoizq,
    //   'largo_der' => $request->largoder,
    //   'ancho' => $request->ancho,
    //   'anchosup' => $request->anchosup,
    //   'anchoinf' => $request->anchoinf,
    //   'mec1' => $request->mec1,
    //   'mec2' => $request->mec2
    // ]);
    // $setPropiedades = Producto::findOrFail($producto->id);
    // $setPropiedades->update(['propiedades' => $propiedades->id]);
    // alert()->success('Registro creado','Nuevo Producto Registrado');
    // return redirect('productos');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $producto = Producto::with('tipo:id,nombre,tipologia','extra:id,propiedad')->findOrFail($id);
      if ($producto->tipo->tipologia == 'PTO'){
        $mtps = Mtp::with('producto:id,nombre')->where('producto_id','=',$id)->get();
        $materiales = Lista_materiale::with('material:id,nombre','descripcion:id,descripcion','propiedad:id,largo,ancho,espesor,veta,largo_izq,largo_der,ancho_sup,ancho_inf,mec1,mec2')->get();
        // dd($materiales);
        return view('productos.show', compact('producto','mtps','materiales'));
      }elseif ($producto->tipo->tipologia == 'MTP') {
        return view('productos/showmtp', compact('producto'));
      }
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
