@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 offset-md-2">
      <h4>Sub-Categorias <small>Nueva</small></h4>
      {!! Form::open(['route'=>'subcategorias.store','method'=>'POST']) !!}
      <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
        {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label']) !!}
        {!! Form::select('categoria_id', \App\Categoria::pluck('nombre','id'), null, ['class'=>'form-control col-md-4','placeholder'=>'Selección']) !!}
        {!! $errors->first('categoria_id', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <div class="form-group  {{ $errors->has('nombre') ? 'has-error' : '' }}">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Sub-Categoria']) !!}
        {!! $errors->first('nombre', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <div class="form-group  {{ $errors->has('descripcion') ? 'has-error' : '' }}">
        {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label']) !!}
        {!! Form::text('descripcion', null, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Sub-Categoria']) !!}
        {!! $errors->first('descripcion', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning" href="{{ url('/home') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection