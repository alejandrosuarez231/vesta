<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Mtp;
use App\Lista_materiale;
use App\Descripcione;
use App\Producto;
use App\Subtipo;
use Alert;
use Yajra\DataTables\DataTables;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre','saps:id,valor','sars:id,valor')->paginate();
        // dd($proyectos);
        // return $proyectos;
        return view('frontend.proyectos.index', compact('proyectos'));
    }

    public function indexData()
    {
        $proyectos = Proyecto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre','saps:id,valor','sars:id,valor','nombres:id,nombre')->get();
        return DataTables::of($proyectos)
        ->editColumn('sku', function(Proyecto $proyecto){
            if($proyecto->sku){
                return $proyecto->sku;
            }else {
                return ' <span class="text-danger"><i class="fas fa-ban"></i></span>';
            }
        })
        ->editColumn('saps.valor', function(Proyecto $proyecto){
            if($proyecto->saps){
                return $proyecto->saps->valor;
            }else {
                return ' <span class="text-danger"><i class="fas fa-ban"></i></span>';
            }
        })
        ->editColumn('sars.valor', function(Proyecto $proyecto){
            if($proyecto->sars){
                return $proyecto->sars->valor;
            }
        })
        ->addColumn('action', function ($proyecto) {
            return '
            <a href="proyectos/'.$proyecto->id.'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
            <a href="constructor/'.$proyecto->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
            ';
        })
        ->rawColumns(['saps.valor','sars.valor','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre','saps:id,valor','sars:id,valor','nombres:id,nombre')->findOrFail($id);
        // dd($proyecto);
        $mtps = Mtp::with('tipo:id,nombre','subtipo:id,nombre','producto:id,nombre')->where('producto_id','=',$id)->get();
        $materiales = Lista_materiale::with('material:id,nombre','descripcion:id,descripcion')->where('producto_id','=',$id)->get();
        // dd($materiales);
        return view('frontend.proyectos.show', compact('proyecto','mtps','materiales'));
    }

    public function cotizar($id)
    {
        $proyecto = Proyecto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre','saps:id,valor','sars:id,valor','nombres:id,nombre')->findOrFail($id);
        $complementos = Mtp::with('tipo:id,nombre','subtipo:id,nombre','producto:id,nombre')->where('producto_id', $id)->get();
        $complementos_list = collect();
        foreach ($complementos as $value) {
            $complementos_list->push([
                'id' => $value->id,
                'skup' => $proyecto->sku,
                'producto_id' => $value->producto_id,
                'tipo' => $value->tipo->nombre,
                'subtipo' => $value->subtipo->nombre,
                'cantidad' => $value->cantidad
            ]);
        }
        $piezas = Lista_materiale::with('material:id,nombre','descripcion:id,descripcion')->where('producto_id', $id)->get();
        $piezas_list = collect();
        foreach ($piezas as $value) {
            $piezas_list->push([
                'id' => $value->id,
                'skup' => $proyecto->sku,
                'material' => $value->material->nombre ,
                'descripcion' => $value->descripcion->descripcion ,
                'largo' => $value->largo ,
                'alto' => $value->alto ,
                'profundidad' => $value->profundidad ,
                'largo_izq' => $value->largo_izq ,
                'largo_der' => $value->largo_der ,
                'alto_sup' => $value->alto_sup ,
                'alto_inf' => $value->alto_inf ,
                'mec1' => $value->mec1,
                'mec2' => $value->mec2,
                'cantidad' => $value->cantidad ,
            ]);
        }

        $gavetas_cant = Lista_materiale::where('producto_id', $id)->where('material_id',7)->count();

        /* Data compuesta */
        $data = collect(['proyecto' => $proyecto, 'complementos' => $complementos_list, 'piezas' => $piezas_list, 'gavetas_cant' => $gavetas_cant]);
        return $data->toJson();
    }

    public function gavetas()
    {
        $gavetas_proyectos = SubTipo::where('tipo_id',3)->get();
        $gavetas = collect();

        foreach ($gavetas_proyectos as $value) {
            $gavetas->push([
                'value' => $value->id,
                'label' => str_replace('Correderas ','',$value->nombre)
            ]);
        }
        return $gavetas->toJson();
    }

    public function bisagras()
    {
        $bisagras_proyectos = SubTipo::where('tipo_id',1)->get();
        $bisagras = collect();
        foreach ($bisagras_proyectos->sortBy('nombre') as $value) {
            $bisagras->push([
                'value' => $value->id,
                'label' => str_replace('Bisagras ','',$value->nombre)
            ]);
        }

        return $bisagras->toJson();
    }

    public function tiradores()
    {
        $tirador_proyecto = Producto::with('marca:id,nombre')->where('tipo_id',9)->where('subtipo_id',39)->get();
        // dd($tirador_proyecto);

        $tiradores = collect();
        foreach ($tirador_proyecto as $value) {
            $tiradores->push([
                'value' => $value->id,
                'label' => $value->nombre . ' : ' . $value->marca->nombre,
                'sku' => $value->sku
            ]);
        }

        return $tiradores->toJson();
    }

    public function marcasHerrajes($tipo, $subtipo, $extra)
    {
        $marcas_proyectos = Producto::with('marca:id,nombre')
        ->where('tipo_id',$tipo)
        ->where('subtipo_id', $subtipo)
        ->where('extra_id', $extra)
        ->get();

        $marcas = collect();
        foreach ($marcas_proyectos as $value) {
            $marcas->push([
                'value' => $value->id,
                'label' => $value->marca->nombre,
                'sku' => $value->sku
            ]);
        }

        return $marcas->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
