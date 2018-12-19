<?php

namespace App\Http\Controllers;

use App\Tiradore;
use Illuminate\Http\Request;

class TiradoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tiradores = Tiradore::all();
      return view('backend.tiradores.index', compact('tiradores'));
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
     * @param  \App\Tiradore  $tiradore
     * @return \Illuminate\Http\Response
     */
    public function show(Tiradore $tiradore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tiradore  $tiradore
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiradore $tiradore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tiradore  $tiradore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiradore $tiradore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tiradore  $tiradore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiradore $tiradore)
    {
        //
    }
  }
