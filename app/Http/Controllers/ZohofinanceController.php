<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ZohofinanceController extends Controller
{
  public function __construct()
  {
    $this->token = '07133db4f26da247dd203ac6d6b2315b'; //Token Zoho Finance
    $this->empresaid = '672220601';
  }

  public function ODVList()
  {
    $client = new Client();
    $response = $client->request('GET', 'https://books.zoho.com/api/v3/salesorders??authtoken='. $this->token .'&'. $this->empresaid);

    $code = $response->getStatusCode(); // 200
    $reason = $response->getReasonPhrase(); // OK
    $body = $response->getBody();

    $data = json_decode($response->getBody(), TRUE);

    // return $data['item_group']['items'];
    return $data;
  }
}
