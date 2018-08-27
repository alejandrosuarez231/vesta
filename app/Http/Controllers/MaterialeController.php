<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materiale;
use App\Tipo;
use App\Subtipo;
use Alert;
use Yajra\DataTables\DataTables;

class MaterialeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.materiales.index');
    }

    public function indexData()
    {
        /* Materiales */
        $materiales = Materiale::all();
        return Datatables::of($materiales)
        ->editColumn('tipos', function(Materiale $material){
            $output = null;
            $tipos = Tipo::whereIn('id',explode(',',$material->tipos))->get();
            foreach ($tipos as $key => $value) {
                $output .= '<span class="badge badge-info mr-1">'. $value->nombre .'</span>';
            }
            return $output;
      })
        ->editColumn('subtipos', function(Materiale $material){
            $output = null;
            $subtipos = Subtipo::whereIn('id',explode(',',$material->subtipos))->get();
            foreach ($subtipos as $key => $value) {
                $output .= '<span class="badge badge-info mr-1">'. $value->nombre .'</span>';
            }
            return $output;
      })
        ->addColumn('action', function ($material) {
            return '<a href="materiales/'.$material->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
        })
        ->rawColumns(['tipos','subtipos','action'])
        ->make(true);
    }

    public function setMaterial($tipo, $subtipo)
    {
        /* Filtrar materiales */
        $materiales = Materiale::where('tipos','like','%'.$tipo.'%')->where('subtipos','like','%'.$subtipo.'%')->get();
        $coleccion = collect();
        foreach ($materiales as $value) {
            $coleccion->push(['label' => $value->nombre, 'value' => $value->id]);
        }
        return $coleccion->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.materiales.create');
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
            'tipos.*' => 'required',
            'subtipos.*' => 'required',
            'sku' => 'nullable',
            'nombre' => 'required|unique:materiales',
        ]);

        $material = new Materiale;
        $material->tipos = implode(",",$request->tipos);
        $material->subtipos = implode(",",$request->subtipos);
        $material->sku = $request->sku;
        $material->nombre = $request->nombre;
        $material->save();

        toast('Registro creado!','success','top-right');
        return redirect('/backend/materiales');
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
        $material = Materiale::findOrFail($id);
        return view('backend.materiales.edit', compact('material'));
    }

    public function editData($id)
    {
      $data = Materiale::findOrFail($id);
      return $data->toJson();
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiale $materiale)
    {
        // dd($request->all(),$materiale);
        $this->validate($request, [
            'tipos.*' => 'required',
            'subtipos.*' => 'required',
            'sku' => 'nullable',
            'nombre' => 'required|unique:materiales,nombre,' . $materiale->id,
        ]);

        $materiale->tipos = implode(",",$request->tipos);
        $materiale->subtipos = implode(",",$request->subtipos);
        $materiale->sku = $request->sku;
        $materiale->nombre = $request->nombre;
        $materiale->save();

        toast('Registro actualizado!','success','top-right');
        return redirect('/backend/materiales');
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
