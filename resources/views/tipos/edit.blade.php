@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Tipos <small>Editar</small></h4>
      {!! Form::model($tipo, ['route' => ['categorias.update', $tipo->id],'method'=>'PATCH']) !!}
      <div class="form-group col-md-2">
        {!! Form::label('tipo', 'Tipo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::select('tipo', ['MTP'=>'MTP','PSE'=>'PSE','PTE'=>'PTE','SER'=>'SER'], $tipo->tipo, ['class'=>'form-control']) !!}
        {!! $errors->first('tipo', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', $tipo->nombre, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Categoria']) !!}
        {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <div class="form-group col-md-4">
        {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('acronimo', $tipo->acronimo, ['class'=>'form-control']) !!}
        {!! $errors->first('acronimo', '<p class="help-block text-danger">:message</p>') !!}
      </div>
     <button type="submit" class="btn btn-primary" title="Actualizar"><i class="far fa-edit"></i> Actualizar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/tipos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection