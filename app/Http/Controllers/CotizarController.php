<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skulistado;

class CotizarController extends Controller
{
    public function getSkuPadre($uid)
    {
      $skupadre = Skulistado::All();
      if ( $skupadre->where('uid',$uid)->count() == 1 ) {
        return $skupadre->where('uid',$uid)->first()->id;
      }else {
        return 0;
      }
    }
}
