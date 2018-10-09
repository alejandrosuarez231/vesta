<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CristianPontes\ZohoCRMClient\ZohoCRMClient;

class ZohoController extends Controller
{
  public function clientIndex()
  {
    $client = new ZohoCRMClient('Products', '0615079017f7956b1d47442349b17804');
    $records = $client->getRecords()
    // ->selectColumns('Account Owner', 'Account Name', 'Correo Electrónico', 'Estatus de Cliente')
    // ->sortBy('País')->sortAsc()
    // ->since(date_create('last week'))
    ->fromIndex(1)
    ->toIndex(200)
    ->request();

      // Getting the data
    foreach ($records as $record) {
      echo "<pre>";
      print_r($record->getData());
      echo "</pre>";
    }
  }
}
