<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maidmaid\Zoho\Client;

class ZohoController extends Controller
{
  // inventory token: 2bb4657169a4edd6971204fcc8490e64
  
  public function clientIndex()
  {
    $client = new Client('0615079017f7956b1d47442349b17804');
    $records = $client->getRecords('Accounts');
    /* Convertir en collection */
    $clientes = collect();
    foreach ($records as $value) {
      if($value['Estatus de Cliente'] == 'Activo')
      {
        $clientes->push(['value' => $value['ACCOUNTID'], 'label' => $value['Account Name'], 'estatus' => $value['Estatus de Cliente']]);
      }
    }
    $clientes_listado = $clientes->sortBy('label');
    $resultados = $clientes_listado->values()->all();
    return $resultados;
  }

  public function productsIndex()
  {
    $client = new Client('0615079017f7956b1d47442349b17804');
    
    $records = $client->getRecords('Products');

    $productos = collect();
    foreach ($records as $value) {
      if($value['Product Active'] == true)
      {
        $productos->push([
          'id' => $value['PRODUCTID'],
          'categoria' => $value['Product Category'],
          'producto' => $value['Product Name'],
          'unidad' => $value['Usage Unit']
        ]);
      }
    }
    $productos_listado = $productos->sortBy('producto');
    $resultados = $productos_listado->values()->all();
    $collection = collect([$records, $resultados]);
    return $collection;
  }
}
