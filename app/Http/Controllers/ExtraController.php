<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extra;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extras = Extra::paginate();
        return view('backend.extras.index', compact('extras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.extras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'propiedad' => 'required|unique:extras'
        ]);

        Extra::create($request->all());
        alert()->success('Registro Creado','Nueva Propiedad Extra');
        return redirect('backend/extras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extra = Extra::findOrFail($id);
        return view('backend.extras.edit', compact('extra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $extra = Extra::findOrFail($id);
        $this->validate($request, [
            'propiedad' => 'required|unique:extras,propiedad,'.$extra->id,
        ]);
        alert()->success('Registro Actualizado','Propiedad Extra actualizada');
        return redirect('backend/extras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
