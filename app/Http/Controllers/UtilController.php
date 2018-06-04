<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordendecompra;
use App\Ordendecompradetalle;
use Alert;

class UtilController extends Controller
{
  public function getCatCodigo($categoria)
  {
    $codcat = \App\Categoria::find($categoria);
    return $codcat;
  }

  public function getSCatCodigo($categoria)
  {
    $codscat = \App\Subcategoria::where('categoria_id','=',$categoria)->get();
    return $codscat->toJson();
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
    $ocwd = \App\Ordendecompradetalle::with('ordendecompra:id,codigo,fecha,prioridad,aprobada','producto:id,sku,nombre')
    ->where('ordendecompra_id',$orden)
    ->get()
    ->where('ordendecompra.aprobada',1)
    ->sortBy('ordendecompra.prioridad')
    ->sortBy('ordendecompra.fecha');
    return $ocwd;
  }

}
