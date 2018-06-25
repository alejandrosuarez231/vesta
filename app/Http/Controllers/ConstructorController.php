<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Propiedade;

class ConstructorController extends Controller
{
    public function construir()
    {
      $producto = new Producto;
      $propiedades = new Propiedade;
      // dd($producto,$propiedades);
      return view('frontend.constructor.construir', compact('producto','propiedad'));
    }
}
