@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Sub-Tipos <small>Editar</small></h4>
      {!! Form::model($subtipo, ['route' => ['subtipos.update', $subtipo->id],'method'=>'PATCH']) !!}
      <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
        {!! Form::label('categoria_id', 'Categoria', ['class'=>'form-control-label']) !!}
        {!! Form::select('tipo_id', \App\Tipo::where('padre',1)->pluck('nombre','id'), $subtipo->tipo_id, ['class'=>'form-control col-md-4','placeholder'=>'Selección']) !!}
        {!! $errors->first('categoria_id', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', $subtipo->nombre, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Sub-Categoria']) !!}
        {!! $errors->first('categoria_id', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <div class="form-group  {{ $errors->has('acronimo') ? 'has-error' : '' }}">
        {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label']) !!}
        {!! Form::text('acronimo', $subtipo->acronimo, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Sub-Categoria']) !!}
        {!! $errors->first('acronimo', '<p class="help-block text-danger">:message</p>') !!}
      </div>
      <span class="text-secondary font-weight-bold" v-if="tipo !=1">*<small>Definir Propiedades</small></span>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('ancho', 'Ancho', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('ancho', true, $subtipo->ancho, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('largo', 'Largo', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('largo', true, $subtipo->largo, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('espesor', 'Espesor', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('espesor', true, $subtipo->espesor, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('color', 'Color', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('color', true, $subtipo->color, ['class' => 'form-control']) !!}
        </div>
      </div>
      <button type="submit" class="btn btn-primary" title="Actualizar"><i class="far fa-edit"></i> Actualizar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/subtipos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection