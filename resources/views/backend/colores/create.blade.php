@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-1">
      <h3>Colores</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url('/backend/colores') }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
        {{-- <li class="nav-item">
          <a href="{{ route('colores.create') }}" class="nav-link">Nuevo</a>
        </li> --}}
      </ul>
      {!! Form::open(['route' => 'colores.store', 'method' => 'POST']) !!}
      <div class="form-group">
        {!! Form::label('nombre', 'Color', ['class' => 'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class' => 'form-control text-uppercase col-md-6']) !!}
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/colores') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection