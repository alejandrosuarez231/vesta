<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Proyecto;
use App\Propiedade;
use App\Tipo;
use App\Subtipo;
use App\Lista_materiale;
use App\Mtp;
use Alert;

class ConstructorController extends Controller
{
  public function construir()
  {
    $producto = new Proyecto;
    $propiedades = new Propiedade;
      // dd($producto,$propiedades);
    return view('frontend.constructor.construir', compact('producto','propiedad'));
  }

  public function ensamble(Request $request)
  {
    // dd($request->all());
    // $this->validate($request, [
    //   'tipos_id' => 'required',
    //   'subtipos_id' => 'required',
    //   'sku' => 'required|unique:proyectos',
    //   'nombre' => 'required|unique:proyectos',
    //   'descripcion' => 'required',
    //   'ptolargo' => 'nullable',
    //   'ptoancho' => 'nullable',
    //   'ptoespesor' => 'nullable',
    //   'mtp_tipo_id.*' => 'required',
    //   'mtp_subtipo_id.*' => 'required',
    //   'mtp_cantidad.*' => 'required',
    //   'psematerial_id.*' => 'required',
    //   'psedescripcion.*' => 'required',
    //   'pselargo.*' => 'nullable',
    //   'pseancho.*' => 'nullable',
    //   'pseespesor.*' => 'nullable',
    //   'pselargo_izq.*' => 'nullable',
    //   'pselargo_der.*' => 'nullable',
    //   'pseancho_sup.*' => 'nullable',
    //   'pseancho_inf.*' => 'nullable',
    //   'psemec1.*' => 'nullable',
    //   'psemec2.*' => 'nullable',
    //   'psecantidad.*' => 'nullable',
    // ]);

    $producto = collect([
      'sku'=>$request->sku,
      'tipo_id'=>$request->tipo_id,
      'subtipo_id'=>$request->subtipo_id,
      'nombre'=>$request->nombre,
      'sap'=>$request->sap,
      'sar'=>$request->sar,
      'descripcion'=>$request->descripcion,
      'largo'=>$request->ptolargo,
      'ancho'=>$request->ptoancho,
      'espesor'=>$request->ptoespesor,
      'importado'=>0
    ]);

    $proyecto = Proyecto::create($producto->all());
    /* Materia Prima */
    for ($i=0; $i <= count($request->mtp_tipo_id) -1 ; $i++) {
      $newMtp = new Mtp;
      $newMtp->producto_id = $proyecto->id;
      $newMtp->mtp_tipo_id = $request->mtp_tipo_id[$i];
      $newMtp->mtp_subtipo_id = $request->mtp_subtipo_id[$i];
      $newMtp->cantidad = $request->mtp_cantidad[$i];
      $newMtp->save();
    }

    /* Crear el Material */
    for ($i=0; $i <= count($request->psematerial_id) -1 ; $i++) {
      $newListaMaterial = new Lista_materiale;
      $newListaMaterial->producto_id = $proyecto->id;
      $newListaMaterial->material_id = $request->psematerial_id[$i];
      $newListaMaterial->descripcion_id = $request->psedescripcion[$i];
      $newListaMaterial->largo = $request->pselargo[$i];
      $newListaMaterial->ancho = $request->pseancho[$i];
      $newListaMaterial->ancho = $request->pseancho[$i];
      $newListaMaterial->espesor = $request->pseespesor[$i];
      $newListaMaterial->largo_izq = $request->pselargo_izq[$i];
      $newListaMaterial->largo_der = $request->pselargo_der[$i];
      $newListaMaterial->ancho_sup = $request->pseancho_sup[$i];
      $newListaMaterial->ancho_inf = $request->pseancho_inf[$i];
      $newListaMaterial->mec1 = $request->psemec1[$i];
      $newListaMaterial->mec2 = $request->psemec2[$i];
      $newListaMaterial->cantidad = $request->psecantidad[$i];
      $newListaMaterial->save();
    }
    toast('Registro creado!','success','top-right');
    return redirect('/frontend/proyectos');
  }

  public function edit($id)
  {
    $proyecto = Proyecto::findOrFail($id);
    $mtps = Mtp::where('producto_id','=',$id)->get();
    $materiales = Lista_materiale::where('producto_id','=',$id)->get();
    // dd($proyecto);
    return view('frontend.constructor.edit', compact('proyecto','mtps','materiales'));
  }

  public function update(Request $request, $id)
  {
    // dd($request->all());
    /* Proyecto */
    $producto = Proyecto::firstOrCreate([
      'id' => $id,
      'sku' => $request->sku,
      'tipo_id' => $request->tipo_id,
      'subtipo_id' => $request->subtipo_id,
      'nombre' => $request->nombre,
      'sap' => $request->sap,
      'sar' => $request->sar,
      'descripcion' => $request->descripcion,
      'largo' => $request->ptolargo,
      'ancho' => $request->ptoancho,
      'espesor' => $request->ptoespesor,
      'importado' => 0
    ]);

    /* Materia Prima */
    for ($i=0; $i <= count($request->mtp_tipo_id) -1 ; $i++) {
      $mtps = Mtp::firstOrCreate([
        'id' => $request->mtp_id[$i],
        'producto_id' => $id,
        'mtp_tipo_id' => $request->mtp_tipo_id[$i],
        'mtp_subtipo_id' => $request->mtp_subtipo_id[$i],
        'cantidad' => $request->mtp_cantidad[$i]
      ]);
    }

    /* Crear el Material */
    for ($i=0; $i <= count($request->pse_id) -1 ; $i++) {
      $newListaMaterial = Lista_materiale::firstOrCreate([
        'id' => $request->pse_id[$i],
        'producto_id' => $id,
        'material_id' => $request->psematerial_id[$i],
        'descripcion_id' => $request->psedescripcion[$i],
        'largo' => $request->pselargo[$i],
        'ancho' => $request->pseancho[$i],
        'ancho' => $request->pseancho[$i],
        'espesor' => $request->pseespesor[$i],
        'largo_izq' => $request->pselargo_izq[$i],
        'largo_der' => $request->pselargo_der[$i],
        'ancho_sup' => $request->pseancho_sup[$i],
        'ancho_inf' => $request->pseancho_inf[$i],
        'mec1' => $request->psemec1[$i],
        'mec2' => $request->psemec2[$i],
        'cantidad' => $request->psecantidad[$i]
      ]);
    }
    /* Propiedades a tabla ? */
    toast('Registro Actualizado!','success','top-right');
    return redirect('/frontend/proyectos');
  }

  public function dataComplementos($id)
  {
    $mtps = Mtp::where('producto_id','=',$id)->get();
    $coleccion = collect();
    foreach ($mtps as $key => $value) {
      $coleccion->push([
        'mtp_id' => $value->id,
        'mtp_producto_id' => $value->producto_id,
        'mtp_tipo_id' => $value->mtp_tipo_id,
        'mtp_subtipo_id' => $value->mtp_subtipo_id,
        'mtp_cantidad' => $value->cantidad
      ]);
    }
    return $coleccion;
  }
}
