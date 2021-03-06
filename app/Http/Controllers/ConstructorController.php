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
    $this->validate($request, [
      'tipo_id' => 'required',
      'subtipo_id' => 'required',
      'sku' => 'required|unique:proyectos',
      'codigo' => 'required|unique:proyectos',
      'nombre' => 'required',
      'descripcion' => 'required',
      'ptolargo' => 'nullable',
      'ptoalto' => 'nullable',
      'ptoprofundidad' => 'nullable',
      // complementos
      'mtp_tipo_id.*' => 'required',
      'mtp_subtipo_id.*' => 'required',
      'mtp_cantidad.*' => 'required',
      // Piezas
      'psematerial_id.*' => 'required',
      'psedescripcion.*' => 'required',
      'pselargo.*' => 'nullable',
      'psealto.*' => 'nullable',
      'pseprofundidad.*' => 'nullable',
      'pselargo_izq.*' => 'nullable',
      'pselargo_der.*' => 'nullable',
      'psealto_sup.*' => 'nullable',
      'psealto_inf.*' => 'nullable',
      'psemec1.*' => 'nullable',
      'psemec2.*' => 'nullable',
      'psecantidad.*' => 'required',
    ]);

    $producto = collect([
      'sku'=>$request->sku,
      'codigo' => $request->codigo,
      'tipo_id'=>$request->tipo_id,
      'subtipo_id'=>$request->subtipo_id,
      'nombre'=>$request->nombre,
      'sap'=>$request->sap,
      'sar'=>$request->sar,
      'descripcion'=>$request->descripcion,
      'largo'=>$request->ptolargo,
      'alto'=>$request->ptoalto,
      'profundidad'=>$request->ptoprofundidad,
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
      $newListaMaterial->alto = $request->psealto[$i];
      $newListaMaterial->alto = $request->psealto[$i];
      $newListaMaterial->profundidad = $request->pseprofundidad[$i];
      $newListaMaterial->largo_izq = $request->pselargo_izq[$i];
      $newListaMaterial->largo_der = $request->pselargo_der[$i];
      $newListaMaterial->alto_sup = $request->psealto_sup[$i];
      $newListaMaterial->alto_inf = $request->psealto_inf[$i];
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
    $producto = Proyecto::findOrFail($id);
    $producto->id = $id;
    $producto->codigo = $request->codigo;
    $producto->sku = $request->sku;
    $producto->tipo_id = $request->tipo_id;
    $producto->subtipo_id = $request->subtipo_id;
    $producto->nombre = $request->nombre;
    $producto->sap = $request->sap;
    $producto->sar = $request->sar;
    $producto->descripcion = $request->descripcion;
    $producto->largo = $request->ptolargo;
    $producto->alto = $request->ptoalto;
    $producto->profundidad = $request->ptoprofundidad;
    $producto->importado = 0;
    $producto->save();


    /* Materia Prima */
    $mtps = Mtp::where('producto_id','=',$id)->get();
    if ($mtps->count() == count($request->mtp_tipo_id)){
      foreach ($request->mtp_tipo_id as $key => $value) {
        Mtp::where('id','=',$request->mtp_id)->update([
          'mtp_tipo_id' => $request->mtp_tipo_id[$key],
          'mtp_subtipo_id' => $request->mtp_subtipo_id[$key],
          'cantidad' => $request->mtp_cantidad[$key]
        ]);
      }
    }else if($mtps->count() > count($request->mtp_tipo_id)){
      /* Elimino materia prima */
      $mtps_rm = Mtp::whereNotIn('id',$request->mtp_id)->get();
      foreach ($mtps_rm as $key => $value) {
        Mtp::destroy($value->id);
      }
    }else if($mtps->count() < count($request->mtp_tipo_id)){
      /* Agrego materia prima */
      foreach ($request->mtp_tipo_id as $key => $value) {
        Mtp::firstOrCreate([
          'producto_id' => $id,
          'mtp_tipo_id' => $request->mtp_tipo_id[$key],
          'mtp_subtipo_id' => $request->mtp_subtipo_id[$key],
          'cantidad' => $request->mtp_cantidad[$key]
        ]);
      }
    }

    /* Crear el Material */
    $materiales = Lista_materiale::where('producto_id','=',$id)->get();
    if ($materiales->count() == count($request->pse_id)){
      foreach ($request->pse_id as $key => $value) {
        Lista_materiale::where('id','=',$request->pse_id)->update([
          'material_id' => $request->psematerial_id[$key],
          'descripcion_id' => $request->psedescripcion[$key],
          'largo' => $request->pselargo[$key],
          'alto' => $request->psealto[$key],
          'alto' => $request->psealto[$key],
          'profundidad' => $request->pseprofundidad[$key],
          'largo_izq' => $request->pselargo_izq[$key],
          'largo_der' => $request->pselargo_der[$key],
          'alto_sup' => $request->psealto_sup[$key],
          'alto_inf' => $request->psealto_inf[$key],
          'mec1' => $request->psemec1[$key],
          'mec2' => $request->psemec2[$key],
          'cantidad' => $request->psecantidad[$key]
        ]);
      }
    }else if ($materiales->count() > count($request->pse_id)){
      /* Eliminar Materiales */
      $material_rm = Lista_materiale::whereNotIn('id',$request->pse_id)->get();
      foreach ($material_rm as $key => $value) {
        Lista_materiale::destroy($value->id);
      }
    }else if ($materiales->count() < count($request->pse_id)){
      /* Agregar Materiales */
      foreach ($request->pse_id as $key => $value) {
        Lista_materiale::firstOrCreate([
          'producto_id' => $id,
          'material_id' => $request->psematerial_id[$key],
          'descripcion_id' => $request->psedescripcion[$key],
          'largo' => $request->pselargo[$key],
          'alto' => $request->psealto[$key],
          'alto' => $request->psealto[$key],
          'profundidad' => $request->pseprofundidad[$key],
          'largo_izq' => $request->pselargo_izq[$key],
          'largo_der' => $request->pselargo_der[$key],
          'alto_sup' => $request->psealto_sup[$key],
          'alto_inf' => $request->psealto_inf[$key],
          'mec1' => $request->psemec1[$key],
          'mec2' => $request->psemec2[$key],
          'cantidad' => $request->psecantidad[$key]
        ]);
      }
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
