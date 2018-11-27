<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulo;
use App\Skulistado;
use App\Sap;
use App\Fondo;
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
      $modulos = Modulo::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre','sap:id,valor','fondo:id,valor')->get();
      return Datatables::of($modulos)
      ->editColumn('saps', function(Modulo $modulo){
        return $modulo->saps;
    })
      ->addColumn('action', function ($modulo) {
        return '
        <a href="modulos/'.$modulo->id.'/edit " titlle="Editar" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
        <a href="modulos/'.$modulo->id.'" titlle="" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
        ';
    })
      ->rawColumns(['action'])
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
        dd($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modulo = Modulo::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre')
        ->findOrFail($id);
        $saps = Sap::whereIn('id',explode(",",$modulo->saps))->get();
        // dd($modulo->fondos);
        $fondos = Fondo::whereIn('id',explode(",",$modulo->fondos))->get();
        // dd($fondos);
        // dd($modulo,$saps->implode('valor',', '),$fondos->implode('valor',', '));
        return view('backend.modulos.show', compact('modulo','saps','fondos'));
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
        $modulo->espesor_caja_permitido = $request->espesor_caja_permitido;
        $modulo->ancho_minimo = $request->ancho_minimo;
        $modulo->ancho_maximo = $request->ancho_maximo;
        $modulo->ancho_var = $request->ancho_var;
        $modulo->alto_minimo = $request->alto_minimo;
        $modulo->alto_maximo = $request->alto_maximo;
        $modulo->alto_var = $request->alto_var;
        $modulo->profundidad_minima = $request->profundidad_minima;
        $modulo->profundidad_maxima = $request->profundidad_maxima;
        $modulo->profundidad_var = $request->profundidad_var;
        $modulo->save();
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
