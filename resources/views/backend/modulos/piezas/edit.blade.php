@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md">
      <h3>Modulos/Piezas <small>Edit</small></h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ url()->previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      {!! Form::model($pieza, ['route' => ['piezas.update', $pieza->id],'method'=>'PATCH']) !!}
      <div class="form-group">
        {!! Form::label('tipo_pieza', 'Tipo/Pieza', ['class'=>'form-control-label']) !!}
        {!! Form::text('tipo_pieza', null, ['class'=>'form-control col-md-6','placeholder'=>'Tipo de Pieza']) !!}
        {!! $errors->first('tipo_pieza', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('materiale_id', 'Material', ['class'=>'form-control-label']) !!}
          {!! Form::select('materiale_id', \App\Materiale::pluck('nombre','id'), null, ['class'=>'form-control','placeholder'=>'Seleccion']) !!}
          {!! $errors->first('materiale_id', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('acronimo', 'Acronimo', ['class'=>'form-control-label']) !!}
          {!! Form::text('acronimo', null, ['class'=>'form-control','placeholder'=>'Acronimo']) !!}
          {!! $errors->first('acronimo', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('formula_area', 'Formula Area', ['class'=>'form-control-label']) !!}
          {!! Form::text('formula_area', null, ['class'=>'form-control','placeholder'=>'Formula Area']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('formula_canto', 'Formula Canto', ['class'=>'form-control-label']) !!}
          {!! Form::text('formula_canto', null, ['class'=>'form-control','placeholder'=>'Formula Canto']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('canto_largo1', 'Canto Largo 1', ['class'=>'form-control-label']) !!}
          {!! Form::text('canto_largo1', null, ['class'=>'form-control','placeholder'=>'Canto Largo 1']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('canto_largo2', 'Canto Largo 2', ['class'=>'form-control-label']) !!}
          {!! Form::text('canto_largo2', null, ['class'=>'form-control','placeholder'=>'Canto Largo 2']) !!}
        </div>

        <div class="form-group mr-2">
          {!! Form::label('canto_ancho1', 'Canto Ancho 1', ['class'=>'form-control-label']) !!}
          {!! Form::text('canto_ancho1', null, ['class'=>'form-control','placeholder'=>'Canto Ancho 1']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('canto_ancho2', 'Canto Ancho 2', ['class'=>'form-control-label']) !!}
          {!! Form::text('canto_ancho2', null, ['class'=>'form-control','placeholder'=>'Canto Ancho 2']) !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('costo', 'Costo', ['class'=>'form-control-label']) !!}
        {!! Form::number('costo', null, ['class'=>'form-control col-md-2 text-right','placeholder'=>'0.00']) !!}
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/modulos/piezas') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection