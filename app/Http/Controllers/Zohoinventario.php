<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
// use GuzzleHttp\Stream\Stream;

class Zohoinventario extends Controller
{
	public function __construct()
	{
		$this->token = 'f88f3029f640cc52fad097c509800ed9';
		$this->tokenFinance = '76d13b4fb1f07cb36712eae92284350e'; //Token Zoho Finance
		$this->empresaid = '672220601';
	}

	public function inventarioTotal()
	{
		$client = new Client();
		$response = $client->request('GET', 'https://inventory.zoho.com/api/v1/items?authtoken='. $this->token .'&'. $this->empresaid);

		$code = $response->getStatusCode(); // 200
		$reason = $response->getReasonPhrase(); // OK
		$body = $response->getBody();

		$data = json_decode($response->getBody(), TRUE);

		// return $data['item_group']['items'];
		return $data;
	}

	public function itemsGroupAll()
	{
		$client = new Client();
		$response = $client->request('GET', 'https://inventory.zoho.com/api/v1/itemgroups?authtoken='. $this->token .'&'. $this->empresaid);

		$code = $response->getStatusCode(); // 200
		$reason = $response->getReasonPhrase(); // OK
		$body = $response->getBody();

		$data = json_decode($response->getBody(), TRUE);
		// dd($data['itemgroups']);
		$grupos = collect();
		for ($i=0; $i <= count($data['itemgroups']) -1 ; $i++) {
			$grupos->push([
				'id' => $data['itemgroups'][$i]['group_id'],
				'nombre' => $data['itemgroups'][$i]['group_name']
			]);
		}
		return view('inventario.index', compact('grupos'));

	}

	public function itemsGroup($groupid)
	{
		$client = new Client();
		$response = $client->request('GET', 'https://inventory.zoho.com/api/v1/itemgroups/' . $groupid .'?authtoken='. $this->token .'&'. $this->empresaid);

		$code = $response->getStatusCode(); // 200
		$reason = $response->getReasonPhrase(); // OK
		$body = $response->getBody();

		$data = json_decode($response->getBody(), TRUE);
		$items = $data['item_group']['items'];

		// dd($items);

		return view('inventario.show', compact('items'));
	}
}
