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
      ->editColumn('tipos', function(Descripcione $descripcion){
        if($descripcion->tipos){
          return '<span class="badge badge-success">'.$descripcion->tipos.'</span>';
        }
      })
      ->editColumn('subtipos', function(Descripcione $descripcion){
        if($descripcion->subtipos){
          return '<span class="badge badge-success">'.$descripcion->subtipos.'</span>';
        }
      })
      ->addColumn('action', function ($descripcion) {
        return '<a href="materiales/descripciones/'.$descripcion->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
      })
      ->rawColumns(['tipos','subtipos','action'])
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
      $this->validate($request, [
        'sku' => 'nullable',
        'materiale_id' => 'required',
        'descripcion' => 'required|unique:descripciones',
        'flargo' => 'nullable',
        'fancho' => 'nullable',
        'espesor' => 'nullable',
        'tipos.*' => 'required',
        'subtipos.*' => 'required'
      ]);

      $descripcion = new Descripcione;
      $descripcion->tipos = implode(",",$request->tipos);
      $descripcion->subtipos = implode(",",$request->subtipos);
      $descripcion->materiale_id = $request->materiale_id;
      $descripcion->descripcion = $request->descripcion;
      $descripcion->flargo = $request->flargo;
      $descripcion->fancho = $request->fancho;
      $descripcion->espesor = $request->espesor;
      $descripcion->save();
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
      return view('backend/materiales/descripciones/edit', compact('descripcione'));
    }

    public function editData($id)
    {
      $data = Descripcione::findOrFail($id);
      return $data->toJson();
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
      // dd($request->all());
      $this->validate($request, [
        'sku' => 'nullable',
        'materiale_id' => 'required',
        'descripcion' => 'required|unique:descripciones,descripcion,' . $descripcione->id,
        'flargo' => 'nullable',
        'fancho' => 'nullable',
        'espesor' => 'nullable',
        'tipos.*' => 'required',
        'subtipos.*' => 'required'
      ]);

      $descripcione->tipos = implode(",",$request->tipos);
      $descripcione->subtipos = implode(",",$request->subtipos);
      $descripcione->materiale_id = $request->materiale_id;
      $descripcione->descripcion = $request->descripcion;
      $descripcione->flargo = $request->flargo;
      $descripcione->fancho = $request->fancho;
      $descripcione->espesor = $request->espesor;
      $descripcione->save();
      alert()->success('Registro actualizado','Descripcion actualizada');
      return redirect('backend/materiales');

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
