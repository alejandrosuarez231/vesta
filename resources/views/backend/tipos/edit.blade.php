@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-2">
      <h4>Tipos <small>Editar</small></h4>
      {!! Form::model($tipo, ['route' => ['tipos.update', $tipo->id],'method'=>'PATCH']) !!}
      <div class="form-group col-md-6">
        {!! Form::label('tipo', 'Tipo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::select('tipologia', ['MTP'=>'MTP','PSE'=>'PSE','PTO'=>'PTO','SER'=>'SER'], $tipo->tipo, ['class'=>'form-control','placeholder'=>'Selección']) !!}
        {!! $errors->first('tipologia', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-check col-md-8">
        {!! Form::label('padre', 'Contiene Sub-Tipos', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::checkbox('padre', 1, $tipo->padre); !!}
        {!! $errors->first('padre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('acromtip', 'Acro. Tipo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('acromtip', $tipo->acromtip, ['class'=>'form-control']) !!}
        {!! $errors->first('acromtip', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('nombre', $tipo->nombre, ['class'=>'form-control']) !!}
        {!! $errors->first('nombre', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('acronimo', $tipo->acronimo, ['class'=>'form-control text-uppercase']) !!}
        {!! $errors->first('acronimo', '<small class="help-block text-danger">:message</small>') !!}
      </div>
     <button type="submit" class="btn btn-primary" title="Actualizar"><i class="far fa-edit"></i> Actualizar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/tipos') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection