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
      {!! Form::model($confpart, ['route'=> ['confparts.update', $confpart->id], 'method'=>'PATCH']) !!}
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::select('nombre', ['Sist. de Apertura'=>'Sist. de Apertura','Sist. de Armado'=>'Sist. de Armado'], $confpart->nombre, ['class'=>'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">Nombre de la Configuración a Asignar.</small>
      </div>
      <div class="form-group">
        {!! Form::label('valor', 'Valor', ['class'=>'form-control-label']) !!}
        {!! Form::text('valor', $confpart->valor, ['class'=>'form-control']) !!}
        <small id="emailHelp" class="form-text text-muted">Valor de la Configuración a Asignar.</small>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ URL::previous() }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection