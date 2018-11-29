<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulo;
use App\Skulistado;
use App\Sap;
use App\Fondo;
use App\Pieza;
use App\Complemento;
use Alert;
use Yajra\DataTables\DataTables;
use DB;

class ModuloController extends Controller
{
  public function index()
  {
    return view('backend.modulos.index');
  }

  public function indexData()
  {
    $modulos = Modulo::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre','sap:id,valor','fondo:id,valor','pieza','complemento')->get();

    return Datatables::of($modulos)
    ->editColumn('pieza', function($modulo){
      if($modulo->pieza->count() == 0){
        return '<a href="../backend/piezas/create/'.$modulo->id.'" titlle="Editar" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></a>';
      }else if($modulo->pieza->count() > 0){
        return '<a href="#" titlle="Aprobar" class="btn btn-sm btn-danger"><i class="fas fa-lock-open"></i></a>';
      }
    })
    ->editColumn('complemento', function($modulo){
      if($modulo->complemento->count() == 0){
        return '<a href="../backend/complementos/create/'.$modulo->id.'" titlle="Editar" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></a>';
      }else if($modulo->pieza->count() > 0){
        return '<a href="#" titlle="Aprobar" class="btn btn-sm btn-danger"><i class="fas fa-lock-open"></i></a>';
      }
    })
    ->addColumn('action', function ($modulo) {
      return '
      <a href="modulos/'.$modulo->id.'/edit " titlle="Editar" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
      <a href="modulos/'.$modulo->id.'" titlle="" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
      <a href="#" titlle="Aprobar" class="btn btn-sm btn-danger"><i class="fas fa-lock-open"></i></a>
      ';
    })
    ->rawColumns(['pieza','complemento','action'])
    ->make(true);
  }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->input());
      $this->validate($request, [
        'sku_grupo' => 'bail|required|max:200|unique:modulos',
        'tipo_id' => 'required',
        'subtipo_id' => 'required',
        'categoria_id' => 'required',
        'nombre' => 'bail|required|max:200|unique:modulos',
        'descripcion' => 'nullable',
        "saps.*" => 'required',
        "fondos.*" => 'required',
        "espesor_caja_permitido.*" => 'required',
        'ancho_minimo' => 'bail|required',
        'ancho_maximo' => 'bail|required',
        'alto_minimo' => 'bail|required',
        'alto_maximo' => 'bail|required',
        'profundidad_minima' => 'bail|required',
        'profundidad_maxima' => 'bail|required',
      ]);

      $modulo = new Modulo();
      $modulo->sku_grupo = $request->sku_grupo;
      $modulo->tipo_id = $request->tipo_id;
      $modulo->subtipo_id = $request->subtipo_id;
      $modulo->categoria_id = $request->categoria_id;
      $modulo->nombre = $request->nombre;
      $modulo->consecutivo = $request->consecutivo;
      $modulo->descripcion = $request->descripcion;
      $modulo->variantes = $request->variantes;
      $modulo->saps = implode(",",$request->saps);
      $modulo->fondos = implode(",",$request->fondos);
      $modulo->espesor_caja_permitido = implode(",",$request->espesor_caja_permitido);
      $modulo->ancho_minimo = $request->ancho_minimo;
      $modulo->ancho_maximo = $request->ancho_maximo;
      $modulo->ancho_var = $request->ancho_var;
      $modulo->alto_minimo = $request->alto_minimo;
      $modulo->alto_maximo = $request->alto_maximo;
      $modulo->alto_var = $request->alto_var;
      $modulo->profundidad_minima = $request->profundidad_minima;
      $modulo->profundidad_maxima = $request->profundidad_maxima;
      $modulo->profundidad_var = $request->profundidad_var;
      $modulo->created_by =  auth()->id();
      // dd($modulo->id);
      $modulo->save();
      // \App\Http\Controllers\SkuController::makeSkuPadre($modulo->id);
      // dd($modulo->id);
      toast('Registro Actualizado!','success','top-right');
      return redirect()->action('SkuController@makeSkuPadre', ['id' => $modulo->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $modulo = Modulo::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre','aprobado:id,name')
      ->findOrFail($id);
      $saps = Sap::whereIn('id',explode(",",$modulo->saps))->get();
      $fondos = Fondo::whereIn('id',explode(",",$modulo->fondos))->get();

      $piezas = Pieza::with('pieza_modulo:id,tipo_pieza','materiale:id,nombre')->where('modulo_id',$id)->get();
      $descripciones = collect();
      foreach ($piezas as $key => $value) {
        $descripciones->push($value->descripcion);
      }

      $componentes = Complemento::with('categoria:id,nombre')->where('modulo_id',$id)->get();
      $complementos = collect();
      foreach ($componentes as $key => $value) {
        $complementos->push(['nombre' => $value->categoria->nombre, 'cantidad' => $value->cantidad]);
      }

      return view('backend.modulos.show', compact('modulo','saps','fondos','piezas','descripciones','complementos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $modulo = Modulo::findOrFail($id);
        // return $modulo;
      return view('backend.modulos.edit', compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
      $this->validate($request, [
        'sku_grupo' => 'bail|required|max:200|unique:modulos,id,'.$modulo->id,
        'tipo_id' => 'required',
        'subtipo_id' => 'required',
        'categoria_id' => 'required',
        'nombre' => 'bail|required|max:200|unique:modulos,id,'.$modulo->id,
        'descripcion' => 'nullable',
        "saps.*" => 'required',
        "fondos.*" => 'required',
        "espesor_caja_permitido.*" => 'required',
        'ancho_minimo' => 'bail|required',
        'ancho_maximo' => 'bail|required',
        'alto_minimo' => 'bail|required',
        'alto_maximo' => 'bail|required',
        'profundidad_minima' => 'bail|required',
        'profundidad_maxima' => 'bail|required',
      ]);
      // dd($request->input());
      $modulo->sku_grupo = $request->sku_grupo;
      $modulo->tipo_id = $request->tipo_id;
      $modulo->subtipo_id = $request->subtipo_id;
      $modulo->categoria_id = $request->categoria_id;
      $modulo->nombre = $request->nombre;
      $modulo->consecutivo = $request->consecutivo;
      $modulo->descripcion = $request->descripcion;
      $modulo->variantes = $request->variantes;
      $modulo->saps = implode(",",$request->saps);
      $modulo->fondos = implode(",",$request->fondos);
      $modulo->espesor_caja_permitido = implode(",",$request->espesor_caja_permitido);
      $modulo->ancho_minimo = $request->ancho_minimo;
      $modulo->ancho_maximo = $request->ancho_maximo;
      $modulo->ancho_var = $request->ancho_var;
      $modulo->alto_minimo = $request->alto_minimo;
      $modulo->alto_maximo = $request->alto_maximo;
      $modulo->alto_var = $request->alto_var;
      $modulo->profundidad_minima = $request->profundidad_minima;
      $modulo->profundidad_maxima = $request->profundidad_maxima;
      $modulo->profundidad_var = $request->profundidad_var;
      $modulo->updated_by = auth()->id();
      $changes = $modulo->getDirty();
      $modulo->save();
      dd($changes);
      toast('Registro actualizado!','success','top-right');
      return redirect('/backend/modulos');
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
