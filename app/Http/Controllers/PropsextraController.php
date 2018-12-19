<?php

namespace App\Http\Controllers;

use App\Propsextra;
use App\Extra;
use App\Tipo;
use App\Subtipo;
use Illuminate\Http\Request;
use Alert;

class PropsextraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $propsextra = Propsextra::with('tipo:id,nombre','subtipo:id,nombre','extra:id,propiedad')->where('extra_id',$id)->get();
      if($propsextra->count() > 0){
        return view('backend.extras.extras', compact('propsextra'));
      }else {
        alert()->warning('Sin Elementos que mostrar');
        return redirect('backend/extras');
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $extra = Extra::where('id',$request->id)->get();
      return view('backend.extras.asignar', compact('extra'));
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
            'tipo_id' => 'required',
            'subtipo_id' => 'required',
            'extra_id' => 'required'
        ]);
        $set = new Propsextra;
        $set->tipo_id = $request->tipo_id;
        $set->subtipo_id = $request->subtipo_id;
        $set->extra_id = $request->extra_id;
        $set->save();

        alert()->success('Registro Creado','Prop. Extra asignada');
        return redirect('/backend/extras');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Propsextra  $propsextra
     * @return \Illuminate\Http\Response
     */
    public function show(Propsextra $propsextra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propsextra  $propsextra
     * @return \Illuminate\Http\Response
     */
    public function edit(Propsextra $propsextra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propsextra  $propsextra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propsextra $propsextra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propsextra  $propsextra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propsextra $propsextra)
    {
        //
    }
  }
