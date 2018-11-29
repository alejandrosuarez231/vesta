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
      // $this->validate($request, [
      //   'piezas_modulo_id.*' => 'bail|required',
      //   'formula_area.*' => 'bail|required',,
      //   'formula_canto.*' => 'bail|required',,
      //   'canto_largo1.*' => 'nullable',
      //   'canto_largo2.*' => 'nullable',
      //   'canto_ancho1.*' => 'nullable',
      //   'canto_ancho2.*' => 'nullable',
      //   'mecanizado1.*' => 'nullable',
      //   'mecanizado2.*' => 'nullable',
      //   'cantidad.*' => 'bail|required|min:1'
      // ]);
      $skus_padres = Skulistado::where('modulo_id',$request->piezas_modulo_id[0][0])->get();
      $cantidad = $skus_padres->count();

      $data = collect();
      // dd($request->except(['_token']));
      for ($i=0; $i <= $cantidad -1 ; $i++) {
        for ($e=0; $e <= count($request->piezas_modulo_id) - 1 ; $e++) {
          $acronimo = Pieza_modulo::findOrFail($request->piezas_modulo_id[$e]);
          DB::table('piezas')->insert([
            'modulo_id' => $request->modulo_id[$e],
            'piezas_modulo_id' => $request->piezas_modulo_id[$e],
            'materiale_id' => $request->materiale_id[$e],
            'descripcion' => $acronimo->acronimo . '-' . $skus_padres[$i]->sku_padre,
            'largo' => $request->largo[$e],
            'largo_sup' => $request->largo_sup[$e],
            'largo_inf' => $request->largo_inf[$e],
            'ancho' => $request->ancho[$e],
            'ancho_izq' => $request->ancho_izq[$e],
            'ancho_der' => $request->ancho_der[$e],
            'mecanizado1' => $request->mecanizado1[$e],
            'mecanizado2' => $request->mecanizado2[$e],
            'cantidad' => $request->cantidad[$e],
            'created_by' => auth()->id(),
          ]);
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pieza  $pieza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pieza $pieza)
    {
        //
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
        //
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
