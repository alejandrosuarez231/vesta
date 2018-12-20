<?php

namespace App\Http\Controllers;

use App\Tablero;
use Illuminate\Http\Request;
use DB;

class TableroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tableros = Tablero::with('categoria:id,nombre','colore:id,nombre,acronimo')->get();
      return view('backend.tableros.index', compact('tableros'));
    }

    public function getEspesoreCaja($espesores)
    {
      $array = explode(",",$espesores);
      $colores = DB::table('tableros')
      ->join('colores','tableros.colore_id','colores.id')
      ->whereIn('espesor',$array)
      ->select('tableros.id',DB::raw('CONCAT(colores.nombre,"-",tableros.espesor) AS color'), 'colores.acronimo')
      ->get();

      $resultados = collect();

      foreach ($colores as $key => $value) {
        $resultados->push([
          'value' => $value->id,
          'item' => $value->color,
          'acronimo' => $value->acronimo
        ]);
      }
      // $resultados = $resultados->pluck('color','id');
      return $resultados;
    }

    public function costoMP($color,$espesor)
    {
      $tableros = Tablero::with('colore:id,nombre')
      ->where('colore_id', $color)
      ->where('espesor', $espesor)
      ->get();
      $resultado = collect();
      foreach ($tableros as $key => $value) {
        $resultado->push([
          'id' => $value->id,
          'color' => $value->colore->nombre,
          'espesor' => $value->espesor,
          'costo' => $value->costo
        ]);
      }
      // dd($color,$espesor,$tableros);
      return $resultado->first();
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
     * @param  \App\Tablero  $tablero
     * @return \Illuminate\Http\Response
     */
    public function show(Tablero $tablero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tablero  $tablero
     * @return \Illuminate\Http\Response
     */
    public function edit(Tablero $tablero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tablero  $tablero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablero $tablero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tablero  $tablero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tablero $tablero)
    {
        //
    }
  }
