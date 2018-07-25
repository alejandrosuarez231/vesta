<?php

namespace App\Http\Controllers;
use App\Tipo;
use App\Codigo;
use Illuminate\Http\Request;
Use Alert;
use Yajra\DataTables\Facades\Datatables;
// use yajra\Datatables\Facades\Datatables;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Dataables::eloquent(Tipo::query())->make(true);
        // return datatables()->of(Tipo::query())->toJson();
        $tipos = Tipo::orderBy('nombre')->paginate();
        return view('backend.tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!isset($request->padre)){
            /* Crear Base SKU */
            $this->validate($request, [
                'tipologia' => 'required',
                'acromtip' => 'required',
                'nombre' => 'required',
                'acronimo' => 'required',
            ]);

            $tipo = Tipo::create($request->all());
            // dd($request->all());
            $skubase = new Codigo;
            $skubase->tipo_id = $tipo->id;
            $skubase->subtipo_id = 0;
            $skubase->skubase = $tipo->acromtip.$tipo->acronimo;
            $skubase->numeracion = 1;
            $skubase->save();

            alert()->success('Registro Creado','Nuevo Tipo + Base SKU 1');
            return redirect('/backend/tipos');
        }else {
            $this->validate($request, [
                'tipologia' => 'required',
                'acromtip' => 'required',
                'nombre' => 'required',
                'acronimo' => 'required',
            ]);
            Tipo::create($request->all());
            alert()->success('Registro Creado','Nuevo Tipo');
            return redirect('/backend/tipos');
        }
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
        $tipo = Tipo::findOrFail($id);
        return view('backend.tipos.edit', compact('tipo'));
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
        $tipo = Tipo::findOrFail($id);
        $tipo->tipologia = $request->tipo;
        $tipo->padre = $request->padre;
        $tipo->nombre = $request->nombre;
        $tipo->acronimo = $request->acronimo;
        $tipo->save();
        alert()->success('Registro Actualizado','Tipo Actualizada');
        return redirect('/backend/tipos');
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
