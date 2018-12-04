<?php

namespace App\Http\Controllers;

use App\Pieza;
use App\Pieza_modulo;
use App\Modulo;
use App\Skulistado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PiezaController extends Controller
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
      return abort(404);
    }

    public function createBySku($id)
    {
      $modulo = Modulo::findOrFail($id);
      return view('backend.piezas.create', compact('modulo'));
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
        'modulo_id' => 'bail|required',
        'piezas_modulo_id.*' => 'bail|required',
        'materiale_id.*' => 'required',
        'descripcion' => 'nullable',
        'largo' => 'nullable',
        'largo_sup' => 'nullable',
        'largo_inf' => 'nullable',
        'ancho' => 'nullable',
        'ancho_izq' => 'nullable',
        'ancho_der' => 'nullable',
        'mecanizado1' => 'nullable',
        'mecanizado2' => 'nullable',
        'cantidad' => 'bail|required|min:1'
      ]);

      $modulo = Modulo::findOrFail($request->modulo_id[0]);

      for ($i=0; $i <= count($request->modulo_id) - 1 ; $i++) {
        $acronimo = Pieza_modulo::findOrFail($request->piezas_modulo_id[$i]);
        DB::table('piezas')->insert([
          'modulo_id' => $request->modulo_id[$i],
          'piezas_modulo_id' => $request->piezas_modulo_id[$i],
          'materiale_id' => $request->materiale_id[$i],
          'descripcion' => $acronimo->acronimo . '-' . $modulo->sku_grupo,
          'largo' => $request->largo[$i],
          'largo_sup' => $request->largo_sup[$i],
          'largo_inf' => $request->largo_inf[$i],
          'ancho' => $request->ancho[$i],
          'ancho_izq' => $request->ancho_izq[$i],
          'ancho_der' => $request->ancho_der[$i],
          'mecanizado1' => $request->mecanizado1[$i],
          'mecanizado2' => $request->mecanizado2[$i],
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
     * @param  \App\Pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function show(Pieza $pieza)
    {
      $piezas = Pieza::with('pieza_modulo:id,tipo_pieza,acronimo','materiale:id,nombre','creado:id,name')->where('modulo_id',$pieza->modulo_id)->get();
      // dd($piezas);
      return view('backend.piezas.show', compact('piezas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pieza $pieza)
    {
      $piezas = Pieza::where('modulo_id',$pieza->modulo_id)->get();
      $aprobadas = $piezas->first()->approved_by;
      $modulo = Modulo::findOrFail($pieza->modulo_id);
      return view('backend.piezas.edit', compact('modulo','aprobadas'));
    }

    public function editPiezaData($modulo_id)
    {
      $piezas = Pieza::where('modulo_id', $modulo_id)->get();
      return $piezas;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pieza $pieza)
    {
      dd($request->all());
    }

    public function aprobar($id)
    {
      Pieza::where('modulo_id',$id)
      ->update(['approved_by' => auth()->id(), 'approved_on' => \Illuminate\Support\Carbon::now()]);

      toast('Piezas Aprobadas!','success','top-right');
      return redirect('/backend/modulos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pieza $pieza)
    {
        //
    }
  }
