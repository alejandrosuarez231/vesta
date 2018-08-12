<?php

namespace App\Http\Controllers;
use App\Unidad;
use Illuminate\Http\Request;
Use Alert;
use Yajra\DataTables\DataTables;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.unidades.index');
    }

    public function indexData(){
      $unidades = Unidad::all();
      return Datatables::of($unidades)
      ->addColumn('action', function ($unidad) {
        return '<a href="unidades/'.$unidad->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
        return view('backend.unidades.create');
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
            'acronimo' => 'required|unique:unidades',
            'nombre' => 'required|unique:unidades',
        ]);

        $unidad = new Unidad;
        $unidad->acronimo = $request->acronimo;
        $unidad->nombre = $request->nombre;
        $unidad->save();
        toast('Registro creado!','success','top-right');
        return redirect('/backend/unidades');
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
        $unidad = Unidad::findOrFail($id);
        return view('backend.unidades.edit', compact('unidad'));
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
        // dd($id);
        $this->validate($request, [
            'acronimo' => 'required|unique:unidades,acronimo,' . $id,
            'nombre' => 'required|unique:unidades,nombre,' . $id,
        ]);
        $unidad = Unidad::findOrFail($id);
        $unidad->acronimo = $request->acronimo;
        $unidad->nombre = $request->nombre;
        $unidad->save();
        toast('Registro actualizado!','success','top-right');
        return redirect('/backend/unidades');
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
