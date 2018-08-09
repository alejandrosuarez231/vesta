@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <h4>Sub-Tipos <small>Nueva</small></h4>
      {!! Form::open(['route'=>'subtipos.store','method'=>'POST']) !!}
      <div class="form-group {{ $errors->has('tipo_id') ? 'has-error' : '' }}">
        {!! Form::label('tipo_id', 'Tipo', ['class'=>'form-control-label']) !!}
        {!! Form::select('tipo_id', \App\Tipo::where('padre',1)->pluck('nombre','id'), null, ['class'=>'form-control col-md-4','placeholder'=>'Selección']) !!}
        {!! $errors->first('tipo_id', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group  {{ $errors->has('nombre') ? 'has-error' : '' }}">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Sub-Tipo']) !!}
        {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group  {{ $errors->has('acronimo') ? 'has-error' : '' }}">
        {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label']) !!}
        {!! Form::text('acronimo', null, ['class'=>'form-control col-md-4','placeholder'=>'Nombre de la Sub-Tipo']) !!}
        {!! $errors->first('acronimo', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <span class="text-secondary font-weight-bold" v-if="tipo !=1">*<small>Definir Propiedades</small></span>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('setancho', 'Ancho', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('setancho', 1, false, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('setlargo', 'Largo', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('setlargo', 1, false, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('setespesor', 'Espesor', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('setespesor', 1, false, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('setcolor', 'Color', ['class' => 'form-control-label']) !!}
          {!! Form::checkbox('setcolor', 1, false, ['class' => 'form-control']) !!}
        </div>
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/subtipos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection