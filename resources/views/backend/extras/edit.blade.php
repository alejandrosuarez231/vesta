@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <h3>Edit Propiedad Extra</h3>
      {!! Form::model($extra, ['route' => ['extras.update',$extra->id],'method' => 'PATCH']) !!}
      <div class="form-group">
        {!! Form::label('propiedad', 'Propiedad', ['class' =>' form-control-label']) !!}
        {!! Form::text('propiedad', $extra->propiedad, ['class' => 'form-control col-md-4','placeholder' => 'nombre de la propiedad']) !!}
        {!! $errors->first('propiedad', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Editar</button>
      <a class="btn btn-warning text-danger" href="{{ URL::previous() }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection