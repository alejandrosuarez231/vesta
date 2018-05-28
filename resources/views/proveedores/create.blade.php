@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Proveedores <small>Nueva</small></h4>
      {!! Form::open(['route'=>'proveedores.store','method'=>'POST']) !!}
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Proveedor']) !!}
      </div>
      {!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
      <a class="btn btn-warning" href="{{ url('/home') }}" title="Regresar">Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection