<?php

namespace App\Http\Controllers;

use App\Confpart;
use Illuminate\Http\Request;
use Alert;
use Yajra\DataTables\DataTables;

class ConfpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.confparts.index');
    }

    public function dataIndex()
    {
        $confparts = Confpart::all();
        return Datatables::of($confparts)
        ->addColumn('action', function ($confpart) {
            return '<a href="confparts/'.$confpart->id.'/edit " class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>';
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
        return view('backend.confparts.create');
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
            'nombre' => 'required',
            'valor' => 'required|unique:confparts'
        ]);

        Confpart::create($request->all());
        toast('Registro creado!','success','top-right');
        return redirect('/backend/confparts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Confpart  $confpart
     * @return \Illuminate\Http\Response
     */
    public function show(Confpart $confpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Confpart  $confpart
     * @return \Illuminate\Http\Response
     */
    public function edit(Confpart $confpart)
    {
        return view('backend.confparts.edit', compact('confpart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Confpart  $confpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confpart $confpart)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'valor' => 'required|unique:confparts,valor,'. $confpart->id
        ]);

        $confpart->nombre = $request->nombre;
        $confpart->valor = $request->valor;
        $confpart->save();
        toast('Registro Actualizado!','success','top-right');
        return redirect('/backend/confparts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Confpart  $confpart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Confpart $confpart)
    {
        //
    }
}
