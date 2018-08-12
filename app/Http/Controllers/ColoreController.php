<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colore;
use Alert;
use Yajra\DataTables\DataTables;

class ColoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.colores.index');
    }

    public function indexData()
    {
        $colores = Colore::all();
        return Datatables::of($colores)
        // ->editColumn('importada', function(Marca $marca){
        //     if($marca->importada){
        //         return '<span class="text-success"><i class="fas fa-check"></i></span>';
        //     }else {
        //         return '';
        //     }
        // })
        ->addColumn('action', function ($color) {
            return '<a href="colores/'.$color->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
        return view('backend.colores.create');
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
            'nombre' => 'required|unique:colores,nombre',
        ]);
        Colore::create($request->all());
        toast('Registro creado!','success','top-right');
        return redirect('/backend/colores');


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
        $color = Colore::findOrFail($id);
        return view('backend.colores.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colore $colore)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:colores,nombre,' . $colore->id,
        ]);
        $colore->nombre = $request->nombre;
        $colore->save();
        toast('Registro actualizado!','success','top-right');
        return redirect('/backend/colores');
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
