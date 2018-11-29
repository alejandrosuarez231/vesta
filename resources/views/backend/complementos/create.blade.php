@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app" v-cloak>
  <div class="row">
    <div class="col-md">
      <h3>Modulo: [<span class="text-primary"><strong>{{ $modulo->sku_grupo }}</strong></span>]  {{ $modulo->nombre }} <br><small>Nueva Complemento </small></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  {!! Form::open(['route' => 'complementosku.complementos.store', 'method' => 'POST']) !!}
  <div class="row">
    <div class="col-md">

    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

