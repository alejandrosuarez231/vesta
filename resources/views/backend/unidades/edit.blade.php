@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Unidades <small>Editar</small></h4>
      {!! Form::model($unidad, ['route' => ['unidades.update', $unidad->id],'method'=>'PATCH']) !!}
      <div class="form-group">
        {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label']) !!}
        {!! Form::text('acronimo', $unidad->acronimo, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Unidad']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', $unidad->nombre, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Unidad']) !!}
      </div>
      <button type="submit" class="btn btn-primary" title="Actualizar"><i class="far fa-edit"></i> Actualizar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/unidades') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection