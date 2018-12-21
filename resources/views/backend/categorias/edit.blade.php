@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
  <div class="col-md">
    <h3>Categorias</h3>
    <ul class="nav">
      <li class="nav-item">
        <a href="{{ url('/backend/categorias') }}" class="btn btn-link" title="Inicio">Regresar</a>
      </li>
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-md-4">
    {!! Form::model($categoria, ['method' => 'PATCH', 'route' => ['categorias.update' , $categoria->id]]) !!}
    <div class="form-group">
      {!! Form::label('nombre', 'Nombre', ['class' => 'form-control-label']) !!}
      {!! Form::text('nombre', null, ['class' => 'form-control','readonly']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('costo', 'Costo', ['class' => 'form-control-label']) !!}
      {!! Form::number('costo', null, ['class' => 'form-control text-right','step' => 0.01, 'min' => 0.01]) !!}
    </div>
    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
</div>
</div>

@endsection