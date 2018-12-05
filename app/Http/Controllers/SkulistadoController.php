<?php

namespace App\Http\Controllers;

use App\Skulistado;
use App\Modulo;
use App\Sap;
use App\Fondo;
use Illuminate\Http\Request;
Use Alert;
use Yajra\DataTables\DataTables;

class SkulistadoController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $skulists = Skulistado::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre','sap:id,valor','fondo:id,valor')->get();
    return view('backend.skus.index', compact('skulists'));
  }

  public function indexData()
  {
    $skus = Skulistado::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre','sap:id,valor','fondo:id,valor')->get();
    return Datatables::of($skus)
    ->editColumn('activo', function($skus){
      if($skus->activo == 1){
        return '<span class="text-success"><i class="fas fa-check-circle"></i></span>';
      }else {
        return '<span class="text-danger"><i class="fas fa-circle"></i></span>';
      }
    })
    ->addColumn('action', function ($skus) {
      return '
      <a href="skus/'.$skus->id.'/edit " titlle="Editar" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
      <a href="/backend/skus/showList/'.$skus->id.'" titlle="" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
      ';
    })
    ->rawColumns(['activo', 'action'])
    ->make(true);
  }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skulistado  $skulistado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      dd($id);
    }

    public function showList($sku_grupo)
    {
      // dd($sku_grupo);
      $lista = Skulistado::where('modulo_id',$sku_grupo)->get();
      dd($lista);
      return view('backend.skus.showList', compact('lista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skulistado  $skulistado
     * @return \Illuminate\Http\Response
     */
    public function edit(Skulistado $skulistado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skulistado  $skulistado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skulistado $skulistado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skulistado  $skulistado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skulistado $skulistado)
    {
        //
    }
  }
