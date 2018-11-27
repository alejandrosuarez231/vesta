<?php

namespace App\Http\Controllers;

use App\Complemento_Modulo;
use Illuminate\Http\Request;
use Alert;
use Yajra\DataTables\DataTables;

class ComplementoModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('backend.modulos.complementos.index');
    }

    public function indexData()
    {
      $complementos = Complemento_Modulo::all();
      return Datatables::of($complementos->all())
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
     * @param  \App\Complemento_Modulo  $complemento_Modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Complemento_Modulo $complemento_Modulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complemento_Modulo  $complemento_Modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Complemento_Modulo $complemento_Modulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complemento_Modulo  $complemento_Modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complemento_Modulo $complemento_Modulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complemento_Modulo  $complemento_Modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complemento_Modulo $complemento_Modulo)
    {
        //
    }
  }
