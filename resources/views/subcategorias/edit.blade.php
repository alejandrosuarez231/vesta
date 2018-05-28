@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Sub-Categorias <small>Editar</small></h4>
      {!! Form::model($subcategoria, ['route' => ['subcategorias.update', $subcategoria->id],'method'=>'PATCH']) !!}
      <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
        {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label']) !!}
        {!! Form::select('categoria_id', \App\Categoria::pluck('nombre','id'), $subcategoria->categoria_id, ['class'=>'form-control col-md-4','placeholder'=>'Selección']) !!}
        {!! $errors->first('categoria_id', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', $subcategoria->nombre, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Sub-Categoria']) !!}
        {!! $errors->first('categoria_id', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <div class="form-group  {{ $errors->has('descripcion') ? 'has-error' : '' }}">
        {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label']) !!}
        {!! Form::text('descripcion', null, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Sub-Categoria']) !!}
        {!! $errors->first('descripcion', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <button type="submit" class="btn btn-primary" title="Actualizar"><i class="far fa-edit"></i> Actualizar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/home') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection