<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materiale;
use Alert;
use Yajra\DataTables\DataTables;

class MaterialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.materiales.index');
    }

    public function indexData()
    {
        /* Materiales */
        $materiales = Materiale::all();
        return Datatables::of($materiales)
        ->addColumn('action', function ($material) {
            return '<a href="materiales/'.$material->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
        return view('backend.materiales.create');
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
            'sku' => 'nullable',
            'nombre' => 'required|unique:materiales',
        ]);

        Materiale::create($request->all());
        alert()->success('Registro Creado','Nuevo Material');
        return redirect('/backend/materiales');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Materiale::findOrFail($id);
        return view('backend.materiales.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiale $materiale)
    {
        $this->validate($request, [
            'sku' => 'nullable|unique:materiales',
            'nombre' => 'required',
        ]);
        $materiale->sku = $request->sku;
        $materiale->nombre = $request->nombre;
        if($materiale->save()){
            alert()->success('Registro Actualizado','Material Actualizado');
            return redirect('/backend/materiales');
        }
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
