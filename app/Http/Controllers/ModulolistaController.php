<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulo;
use Alert;
use Yajra\DataTables\DataTables;
use DB;

class ModulolistaController extends Controller
{
    public function index()
    {
        return view('frontend.moduloslista.index');
    }

    public function indexData()
    {
      $modulos = Modulo::with('tipo:id,nombre','subtipo:id,nombre','categoria:id,nombre')->get();
      return Datatables::of($modulos)
      ->addColumn('action', function ($modulo) {
        return '
            <a href="moduloslista/'.$modulo->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            <a href="moduloslista/'.$modulo->id.'" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modulo = Modulo::findOrFail($id);
        return $modulo;
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
        return view('frontend.moduloslista.edit', compact('modulo'));
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
