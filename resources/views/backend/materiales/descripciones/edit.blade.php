@extends('layouts.app')

@section('content')
<div class="container-fluid" id="app">
  <div class="row">
    <div class="col-md">
      <h3>Descripciones</h3>
      <ul class="nav">
        <li class="nav-item">
          <a href="{{ URL::previous() }}" class="btn btn-link" title="Inicio">Regresar</a>
        </li>
      </ul>
      {!! Form::model($descripcione, ['route' => ['descripciones.update', $descripcione->id],'method'=>'PATCH']) !!}
      <div class="form-group">
        {!! Form::label('materiale_id', 'Mateial', ['class' => 'form-control-label']) !!}
        {!! Form::select('materiale_id', \App\Materiale::pluck('nombre','id'), null, ['class' => 'form-control col-md-2','placeholder'=>'Material']) !!}
        {!! $errors->first('materiale_id', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <div class="form-group">
        {!! Form::label('descripcion', 'Descripcion', ['class' => 'form-control-label']) !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control col-md-4', 'placeholder' => 'Descripcion']) !!}
        {!! $errors->first('descripcion', '<small class="help-block text-danger">:message</small>') !!}
      </div>
      <span class="font-weight-bold text-muted"><small>Formulas de los materiales</small></span>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('formula_area', 'Formula/Area', ['class'=>'form-control-label']) !!}
          {!! Form::text('formula_area', $descripcione->formula_area, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('formula_canto', 'Formula/Canto', ['class'=>'form-control-label']) !!}
          {!! Form::text('formula_area', $descripcione->formula_canto, ['class'=>'form-control']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('canto_largo1', 'Canto/L1', ['class'=>'form-control-label']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('canto_largo2', 'Canto/L2', ['class'=>'form-control-label']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::label('canto_ancho1', 'Canto/A1', ['class'=>'form-control-label']) !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::label('canto_ancho2', 'Canto/A2', ['class'=>'form-control-label']) !!}
        </div>
      </div>
      {{-- <div class="form-row">
        <div class="form-group mr-2">
          {!! Form::text('flargo', null, ['class' => 'form-control','placeholder'=>'Formula de Largo']) !!}
          {!! $errors->first('flargo', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('fancho', null, ['class' => 'form-control','placeholder'=>'Formula de Ancho']) !!}
          {!! $errors->first('fancho', '<small class="help-block text-danger">:message</small>') !!}
        </div>
        <div class="form-group mr-2">
          {!! Form::text('espesor', null, ['class' => 'form-control','placeholder'=>'Formula de Espesor']) !!}
          {!! $errors->first('espesor', '<small class="help-block text-danger">:message</small>') !!}
        </div>
      </div> --}}
      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Registrar</button>
      <a class="btn btn-warning text-danger" href="{{ url('/backend/materiales') }}" title="Cancelar"><i class="fas fa-ban"></i> Cancelar</a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection