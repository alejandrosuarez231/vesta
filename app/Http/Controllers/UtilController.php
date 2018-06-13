<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordendecompra;
use App\Ordendecompradetalle;
use Alert;

class UtilController extends Controller
{
  public function getCategorias()
  {
    $categorias = \App\Categoria::all();
    if($categorias->count() > 0){
      foreach ($categorias as $key => $value) {
        $lists[$value->id] = array('id' => $value->id, 'tipo' => $value->tipo, 'nombre' => $value->nombre, 'acronimo' => $value->acronimo);
      }
      return $lists;
    }else {
      return null;
    }
  }

  public function getCatCodigo($categoria)
  {
    $codcat = \App\Categoria::find($categoria);
    return $codcat;
  }

  public function getSCatCodigo($categoria)
  {
    $codscat = \App\Subcategoria::where('categoria_id','=',$categoria)->get();
    if($codscat->count() == 0){
      return null;
    }else {
      foreach ($codscat as $key => $value) {
        $lists[$value->id] = array('id' => $value->id, 'nombre' => $value->nombre,'acronimo' => $value->acronimo);
      }
      return $lists;
    }

  }


  public function ordenDetalles($id)
  {
    $odcd = Ordendecompradetalle::with('ordendecompra:id,codigo','producto:id,sku,nombre')->where('ordendecompra_id','=',$id)->get();
    $detalles = collect();
    foreach ($odcd as $value) {
      $detalles->push(['producto' => $value->producto->nombre, 'codigo' => $value->producto->sku, 'cantidad' => $value->cantidad ]);
    }
    return $detalles;
  }

  public function ordenCompraAprobar($id)
  {
    $orden = Ordendecompra::findOrFail($id);
    $orden->update(['aprobada' => 1]);
    alert()->success('Aprobada','Orden Aprobada');
    return redirect('ordendecompras');
  }

  public function getPropiedades($producto)
  {
    $propiedades = \App\Propiedade::where('producto_id','=',$producto)->get();
    return $propiedades;
  }

  public function loadOrdenes($orden)
  {
    $ocwd = \App\Ordendecompradetalle::with('ordendecompra:id,codigo,fecha,prioridad,aprobada,procesada','producto:id,sku,nombre')
    ->where('ordendecompra_id',$orden)
    ->get()
    ->where('ordendecompra.procesada',0)
    ->where('ordendecompra.aprobada',1)
    ->sortBy('ordendecompra.prioridad')
    ->sortBy('ordendecompra.fecha');
    // dd($ocwd);
    return $ocwd;
  }

  public function toInventario($compra)
  {
    $productos = \App\Compradetalle::where('compra_id',$compra)->get();
    // dd($productos);
    $toInventario = collect();
    foreach ($productos as $key => $value) {
      $toInventario->push(['fi' =>\Illuminate\Support\Carbon::now(),'compra_id' => $value->compra_id, 'producto_id' => $value->producto_id, 'cantidad' => $value->cantidad, 'precio' => $value->precio]);
    }
    // dd($toInventario);
    foreach ($toInventario as $item) {
      \App\Inventario::create($item);
    }

    alert()->success('Registro existoso','Inventario cargado');
    return redirect('/inventarios');
  }

}
