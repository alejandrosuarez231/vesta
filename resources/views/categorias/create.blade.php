@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 offset-md-2">
      <h4>Categorias <small>Nueva</small></h4>
      {!! Form::open(['route'=>'categorias.store','method'=>'POST']) !!}
      <div class="form-group col-md-6">
        {!! Form::label('tipo', 'Tipo', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::select('tipo', ['MTP'=>'MTP','PSE'=>'PSE','PTE'=>'PTE','SER'=>'SER'], null, ['class'=>'form-control','placeholder'=>'Selección']) !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('nombre', 'Nombre', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
      </div>
      <div class="form-group col-md-8">
        {!! Form::label('descripcion', 'Descripcion', ['class'=>'form-control-label font-weight-bold']) !!}
        {!! Form::text('descripcion', null, ['class'=>'form-control']) !!}
      </div>
      <button type="submit" class="btn btn-primary" title="Registrar"><i class="fas fa-sign-in-alt"></i></button>
      <a class="btn btn-warning" href="{{ url('/home') }}" title="Cancelar"><i class="fas fa-ban"></i></a>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection