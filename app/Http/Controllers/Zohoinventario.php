<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Stream\Stream;

class Zohoinventario extends Controller
{
	public function __construct()
	{
		$this->token = 'f88f3029f640cc52fad097c509800ed9';
		$this->empresaid = '672220601';
	}

	public function inventarioTotal()
	{
		$client = new Client();

		$response = $client->request('GET', 'https://inventory.zoho.com/api/v1/items?authtoken='. $this->token .'&'. $this->empresaid);

		$code = $response->getStatusCode(); // 200
		$reason = $response->getReasonPhrase(); // OK
		$body = $response->getBody();

		return gettype($body);
	}
}
