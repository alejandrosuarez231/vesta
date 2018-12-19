@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <h3>Crear Propiedad Extra</h3>
      {!! Form::open(['route' => 'extras.store','method' => 'POST']) !!}
      <div class="form-group">
        {!! Form::label('propiedad', 'Propiedad', ['class' =>' form-control-label']) !!}
        {!! Form::text('propiedad', null, ['class' => 'form-control col-md-4','placeholder' => 'nombre de la propiedad']) !!}
        {!! $errors->first('propiedad', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ URL::previous() }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection