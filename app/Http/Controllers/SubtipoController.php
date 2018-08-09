<?php

namespace App\Http\Controllers;
use App\Subtipo;
use App\Tipo;
use App\Codigo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubtipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.subtipos.index');
    }

    public function indexData()
    {
        $subtipos = Subtipo::with('tipo:id,nombre')->get();
        return Datatables::of($subtipos)
        ->editColumn('ancho', function(Subtipo $subtipo){
            if($subtipo->ancho){
              return '<span class="text-success"><i class="fas fa-check"></i></span>';
          }
      })
        ->editColumn('largo', function(Subtipo $subtipo){
            if($subtipo->largo){
              return '<span class="text-success"><i class="fas fa-check"></i></span>';
          }
      })
        ->editColumn('espesor', function(Subtipo $subtipo){
            if($subtipo->espesor){
              return '<span class="text-success"><i class="fas fa-check"></i></span>';
          }
      })
        ->editColumn('color', function(Subtipo $subtipo){
            if($subtipo->color){
              return '<span class="text-success"><i class="fas fa-check"></i></span>';
          }
      })
        ->addColumn('action', function ($subtipo) {
            return '<a href="subtipos/'.$subtipo->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
        })
        ->rawColumns(['ancho','largo','espesor','color','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subtipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'tipo_id' => 'required',
            'nombre' => 'required',
            'acronimo' => 'required',
            'ancho' => 'nullable',
            'largo' => 'nullable',
            'espesor' => 'nullable',
            'color' => 'nullable'
        ]);

        $subtipos = new Subtipo;
        $subtipos->tipo_id = $request->tipo_id;
        $subtipos->nombre = $request->nombre;
        $subtipos->acronimo = $request->acronimo;
        $subtipos->ancho = $request->ancho;
        $subtipos->largo = $request->largo;
        $subtipos->espesor = $request->espesor;
        $subtipos->color = $request->color;
        $subtipos->save();

        $tipo = Tipo::find($subtipos->tipo_id);

        /* Crear SkU Base */
        $skubase = new Codigo;
        $skubase->tipo_id = $tipo->id;
        $skubase->subtipo_id = $subtipos->id;
        $skubase->skubase = $tipo->acromtip.$tipo->acronimo.$subtipos->acronimo;
        $skubase->numeracion = 1;
        $skubase->save();

        alert()->success('Registro Creado','Sub-tipo Nueva');
        return redirect('/backend/subtipos');
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
        $subtipo = Subtipo::findOrFail($id);
        return view('backend.subtipos.edit', compact('subtipo'));
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
        // dd($request->all());
        $request->validate([
            'tipo_id' => 'required',
            'nombre' => 'required',
            'acronimo' => 'required',
            'ancho' => 'nullable',
            'largo' => 'nullable',
            'espesor' => 'nullable',
            'color' => 'nullable'
        ]);
        // dd($request->all());
        $subtipo = Subtipo::findOrFail($id);
        $subtipo->update([
            'tipo_id' => $request->tipo_id,
            'nombre' => $request->nombre,
            'acronimo' => $request->acronimo,
            'ancho' => $request->ancho,
            'largo' => $request->largo,
            'espesor' => $request->espesor,
            'color' => $request->color
        ]);

        alert()->success('Registro Actualizado','Sub-tipo Actualizada');
        return redirect('/backend/subtipos');
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

    public function subtipos($tipo)
    {
        return Subtipo::where('tipo_id','=',$tipo)->pluck('nombre','id');
    }
}
