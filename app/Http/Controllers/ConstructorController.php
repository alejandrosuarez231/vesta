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

    if($request->tipo_id > 10){
      /* Proyecto */
      $producto = collect(['sku'=>$request->sku,'tipo_id'=>$request->tipo_id,'subtipo_id'=>$request->subtipo_id,'nombre'=>$request->nombre,'descripcion'=>$request->descripcion,'largo'=>$request->ptolargo,'ancho'=>$request->ptoancho,'espesor'=>$request->ptoprofundidad,'importado'=>0]);

      $newProducto = Proyecto::create($producto->all());
      // $newProducto->id; //Id del producto creado
      /* Materia Prima */
      for ($i=0; $i <= count($request->mtp_tipo_id) -1 ; $i++) {
        $newMtp = new Mtp;
        $newMtp->producto_id = $newProducto->id;
        $newMtp->mtp_tipo_id = $request->mtp_tipo_id[$i];
        $newMtp->mtp_subtipo_id = $request->mtp_subtipo_id[$i];
        $newMtp->cantidad = $request->mtp_cantidad[$i];
        $newMtp->save();
      }

      /* Crear el Material */
      for ($i=0; $i <= count($request->material_id) -1 ; $i++) {
        $newListaMaterial = new Lista_materiale;
        $newListaMaterial->producto_id = $newProducto->id;
        $newListaMaterial->material_id = $request->material_id[$i];
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
      /* Propiedades a tabla ? */
      alert()->success('Registro Creado','Nuevo Proyecto');
      return redirect('/frontend/proyectos');
    }
  }

  public function edit($id)
  {
    $proyecto = Proyecto::findOrFail($id);
    return view('frontend.constructor.edit', compact('proyecto'));
  }

  public function update(Request $request, $id)
  {
    /* Proyecto */
    $producto = Proyecto::findOrFail($id);
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->largo = $request->ptolargo;
    $producto->ancho = $request->ptoancho;
    $producto->espesor = $request->ptoprofundidad;
    $producto->importado = $request->importado;
    $producto->minimo = $request->minimo;
    $producto->maximo = $request->maximo;
    // $producto->save();

    dd($id,$request->all(),$producto);
    /* Materia Prima */
    $mtps = Mtp::where('producto_id',$id)->get();
    if($mtps->count() == count($request->mtp_tipo_id)){
      /* No agrego Mtps */
      for ($i=0; $i <=$mtps->count() -1 ; $i++) {
        $mtps->mtp_tipo_id = $request->mtp_tipo_id[$i];
        $mtps->mtp_subtipo_id = $request->mtp_subtipo_id[$i];
        $mtps->mtp_cantidad = $request->cantidad[$i];
        $mtps->save();
      }
    }else if($mtps->count() < count($request->mtp_tipo_id)){
      /* Agrego Mtps*/
      for ($i=0; $i <= count($request->mtp_tipo_id) -1 ; $i++) {
        Mtp::updateOrCreate([
          'producto_id' => $id,
          'mtp_tipo_id' => $request->mtp_tipo_id[$i],
          'mtp_subtipo_id' => $request->mtp_subtipo_id[$i],
          'cantidad' =< $request->mtp_cantidad[$i]
        ]);
      }

    }else if($mtps->count() > count($request->mtp_tipo_id)){
      /* Eliminio Mtps */
    }

    // for ($i=0; $i <= count($request->mtp_tipo_id) -1 ; $i++) {
    //   $mtps = Mtp::where('producto_id',$id)->get();
    //   $updateMtp = Mtp::findOrFail($mtp->id)
    //   $newMtp = new Mtp;
    //   $newMtp->producto_id = $updateProducto->id;
    //   $newMtp->mtp_tipo_id = $request->mtp_tipo_id[$i];
    //   $newMtp->mtp_subtipo_id = $request->mtp_subtipo_id[$i];
    //   $newMtp->cantidad = $request->mtp_cantidad[$i];
    //   $newMtp->save();
    // }

    /* Crear el Material */
      // for ($i=0; $i <= count($request->material_id) -1 ; $i++) {
      //   $newListaMaterial = new Lista_materiale;
      //   $newListaMaterial->producto_id = $updateProducto->id;
      //   $newListaMaterial->material_id = $request->material_id[$i];
      //   $newListaMaterial->descripcion_id = $request->psedescripcion[$i];
      //   $newListaMaterial->largo = $request->pselargo[$i];
      //   $newListaMaterial->ancho = $request->pseancho[$i];
      //   $newListaMaterial->ancho = $request->pseancho[$i];
      //   $newListaMaterial->espesor = $request->pseespesor[$i];
      //   $newListaMaterial->largo_izq = $request->pselargo_izq[$i];
      //   $newListaMaterial->largo_der = $request->pselargo_der[$i];
      //   $newListaMaterial->ancho_sup = $request->pseancho_sup[$i];
      //   $newListaMaterial->ancho_inf = $request->pseancho_inf[$i];
      //   $newListaMaterial->mec1 = $request->psemec1[$i];
      //   $newListaMaterial->mec2 = $request->psemec2[$i];
      //   $newListaMaterial->cantidad = $request->psecantidad[$i];
      //   $newListaMaterial->save();
      // }
    /* Propiedades a tabla ? */
    // alert()->success('Registro actualizado','Proyecto Actualizado');
    // return redirect('/frontend/proyectos');
  }
}
