<?php

namespace App\Http\Controllers;

use App\Sap;
use Illuminate\Http\Request;

class SapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sap  $sap
     * @return \Illuminate\Http\Response
     */
    public function show(Sap $sap)
    {
        //
    }

    public function sapList()
    {
      $sap_list = Sap::all();
      $lists = collect();
      foreach ($sap_list as $key => $value) {
        $lists->push(['value'=>$value->id,'label'=>$value->valor]);
      }
      return $lists->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sap  $sap
     * @return \Illuminate\Http\Response
     */
    public function edit(Sap $sap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sap  $sap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sap $sap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sap  $sap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sap $sap)
    {
        //
    }
  }
