<?php

namespace App\Http\Controllers;

use App\Complemento;
use App\Modulo;
use App\Pieza;
use App\Skulistado;
use App\Complemento_Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.complementos.create');
    }

    public function createBySku($id)
    {
      $piezas = Pieza::with('pieza_modulo:id,tipo_pieza','materiale:id,nombre')->where('modulo_id',$id)->get();
      $piezas_modulo = $piezas->groupBy('descripcion')->first();
      $modulo = Modulo::findOrFail($id);
      return view('backend.complementos.create', compact('modulo','piezas_modulo'));
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
        'modulo_id.*' => 'bail|required',
        'categoria_id.*' => 'bail|required',
        'cantidad.*' => 'bail|required|min:1'
      ]);

      for ($i=0; $i <= count($request->modulo_id) - 1 ; $i++) {
        DB::table('complementos')->insert([
          'modulo_id' => $request->modulo_id[$i],
          'producto' => null,
          'categoria_id' => $request->categoria_id[$i],
          'cantidad' => $request->cantidad[$i],
          'created_by' => auth()->id(),
        ]);
      }

      toast('Registros creado!','success','top-right');
      return redirect('/backend/modulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function show(Complemento $complemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function edit(Complemento $complemento)
    {
      $modulo = $complemento->modulo_id;
      return view('backend.complementos.edit', compact('modulo'));
    }

    public function editComplementoData($modulo_id)
    {
      $complementos = Complemento::where('modulo_id',$modulo_id)->get();
      return $complementos;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complemento $complemento)
    {
        //
    }

    public function aprobar($id)
    {
      Complemento::where('modulo_id',$id)
      ->update(['approved_by' => auth()->id(), 'approved_on' => \Illuminate\Support\Carbon::now()]);

      toast('Complementos Aprobados!','success','top-right');
      return redirect('/backend/modulos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complemento $complemento)
    {
        //
    }
  }
