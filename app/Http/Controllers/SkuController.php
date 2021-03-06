<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use App\Subtipo;
use App\Categoria;
use App\Modulo;
use App\Sap;
use App\Fondo;
use App\Skulistado;
use App\Pieza;
use App\Complemento;
use App\Complemento_sku;
use App\Pieza_sku;


class SkuController extends Controller
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

    public function makeSku($tipo_id, $subtipo_id, $categoria_id)
    {
        $tipo = Tipo::findOrFail($tipo_id);
        $subtipo = Subtipo::findOrFail($subtipo_id);
        $categoria = Categoria::findOrFail($categoria_id);
        $sku_base = $tipo->acronimo . $subtipo->acronimo . $categoria->acronimo . "-";
        $searchModulo = Modulo::where('sku_grupo', 'like', $sku_base . '%')->count();
        if( $searchModulo > 0 ){
            $sku_grupo = $sku_base . str_pad(($searchModulo + 1), 2, "0", STR_PAD_LEFT);
        }else {
            $sku_grupo = $sku_base . '01';
        }
        return json_encode($sku_grupo);
    }

    public static function makeSkuPadre($id)
    {
        $modulo = Modulo::findOrFail($id);

        /* Configuracion de Modelos */
        $cantidad_saps = count(explode(",",$modulo->saps));
        $cantidad_fondos = count(explode(",",$modulo->fondos));

        if( ((int) $modulo->saps) == 0 ){
            abort(404);
        }else if( ((int) $modulo->fondos) == 0 ){
            abort(404);
        }

        $skus = collect();

        if($cantidad_saps == 1 && $cantidad_fondos == 1){
            /* Solo un sistema de apertura y un fondo asignado */
            for ($i=0; $i <= $cantidad_fondos - 1 ; $i++) {
                $sisape = Sap::where('id',$modulo->saps)->get();
                $fondotipo = Fondo::where('id',$modulo->fondos)->get();
                $skus->push([
                    'modulo_id' => $modulo->id,
                    'sku_grupo' => $modulo->sku_grupo,
                    'sku_padre' => $modulo->sku_grupo . $sisape->first()->acronimo . $fondotipo->first()->acronimo,
                    'tipo_id' => $modulo->tipo_id,
                    'subtipo_id' => $modulo->subtipo_id,
                    'categoria_id' => $modulo->categoria_id,
                    'descripcion' => NULL,
                    'sap_id' => $modulo->saps,
                    'fondo_id' => $modulo->fondos,
                    'activo' => 1
                ]);
            }
        }else if($cantidad_saps == 1 && $cantidad_fondos > 1){
            /* Solo un sistema de apertura */
            for ($i=0; $i <= $cantidad_fondos - 1; $i++) {
                $sisape = Sap::where('id',$modulo->saps)->get();
                /* Tipos de fondos */
                $fondotipo = Fondo::whereIn('id',explode(",",$modulo->fondos))->get();
                $skus->push([
                    'modulo_id' => $modulo->id,
                    'sku_grupo' => $modulo->sku_grupo,
                    'sku_padre' => $modulo->sku_grupo . $sisape->first()->acronimo . $fondotipo[$i]->acronimo,
                    'tipo_id' => $modulo->tipo_id,
                    'subtipo_id' => $modulo->subtipo_id,
                    'categoria_id' => $modulo->categoria_id,
                    'descripcion' => NULL,
                    'sap_id' => (int) $modulo->saps,
                    'fondo_id' => $fondotipo[$i]->id,
                    'activo' => 1
                ]);
            }
        }else if($cantidad_saps > 1 && $cantidad_fondos == 1){
            /* Solo un fondo asignado */
            for ($i=0; $i <= $cantidad_saps -1 ; $i++) {
                $sisape = Sap::whereIn('id',explode(",",$modulo->saps))->get();
                $fondotipo = Fondo::where('id',$modulo->fondos)->get();
                // dd($sisape,$fondotipo);
                $skus->push([
                    'modulo_id' => $modulo->id,
                    'sku_grupo' => $modulo->sku_grupo,
                    'sku_padre' => $modulo->sku_grupo . $sisape[$i]->acronimo . $fondotipo->first()->acronimo,
                    'tipo_id' => $modulo->tipo_id,
                    'subtipo_id' => $modulo->subtipo_id,
                    'categoria_id' => $modulo->categoria_id,
                    'descripcion' => NULL,
                    'sap_id' => $sisape[$i]->id,
                    'fondo_id' => (int) $modulo->fondos,
                    'activo' => 1
                ]);
            }
            // dd($skus);
        }else if($cantidad_saps > 1 && $cantidad_fondos > 1 && $cantidad_saps == $cantidad_fondos){
            /* saps y fondos iguales pero mayores a 1 */
            for ($i=0; $i <= $cantidad_saps -1 ; $i++) {
                $sisape = Sap::whereIn('id',explode(",",$modulo->saps))->get();
                $fondotipo = Fondo::whereIn('id',explode(",",$modulo->fondos))->get();
                for ($e=0; $e <= count($sisape) -1 ; $e++) {
                    $skus->push([
                        'modulo_id' => $modulo->id,
                        'sku_grupo' => $modulo->sku_grupo,
                        'sku_padre' => $modulo->sku_grupo . $sisape[$e]->acronimo . $fondotipo[$i]->acronimo,
                        'tipo_id' => $modulo->tipo_id,
                        'subtipo_id' => $modulo->subtipo_id,
                        'categoria_id' => $modulo->categoria_id,
                        'descripcion' => NULL,
                        'sap_id' => $sisape[$e]->id,
                        'fondo_id' => $fondotipo[$i]->id,
                        'activo' => 1
                    ]);
                }
            }
        }else if($cantidad_saps > 1 && $cantidad_fondos > 1 && $cantidad_saps > $cantidad_fondos){
            /* Saps mayor que 1 y que fondos */
            for ($i=0; $i <= $cantidad_saps -1 ; $i++) {
                $sisape = Sap::whereIn('id',explode(",",$modulo->saps))->get();
                $fondotipo = Fondo::whereIn('id',explode(",",$modulo->fondos))->get();
                for ($e=0; $e <= $cantidad_fondos - 1 ; $e++) {
                    $skus->push([
                        'modulo_id' => $modulo->id,
                        'sku_grupo' => $modulo->sku_grupo,
                        'sku_padre' => $modulo->sku_grupo . $sisape[$i]->acronimo . $fondotipo[$e]->acronimo,
                        'tipo_id' => $modulo->tipo_id,
                        'subtipo_id' => $modulo->subtipo_id,
                        'categoria_id' => $modulo->categoria_id,
                        'descripcion' => NULL,
                        'sap_id' => $sisape[$i]->id,
                        'fondo_id' => $fondotipo[$e]->id,
                        'activo' => 1
                    ]);
                }
            }
        }else if($cantidad_fondos > 1 && $cantidad_saps > 1 && $cantidad_fondos > $cantidad_saps){
            /* fondo mayor que 1 y que saps*/
            for ($i=0; $i <= $cantidad_fondos -1 ; $i++) {
                $sisape = Sap::whereIn('id',explode(",",$modulo->saps))->get();
                $fondotipo = Fondo::whereIn('id',explode(",",$modulo->fondos))->get();
                for ($e=0; $e <= $cantidad_saps - 1 ; $e++) {
                    $skus->push([
                        'modulo_id' => $modulo->id,
                        'sku_grupo' => $modulo->sku_grupo,
                        'sku_padre' => $modulo->sku_grupo . $sisape[$e]->acronimo . $fondotipo[$i]->acronimo,
                        'tipo_id' => $modulo->tipo_id,
                        'subtipo_id' => $modulo->subtipo_id,
                        'categoria_id' => $modulo->categoria_id,
                        'descripcion' => NULL,
                        'sap_id' => $sisape[$e]->id,
                        'fondo_id' => $fondotipo[$i]->id,
                        'activo' => 1
                    ]);
                }
            }
        }else {
            /* error */
            abort(404);
        }
        /* Evaluar si existen los SKU en el listado de SKUs */
        $list = Skulistado::where('sku_grupo',$modulo->sku_grupo)->get();
        if($list->count() == 0){
            foreach ($skus as $key => $value) {
                $skulistado = Skulistado::create($value);
                // dd($skulistado);
                $piezasLists = Pieza::with('pieza_modulo:id,acronimo')->where('modulo_id',$skulistado->modulo_id)->get();
                if($piezasLists->count() > 0){
                    foreach ($piezasLists as $key => $value){
                        $pieza = new Pieza_sku();
                        $pieza->modulo_id = $value->modulo_id;
                        $pieza->skulistado_id = $skulistado->id;
                        $pieza->piezas_modulo_id = $value->piezas_modulo_id;
                        $pieza->materiale_id = $value->materiale_id;
                        $pieza->descripcion = $value->pieza_modulo->acronimo.'-'.$skulistado->sku_padre;
                        $pieza->cantidad = $value->cantidad;
                        $pieza->largo = $value->largo;
                        $pieza->largo_sup = $value->largo_sup;
                        $pieza->largo_inf = $value->largo_inf;
                        $pieza->ancho = $value->ancho;
                        $pieza->ancho_izq = $value->ancho_izq;
                        $pieza->ancho_der = $value->ancho_der;
                        $pieza->created_by = auth()->id();
                        $pieza->save();
                    }
                }
                $complementosList = Complemento:: with('categoria:id,acronimo')->where('modulo_id',$skulistado->modulo_id)->get();
                if ($complementosList->count() > 0) {
                    foreach ($complementosList as $key => $value) {
                        $complemento = new Complemento_sku();
                        $complemento->modulo_id = $value->modulo_id;
                        $complemento->skulistado_id = $skulistado->id;
                        $complemento->descripcion = $value->categoria->acronimo.'-'.$skulistado->sku_padre;
                        $complemento->categoria_id = $value->categoria_id;
                        $complemento->cantidad = $value->cantidad;
                        $complemento->created_by = auth()->id();
                        $complemento->save();
                    }
                }
            }
            // dd($complementosList,$complemento);
        }

        toast('Registros creados!','success','top-right');
        return redirect()->route('modulos.index');
    }

    public function makeSkuPadreLote()
    {
        if(Skulistado::count() == 0){
            $modulos = Modulo::all();
            foreach ($modulos as $key => $value) {
                self::makeSkuPadre($value->id);
            }
            toast('Registros creados!','success','top-right');
            return redirect('/backend/skus');
        }else {
            return 'Imposible remplazar listado existente';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
