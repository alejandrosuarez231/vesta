<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Mtp;
use App\Lista_materiale;
use App\Descripcione;
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
        $piezas = Lista_materiale::with('material:id,nombre','descripcion:id,descripcion')->where('producto_id', $id)->get();

        $gavetas_cant = Lista_materiale::where('producto_id', $id)->where('material_id',7)->count();

        /* Data compuesta */
        $data = collect(['proyecto' => $proyecto, 'complementos' => $complementos, 'piezas' => $piezas, 'gavetas_cant' => $gavetas_cant]);
        return $data->toJson();
    }

    public function gavetas($tipo)
    {
        $gavetas_proyectos = Proyecto::with('tipo:id,nombre,tipologia','subtipo:id,nombre','unidad:id,nombre','saps:id,valor','sars:id,valor','nombres:id,nombre')
        ->where('tipo_id', $tipo)
        ->where('subtipo_id',46)
        ->get();

        $gavetas = collect();

        foreach ($gavetas_proyectos as $value) {
            $gavetas->push([
                'value' => $value->id,
                'label' => $value->descripcion,
                'sku' => $value->sku
            ]);
        }
        return $gavetas->toJson();
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
