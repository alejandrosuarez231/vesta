@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Unidades <small>Nueva</small></h4>
      {!! Form::open(['route'=>'unidades.store','method'=>'POST']) !!}
      <div class="form-group">
        {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label']) !!}
        {!! Form::text('acronimo', null, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Unidad']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Unidad']) !!}
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning" href="{{ url('/home') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection