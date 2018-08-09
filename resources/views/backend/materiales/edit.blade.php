@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md offset-md-1">
      <h3>Materiales</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ URL::previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
      {!! Form::model($material, ['route' => ['materiales.update', $material->id],'method'=>'PATCH']) !!}
      <div class="form-group">
        {!! Form::label('sku', 'SKU', ['class'=>'form-control-label']) !!}
        {!! Form::text('sku', $material->sku, ['class' => 'form-control col-md-3','placeholder' =>'Codigo SKU','readonly']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', $material->nombre, ['class' => 'form-control col-md-3','placeholder' =>'Nombre']) !!}
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Actualizar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/materiales') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection