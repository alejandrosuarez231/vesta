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
        return '<a href="piezas/'.$pieza->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
      return view('backend.modulos.piezas.create');
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
        'tipo_pieza' => 'bail|required|unique:piezas_modulos|max:200',
        'materiale_id' => 'bail|required',
        'acronimo' => 'bail|required',
        'formula_area' => 'nullable',
        'formula_canto' => 'nullable',
        'canto_largo1' => 'nullable',
        'canto_largo2' => 'nullable',
        'canto_ancho1' => 'nullable',
        'canto_ancho2' => 'nullable',
        'costo' => 'nullable',
      ]);

      Pieza_modulo::create($request->except(['_method','_token']));
      toast('Registro creado!','success','top-right');
      return redirect('/backend/modulos/piezas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pieza_modulo  $Pieza_modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Pieza_modulo $pieza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pieza_modulo  $Pieza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pieza_modulo $pieza)
    {
      return view('backend.modulos.piezas.edit', compact('pieza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pieza_modulo  $Pieza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pieza_modulo $pieza)
    {
      // dd($request->except(['_method','_token']), $pieza->id);
      $this->validate($request, [
        'tipo_pieza' => 'bail|required|max:200|unique:piezas_modulos,id,'.$pieza->id,
        'materiale_id' => 'bail|required',
        'acronimo' => 'bail|required',
        'formula_area' => 'nullable',
        'formula_canto' => 'nullable',
        'canto_largo1' => 'nullable',
        'canto_largo2' => 'nullable',
        'canto_ancho1' => 'nullable',
        'canto_ancho2' => 'nullable',
        'costo' => 'nullable'
      ]);
      Pieza_modulo::where('id',$pieza->id)->update($request->except(['_method','_token']));
      toast('Registro Actualizado!','success','top-right');
      return redirect('/backend/modulos/piezas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pieza_modulo  $Pieza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pieza_modulo $pieza)
    {
        //
    }
  }
