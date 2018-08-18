<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Mtp;
use App\Lista_materiale;
use Alert;
use Yajra\DataTables\DataTables;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre','saps:id,valor','sars:id,valor')->paginate();
        // dd($proyectos);
        // return $proyectos;
        return view('frontend.proyectos.index', compact('proyectos'));
    }

    public function indexData()
    {
        $proyectos = Proyecto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre','saps:id,valor','sars:id,valor')->get();
        return DataTables::of($proyectos)
        ->editColumn('sku', function(Proyecto $proyecto){
        if($proyecto->sku){
          return $proyecto->sku;
        }
      })
        ->addColumn('action', function ($proyecto) {
            return '
            <a href="proyectos/'.$proyecto->id.'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
            <a href="constructor/'.$proyecto->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
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
        $proyecto = Proyecto::findOrFail($id);
        // dd($proyecto);
        $mtps = Mtp::with('tipo:id,nombre','subtipo:id,nombre','producto:id,nombre')->where('producto_id','=',$id)->get();
        $materiales = Lista_materiale::with('material:id,nombre','descripcion:id,descripcion')->where('producto_id','=',$id)->get();
        // dd($materiales);
        return view('frontend.proyectos.show', compact('proyecto','mtps','materiales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
