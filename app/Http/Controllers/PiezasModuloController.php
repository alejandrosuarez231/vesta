<?php

namespace App\Http\Controllers;

use App\Pieza_modulo;
use Illuminate\Http\Request;
use Alert;
use Yajra\DataTables\DataTables;

class PiezasModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('backend.modulos.piezas.index');
    }

    public function indexData()
    {
      $piezas = Pieza_modulo::with('materiale:id,nombre')->get();
      return Datatables::of($piezas->all())
      ->addColumn('action', function ($pieza) {
        return '<a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
     * @param  \App\Lista_materiales_modulo  $lista_materiales_modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Lista_materiales_modulo $lista_materiales_modulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista_materiales_modulo  $lista_materiales_modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista_materiales_modulo $lista_materiales_modulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lista_materiales_modulo  $lista_materiales_modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista_materiales_modulo $lista_materiales_modulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista_materiales_modulo  $lista_materiales_modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista_materiales_modulo $lista_materiales_modulo)
    {
        //
    }
  }
