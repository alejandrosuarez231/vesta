<?php

namespace App\Http\Controllers;

use App\Corredera;
use Illuminate\Http\Request;

class CorrederaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $correderas = Corredera::all();
      return view('backend.correderas.index', compact('correderas'));
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
     * @param  \App\Corredera  $corredera
     * @return \Illuminate\Http\Response
     */
    public function show(Corredera $corredera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Corredera  $corredera
     * @return \Illuminate\Http\Response
     */
    public function edit(Corredera $corredera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corredera  $corredera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corredera $corredera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corredera  $corredera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corredera $corredera)
    {
        //
    }
  }
