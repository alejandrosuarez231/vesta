<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Mtp;
use App\Lista_materiale;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $productos = Producto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre')->get();
      return view('productos.index');
    }

    public function indexData(){
      $productos = Producto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre,acronimo','extra:id,propiedad','marca:id,nombre')->get();
      // dd($productos->first());
      return Datatables::of($productos)
      ->editColumn('extra.propiedad', function(Producto $producto){
        if($producto->extra){
          return $producto->extra->propiedad;
        }else {
          return '-';
        }
      })
      ->editColumn('importado', function(Producto $producto){
        if($producto->importado == 0){
          return 'No';
        }else {
          return 'Si';
        }
      })
      ->addColumn('action', function ($producto) {
        return '<a href="productos/'.$producto->id.'/edit " class="btn btn-sm btn-primary"> Edit</a>';
      })
      ->make(true);
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

      if($request->tipo_id < 11){
        $this->validate($request, [
          'sku' => 'required|unique:productos,sku|min:14',
          'tipo_id' => 'required',
          'subtipo_id' => 'required',
          'nombre' => 'required',
          'descripcion' => 'nullable',
          'marca_id' => 'required',
          'unidad_id' => 'required',
          'ancho' => 'nullable',
          'largo' => 'nullable',
          'espesor' => 'nullable',
          'propiedades' => 'nullable',
          'extra_id' => 'nullable',
          'importado' => 'nullable',
          'minimo' => 'required|min:1',
          'maximo' => 'required|min:1'
        ]);
      }else {
        /* Validaciones */
      }

      $mtp = new Producto;
      $mtp->sku = $request->sku;
      $mtp->tipo_id = $request->tipo_id;
      $mtp->subtipo_id = $request->subtipo_id;
      $mtp->nombre = $request->nombre;
      // $mtp->descripcion = $request->descripcion;
      $mtp->marca_id = $request->marca_id;
      $mtp->unidad_id = $request->unidad_id;
      $mtp->ancho = $request->ancho;
      $mtp->largo = $request->largo;
      $mtp->espesor = $request->espesor;
      $mtp->propiedad_id = $request->propiedades;
      $mtp->extra_id = $request->extra_id;
      $mtp->minimo = $request->minimo;
      $mtp->maximo = $request->maximo;
      $mtp->save();
      alert()->success('Registro creado','Nuevo Producto Registrado');
      return redirect('frontend/productos');

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
      $producto = Producto::findOrFail($id);
      return view('productos.edit', compact('producto'));
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
      if($request->tipo_id < 11){
        $this->validate($request, [
          // 'sku' => 'required|unique:productos,sku|min:14',
          'sku' => 'required',
          'tipo_id' => 'required',
          'subtipo_id' => 'required',
          'nombre' => 'required',
          'descripcion' => 'nullable',
          'marca_id' => 'required',
          'unidad_id' => 'required',
          'ancho' => 'nullable',
          'largo' => 'nullable',
          'espesor' => 'nullable',
          'propiedades' => 'nullable',
          'extra_id' => 'nullable',
          'importado' => 'nullable',
          'minimo' => 'required|min:1',
          'maximo' => 'required|min:1'
        ]);
      }else {
        /* Validaciones */
      }

      $mtp = Producto::findOrFail($id);
      $mtp->sku = $request->sku;
      $mtp->tipo_id = $request->tipo_id;
      $mtp->subtipo_id = $request->subtipo_id;
      $mtp->nombre = $request->nombre;
      // $mtp->descripcion = $request->descripcion;
      $mtp->marca_id = $request->marca_id;
      $mtp->unidad_id = $request->unidad_id;
      $mtp->ancho = $request->ancho;
      $mtp->largo = $request->largo;
      $mtp->espesor = $request->espesor;
      $mtp->propiedad_id = $request->propiedad_id;
      $mtp->extra_id = $request->extra_id;
      $mtp->minimo = $request->minimo;
      $mtp->maximo = $request->maximo;
      $mtp->save();
      alert()->success('Registro Actualizado','Producto Editado');
      return redirect('frontend/productos');
    }

    public function setCotizacion($tipo,$subtipo)
    {
      $productos = Producto::with('tipo:id,nombre','extra:id,propiedad','marca:id,nombre')
      ->where('tipo_id',$tipo)
      ->where('subtipo_id', $subtipo)
      ->get();

      if($productos->count() > 0){
        $coleccion = collect();
        foreach ($productos as $value) {
          if( isset($value->extra->propiedad) ){
            $coleccion->push([
              'label' => $value->nombre .'|:'.$value->extra->propiedad . '|: '. $value->marca->nombre,
              'value' => $value->id,
              'sku' => $value->sku
            ]);
          }else {
            $coleccion->push([
              'label' => $value->nombre . '|: ' . $value->marca->nombre,
              'value' => $value->id,
              'sku' => $value->sku
            ]);
          }
        }
        return $coleccion->toJson();
      }else {
        $coleccion = collect(['label' => 'Sin Registros', 'value' => -1]);
        return $coleccion->toJson();
      }
    }

    public function getSKU($id)
    {
      $producto = Producto::findOrFail($id);
      $sku = $producto->sku;
      return $sku;
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
