<?php

namespace App\Http\Controllers;

use App\Confmat;
use App\Producto;
use Illuminate\Http\Request;
use Alert;
use Yajra\DataTables\DataTables;

class ConfmatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.confmats.index');
    }

    public function dataIndex()
    {
        $confmats = Confmat::with('materiale:id,nombre')->get();
        return Datatables::of($confmats)
        ->editColumn('productos', function(Confmat $confmat){
            $output = null;
            $productos = Producto::whereIn('id',explode(',',$confmat->productos))->get();
            foreach ($productos as $key => $value) {
                $output .= '<span class="badge badge-info mr-1">'. $value->nombre .'</span>';
            }
            return $output;
      })
        ->addColumn('action', function ($confmat) {
            return '<a href="confmats/'.$confmat->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
        })
        ->rawColumns(['productos','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.confmats.create');
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
            'materiale_id' => 'required',
            'productos.*' => 'required'
        ]);

        $confmat= new Confmat;
        $confmat->materiale_id = $request->materiale_id;
        $confmat->productos = implode(",",$request->productos);
        $confmat->save();

        toast('Registro creado!','success','top-right');
        return redirect('/backend/confmats');
    }

    public function cotizar($material)
    {
        $confmats = Confmat::where('materiale_id',$material)->get();
        $productos = Producto::whereIn('id', explode(',', $confmats->first()->productos))->get();

        $listado = collect();
        foreach ($productos as $value) {
            $listado->push([
                'label' => $value->nombre,
                'value' => $value->id,
                'sku' => $value->sku,
                'ancho' => $value->ancho,
                'largo' => $value->largo,
                'espesor' => $value->espesor,
                'extra' => $value->extra_id,
                'color' => $value->color_id
            ]);
        }
        return $listado;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Confmat  $confmat
     * @return \Illuminate\Http\Response
     */
    public function show(Confmat $confmat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Confmat  $confmat
     * @return \Illuminate\Http\Response
     */
    public function edit(Confmat $confmat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Confmat  $confmat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confmat $confmat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Confmat  $confmat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Confmat $confmat)
    {
        //
    }
}
