@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Proveedores <small>Editar</small></h4>
      {!! Form::model($proveedor, ['route' => ['proveedores.update', $proveedor->id],'method'=>'PATCH']) !!}
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', $proveedor->nombre, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Proveedor']) !!}
      </div>
      {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
      <a class="btn btn-warning" href="{{ url('/home') }}" title="Regresar">Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection