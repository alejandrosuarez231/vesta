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
      dd($request->all());
      if($request->tipo_id == 11 || $request->tipo_id == 12){
        /* Proyecto Vesta */
        $tipologia = Tipo::find($request->tipo_id);
        $subtipo = Subtipo::find($request->subtipo_id);
        $producto = collect(['sku'=>$tipologia->acronimo.'-'.$subtipo->acronimo,'tipo_id'=>$request->tipo_id,'subtipo_id'=>$request->subtipo_id,'nombre'=>$request->nombre,'descripcion'=>$request->descripcion,'largo'=>$request->ptolargo,'ancho'=>$request->ptoancho,'profundidad'=>$request->ptoprofundidad,'importado'=>0]);

        // $producto->dump();

        /* Creacion del nuevo producto */
        $newProducto = Proyecto::create($producto->all());
        $newProducto->id; //Id del producto creado

        /* Materia Prima */
        $mtps = collect();
        for ($i=0; $i <= count($request->mtp) -1 ; $i++) {
          // $mtps->push(['producto_id'=>$request->mtp[$i],'cantidad'=>$request->cantidad[$i]]);
          $newMtp = Mtp::create(['producto_id' => $newProducto->id, 'mtp'=>$request->mtp[$i],'cantidad'=>$request->cantidad[$i]]);
        }

        // $mtps->dump();

        /* Productos semi elaborados */
        $pse = collect();
        $propiedades = collect();
        for ($i=0; $i <= count($request->material_id) -1 ; $i++) {
          /* Crear Propiedades */
          // $propiedades->push(['producto_id'=>$newProducto->id,'largo'=>$request->pselargo[$i],'ancho'=>$request->pseancho[$i],'espesor'=>$request->pseespesor[$i],'veta'=>null,'largo_izq'=>$request->pselargo_izq[$i],'largo_der'=>$request->pselargo_der[$i],'ancho_sup'=>$request->pseancho_sup[$i],'ancho_inf'=>$request->pseancho_inf[$i],'mec1'=>$request->psemec1[$i],'mec2'=>$request->psemec2[$i],'cantidad'=>$request->psecantidad[$i]]);

          $propiedad = Propiedade::create(['producto_id'=>$newProducto->id,'largo'=>$request->pselargo[$i],'ancho'=>$request->pseancho[$i],'espesor'=>$request->pseespesor[$i],'veta'=>null,'largo_izq'=>$request->pselargo_izq[$i],'largo_der'=>$request->pselargo_der[$i],'ancho_sup'=>$request->pseancho_sup[$i],'ancho_inf'=>$request->pseancho_inf[$i],'mec1'=>$request->psemec1[$i],'mec2'=>$request->psemec2[$i],'cantidad'=>$request->psecantidad[$i]]);

          /* Crear el Material */
          // $pse->push(['sku'=>null, 'producto_id' => $newProducto->id,'material_id'=>$request->material_id[$i],'nombre'=>$request->psedescripcion[$i],'propiedades_id'=>$propiedad->id,'cantidad'=>$request->psecantidad[$i]]);
          $newListaMaterial = Lista_materiale::create(['sku'=>null, 'producto_id' => $newProducto->id,'material_id'=>$request->material_id[$i],'nombre'=>$request->psedescripcion[$i],'propiedad_id'=>$propiedad->id,'cantidad'=>$request->psecantidad[$i]]);
        }

        // $propiedades->dump();
        // dd($request->all());
        alert()->success('Registro Creado','Nuevo modelo');
        return redirect('/frontend/productos');
      }
    }
}
