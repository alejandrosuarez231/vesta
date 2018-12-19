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
      {!! Form::open(['url' => 'backend/confmats', 'method' => 'POST']) !!}
      <div class="form-group">
        {!! Form::label('materiale_id', 'Material', ['class'=>'form-control-label']) !!}
        {!! Form::select('materiale_id', \App\Materiale::pluck('nombre','id') , null, ['class'=>'form-control','placeholder'=>'Set Material']) !!}
        <small id="emailHelp" class="form-text text-muted">Nombre del Material a Configurar.</small>
        {!! $errors->first('materiale_id', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('productos[]', 'Producto', ['class'=>'form-control-label']) !!}
        {!! Form::select('productos[]', \App\Producto::pluck('nombre','id') ,null, ['class'=>'form-control', 'multiple','name' => 'productos[]']) !!}
        <small id="emailHelp" class="form-text text-muted">Producto asignado a Material.</small>
        {!! $errors->first('productos[]', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ URL::previous() }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection