<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Alert;
use Yajra\DataTables\DataTables;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categorias.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexData()
    {
        $categorias = Categoria::all();
        return Datatables::of($categorias->all())
        ->addColumn('action', function ($categoria) {
            return '<a href="categorias/'.$categoria->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
        })
        ->make(true);
    }

    public function searchCategoriaSkulistados()
    {
        $skulistados = \App\Skulistado::with('categoria')->select('categoria_id')->groupby('categoria_id')->get();
        $categorias = collect();
        foreach ($skulistados as $key => $value) {
            $categorias->push(['label' => $value->categoria->nombre, 'value' => $value->categoria_id]);
        }
        return $categorias;
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
        //
    }

    public function categoriasFiltro($subtipo){
        $categoria = Categoria::where('subtipo_id',$subtipo)->get();
        $categoriaList = collect();
        foreach ($categoria as $key => $value) {
            $categoriaList->push(['label' => $value->nombre, 'value' => $value->id, 'subtext' => $value->subtipo_id]);
        }
        return $categoriaList->toJson();
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
