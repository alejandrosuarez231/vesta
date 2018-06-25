@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-1">
      <h3>Marcas</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/backend/marcas') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
      {!! Form::open(['route' => 'marcas.store', 'method' => 'POST']) !!}
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('nombre', 'Nombre', ['class' => 'form-control-label']) !!}
          {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Nombre de la Marca']) !!}
        </div>
        <div class="form-group">
          {!! Form::label('importada', 'Importada', ['class' => 'form-control-label']) !!}
          {!! Form::select('importada', [0=>'No',1=>'Si'], null, ['class' => 'form-control', 'placeholder' => 'Selección']) !!}
        </div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/marcas') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection