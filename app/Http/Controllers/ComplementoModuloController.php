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
      ->addColumn('action', function ($complemento) {
        return '<a href="complementos/'.$complemento->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
      return view('backend.modulos.complementos.create');
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
        'tipo_id' => 'nullable',
        'subtipo_id' => 'nullable',
        'nombre' => 'bail|required|max:200|unique:complemento_modulos',
        'costo' => 'nullable'
      ]);
      Complemento_Modulo::create($request->except(['_method','_token']));
      toast('Registro Actualizado!','success','top-right');
      return redirect('/backend/modulos/complementos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complemento_Modulo  $complemento
     * @return \Illuminate\Http\Response
     */
    public function show(Complemento_Modulo $complemento)
    {
        //
    }

    public function getCosto($id)
    {
      $complementos = Complemento_Modulo::findOrFail($id);
      return $complementos->costo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complemento_Modulo  $complemento
     * @return \Illuminate\Http\Response
     */
    public function edit(Complemento_Modulo $complemento)
    {
      return view('backend.modulos.complementos.edit', compact('complemento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complemento_Modulo  $complemento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complemento_Modulo $complemento)
    {
      // dd($request->except(['_method','_token']), $complemento->id);
      $this->validate($request, [
        'tipo_id' => 'nullable',
        'subtipo_id' => 'nullable',
        'nombre' => 'bail|required|max:200|unique:complemento_modulos,id,'.$complemento->id,
        'costo' => 'nullable'
      ]);
      Complemento_Modulo::where('id',$complemento->id)->update($request->except(['_method','_token']));
      toast('Registro Actualizado!','success','top-right');
      return redirect('/backend/modulos/complementos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complemento_Modulo  $complemento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complemento_Modulo $complemento)
    {
        //
    }
  }
