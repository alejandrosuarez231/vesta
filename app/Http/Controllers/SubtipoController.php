<?php

namespace App\Http\Controllers;
use App\Subtipo;
use App\Tipo;
use App\Codigo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

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

    public function subtiposFiltro($tipos){
        $subtipos = Subtipo::with('tipo:id,nombre')->whereIn('tipo_id',explode(',',$tipos))->get();
        $subtiposList = collect();
        foreach ($subtipos as $key => $value) {
            $subtiposList->push(['label' => $value->nombre, 'value' => $value->id, 'subtext' => $value->tipo->nombre]);
        }
        return $subtiposList->toJson();
    }

    public function subtiposAll()
    {
        return Subtipo::select('id','tipo_id','nombre')->get()->toJson();
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
            'nombre' => 'required|unique:subtipos',
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

        toast('Registro Creado!','success','top-right');
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
    public function update(Request $request, Subtipo $subtipo)
    {
        // dd($request->all());
        $request->validate([
            'tipo_id' => 'required',
            'nombre' => 'required|unique:subtipos,nombre,' . $subtipo->id,
            'acronimo' => 'required',
            'ancho' => 'nullable',
            'largo' => 'nullable',
            'espesor' => 'nullable',
            'color' => 'nullable'
        ]);

        $subtipo->tipo_id = $request->tipo_id;
        $subtipo->nombre = $request->nombre;
        $subtipo->acronimo = $request->acronimo;
        $subtipo->ancho = $request->ancho;
        $subtipo->largo = $request->largo;
        $subtipo->espesor = $request->espesor;
        $subtipo->color = $request->color;
        $subtipo->save();

        toast('Registro Actualizado!','success','top-right');
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
        $subtipo = Subtipo::findOrFail($id);
        $subtipo->delete();
    }

    public function mtpsubtipos($tipo)
    {
        $subtipos = Subtipo::where('tipo_id','=',$tipo)->get();
        $coleccion = collect();
        foreach ($subtipos as $key => $value) {
            $coleccion->push(['label' => $value->nombre, 'value' => $value->id]);
        }
        return $coleccion->toJson();
    }

    public function subtipos($tipo)
    {
        return Subtipo::where('tipo_id','=',$tipo)->pluck('nombre','id');
    }
}
