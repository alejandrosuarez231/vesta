<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;
use Alert;
use Yajra\DataTables\DataTables;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.modulos.index');
    }

    public function indexData()
    {
        $modulos = Modulo::all();
        return Datatables::of($modulos)
        ->addColumn('action', function ($modulo) {
            return '<a href="modulos/'.$modulo->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
        return view('backend.modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'tipos.*' => 'required',
            'subtipos.*' => 'required',
            'sar.*' => 'required',
            'nombre' => 'required',
            'numerologia' => 'required',
        ]);

        $modulo = new Modulo;
        $modulo->tipos = implode(',',$request->tipos);
        $modulo->subtipos = implode(',',$request->subtipos);
        $modulo->sar = implode(',',$request->sar);
        $modulo->nombre = $request->nombre;
        $modulo->numerologia = $request->numerologia;
        $modulo->save();
        toast('Registro creado!','success','top-right');
        return redirect('/backend/modulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        //
    }

    public function modulosContructor($tipos,$subtipos)
    {
        $modulos = Modulo::where('tipos','like','%'.$tipos.'%')
        ->where('subtipos','like','%'.$subtipos.'%')
        ->get();

        $nombres = collect();
        foreach ($modulos as $key => $value) {
            $nombres->push(['label' => $value->nombre, 'value' => $value->id, 'sar' => $value->sar, 'numerologia' => str_pad($value->numerologia, 2, '0', STR_PAD_LEFT)]);
        }

        return $nombres->toJson();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        return view('backend.modulos.edit', compact('modulo'));
    }

    public function editData($id)
    {
        $data = Modulo::findOrFail($id);
        return $data->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
        $modulo->tipos = implode(',',$request->tipos);
        $modulo->subtipos = implode(',',$request->subtipos);
        $modulo->sar = implode(',',$request->sar);
        $modulo->nombre = $request->nombre;
        $modulo->numerologia = $request->numerologia;
        $modulo->save();

        toast('Registro actualizado!','success','top-right');
        return redirect('/backend/modulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        //
    }
}
