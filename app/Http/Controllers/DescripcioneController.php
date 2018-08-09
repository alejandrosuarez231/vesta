<?php

namespace App\Http\Controllers;

use App\Descripcione;
use Illuminate\Http\Request;
use Alert;
use Yajra\DataTables\DataTables;

class DescripcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexData()
    {
      /* Materiales */
      $descripciones = Descripcione::with('materiale:id,nombre')->get();
      return Datatables::of($descripciones)
      ->addColumn('action', function ($descripcion) {
        return '<a href="materiales/descripciones/'.$descripcion->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
      $subtipos = \App\Subtipo::with('tipo:id,nombre')->get();
      // dd($subtipos->count());
      return view('backend/materiales/descripciones/create', compact('subtipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      dd($request->all());

      $this->validate($request, [
        'sku' => 'nullable',
        'materiale_id' => 'required',
        'descripcion' => 'required',
        'flargo' => 'nullable',
        'fancho' => 'nullable',
        'espesor' => 'nullable'
      ]);

      Descripcione::create($request->all());
      alert()->success('Registro creado','Nuevo Descripcion Registrada');
      return redirect('backend/materiales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Descripcione  $descripcione
     * @return \Illuminate\Http\Response
     */
    public function show(Descripcione $descripcione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Descripcione  $descripcione
     * @return \Illuminate\Http\Response
     */
    public function edit(Descripcione $descripcione)
    {
      $subtipos = App\Subtipo::with('tipo:id,nombre')->get();
      dd($subtipos);
      return view('backend/materiales/descripciones/edit', compact('subtipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Descripcione  $descripcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descripcione $descripcione)
    {
      $this->validate($request, [
        'sku' => 'nullable',
        'materiale_id' => 'required',
        'descripcion' => 'required',
        'flargo' => 'nullable',
        'fancho' => 'nullable',
        'espesor' => 'nullable'
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Descripcione  $descripcione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descripcione $descripcione)
    {
        //
    }
  }
