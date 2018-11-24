<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulo;
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
      $modulos = Modulo::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre')->get();
      // dd($modulos->take(10));
      return Datatables::of($modulos)
      ->addColumn('action', function ($modulo) {
        return '
            <a href="modulos/'.$modulo->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            <a href="modulos/'.$modulo->id.'" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
            <a href="/backend/skus/'.$modulo->id.'" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
            ';
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
        //
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
