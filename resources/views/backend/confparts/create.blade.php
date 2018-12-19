@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Configuración de Materiales</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/backend/confparts') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      {!! Form::open(['url' => 'backend/confparts', 'method' => 'POST']) !!}
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::select('nombre', ['Sist. de Apertura'=>'Sist. de Apertura','Sist. de Armado'=>'Sist. de Armado'], null, ['class'=>'form-control','placeholder'=>'Configuracion']) !!}
        <small id="emailHelp" class="form-text text-muted">Nombre de la Configuración a Asignar.</small>
      </div>
      <div class="form-group">
        {!! Form::label('valor', 'Valor', ['class'=>'form-control-label']) !!}
        {!! Form::text('valor', null, ['class'=>'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">Valor de la Configuración a Asignar.</small>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ URL::previous() }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection