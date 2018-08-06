<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CristianPontes\ZohoCRMClient\ZohoCRMClient;

class ZohoController extends Controller
{
  public function clientIndex()
  {
    $clientes = new ZohoCRMClient('clients', 'f05fb8667500b7f823b2e664c6ff0529');
    dd($clientes);
    $resultados = $clientes->getRecords()
          ->selectColumns('First Name', 'Last Name', 'Email')
          ->sortBy('Last Name')->sortAsc()
          ->since(date_create('last week'))
          ->fromIndex(1)
          ->toIndex(200)
          ->request();

    // Just for debug
    echo "<pre>";
    print_r($resultados);
    echo "</pre>";
  }
}
