@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Modulos/Complementos <small>Nuevo</small></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      {!! Form::open(['url' => 'backend/modulos/complementos', 'method' => 'POST']) !!}
      {{-- <div class="form-group">
        {!! Form::label('tipo_id', 'Tipp', ['class'=>'form-control-label']) !!}
        {!! Form::select('tipo_id', \App\Tipo::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Seleccion']) !!}
        {!! $errors->first('tipo_id', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group mr-2">
          {!! Form::label('subtipo_id', 'Subtipo', ['class'=>'form-control-label']) !!}
          {!! Form::select('subtipo_id', \App\Subtipo::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Seleccion']) !!}
          {!! $errors->first('subtipo_id', '<small class="help-block text-danger">:message</small>') !!}
        </div> --}}
        <div class="form-group col-md-3">
          {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
          {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'nombre']) !!}
          {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group col-md-2">
          {!! Form::label('costo', 'Costo', ['class'=>'form-control-label']) !!}
          {!! Form::number('costo', null, ['class'=>'form-control text-right','placeholder'=>'0.00']) !!}
        </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/modulos/complementos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection