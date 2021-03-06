<?php

namespace App\Http\Controllers;

use App\Mtp;
use Illuminate\Http\Request;

class MtpController extends Controller
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
     * @param  \App\Mtp  $mtp
     * @return \Illuminate\Http\Response
     */
    public function show(Mtp $mtp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mtp  $mtp
     * @return \Illuminate\Http\Response
     */
    public function edit(Mtp $mtp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mtp  $mtp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mtp $mtp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mtp  $mtp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mtp $mtp)
    {
        //
    }

    public function editarMTPContructor($id)
    {
        $mtps = Mtp::where('producto_id','=',$id)->get();
        $coleccion = collect();
        foreach ($mtps as $key => $value) {
            $coleccion->push([
                'id' => $value->id,
                'mtp_tipo_id' => $value->mtp_tipo_id,
                'mtp_subtipo_id' => $value->mtp_subtipo_id,
                'cantidad' => $value->cantidad
            ]);
        }
        return $coleccion->toJson();
    }
}
