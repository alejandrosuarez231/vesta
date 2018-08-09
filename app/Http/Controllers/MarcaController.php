<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.marcas.index');
    }

    public function indexData()
    {
        $marcas = Marca::all();
        return Datatables::of($marcas)
        ->editColumn('importada', function(Marca $marca){
            if($marca->importada){
                return '<span class="text-success"><i class="fas fa-check"></i></span>';
            }else {
                return '';
            }
        })
        ->addColumn('action', function ($marca) {
            return '<a href="marcas/'.$marca->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
        return view('backend.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:marcas',
            'acronimo' => 'required|unique:marcas,acronimo',
            'importada' => 'required',
        ]);
        Marca::create($request->all());
        alert()->success('Registro Creado','Nueva Marca');
        return redirect('/backend/marcas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('backend.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
    }
}
