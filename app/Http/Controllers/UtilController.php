<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordendecompra;
use App\Ordendecompradetalle;
use Alert;

class UtilController extends Controller
{
    public function ordenDetalles($id)
    {
      $odcd = Ordendecompradetalle::with('ordendecompra:id,codigo','mtp:id,sku,nombre')->findOrFail($id);
      return $odcd;
    }

    public function ordenCompraAprobar($id)
    {
      $orden = Ordendecompra::findOrFail($id);
      $orden->update(['aprobada' => 1]);
      alert()->success('Aprobada','Orden Aprobada');
      return redirect('ordendecompras');
    }
}
